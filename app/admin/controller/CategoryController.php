<?php
namespace Thue\Admin\Controller;

use Thue\Admin\Form\CategoryForm;
use Thue\Data\Lib\Util;
use Thue\Data\Model\M_Category;
use Thue\Data\Repo\CategoryRepo;

class CategoryController extends BaseController
{
    public function initialize()
    {
        parent::authenticateUser();
        parent::initialize();
    }

    public function indexAction()
    {
        $params = array();
        $params['conditions']['parent_id'] = 0;
        $params['order'] = 'c1.ordering ASC';

        $category_repo = new CategoryRepo;
        $categories = $category_repo->getList($params);
        $sub_categories = array();

        if (count($categories)) {
            foreach ($categories as $item) {
                $p = array();
                $p['conditions']['parent_id'] = $item->category_id;
                $p['order'] = 'c1.ordering ASC';
                $sub_categories[$item->category_id] = $category_repo->getList($p);
            }
        }

        $TYPE = M_Category::$TYPE;
        $STATUS = M_Category::$STATUS;

        $this->view->setVars(array(
            'categories'     => $categories,
            'sub_categories' => $sub_categories,
            'TYPE'           => $TYPE,
            'STATUS'         => $STATUS
        ));
        $this->view->pick(parent::$theme . '/category/index');
    }

    public function addAction()
    {
        $user_session = $this->session->get('USER_ADMIN');
        $category = new M_Category;
        $form = new CategoryForm;

        if ($this->request->isPost()) {
            $form->bind($this->request->getPost(), $category);

            if (!$form->isValid()) {
                $this->flashSession->error('Thông tin không hợp lệ');
                goto RETURN_RESPONSE;
            }

            if ($category->name_en == '') {
                $category->name_en = $category->name_vi;
            }

            $category->slug       = Util::slug($category->slug);
            $category->created_by = $user_session['user_id'];
            $category->created_at = date('Y-m-d H:i:s');

            if (!$category->save()) {
                $messages = $category->getMessages();
                if (isset($messages[0])) {
                    $this->flashSession->error($messages[0]->getMessage());
                    goto RETURN_RESPONSE;
                }
            }

            $this->flashSession->success('Thêm thành công');
            return $this->response->redirect(array('for' => 'category_index'));
        }

        RETURN_RESPONSE:
            $this->view->setVars(array(
                'form' => $form
            ));
            $this->view->pick(parent::$theme . '/category/add');
    }

    public function editAction()
    {
        $category_id = $this->request->getQuery('category_id');
        if (!$category_id) {
            throw new \Exception('Không tồn tại danh mục này');
        }

        $category = M_Category::findFirst(array(
            'conditions' => 'category_id = :category_id:',
            'bind' => array('category_id' => $category_id)
        ));
        if (!$category) {
            throw new \Exception('Không tồn tại danh mục này');
        }

        $this->view->setVars(array());
        $this->view->pick(parent::$theme . '/category/edit');
    }

    public function deleteAction()
    {
        $category_id = $this->request->getQuery('category_id');
        if (!$category_id) {
            throw new \Exception('Không tồn tại danh mục này');
        }

        $category = M_Category::findFirst(array(
            'conditions' => 'category_id = :category_id:',
            'bind' => array('category_id' => $category_id)
        ));
        if (!$category) {
            throw new \Exception('Không tồn tại danh mục này');
        }

        $category->status     = M_Category::STATUS_DELETED;
        $category->updated_at = date('Y-m-d H:i:s');

        try {
            $category->save();
            $this->flashSession->success('Xóa thành công');
        } catch (\Exception $e) {
            $this->flashSession->success($e->getMessage());
        }

        if (!$category->save()) {
            $messages = $category->getMessages();
            if (isset($messages[0])) {
                $this->flashSession->error($messages[0]->getMessage());
            }
        } else {
            $this->flashSession->success('Thêm thành công');
        }

        return $this->response->redirect(array('for' => 'category_index'));
    }
}
