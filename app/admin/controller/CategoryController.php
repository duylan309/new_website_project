<?php
namespace Thue\Admin\Controller;

use Thue\Admin\Component\ElementComponent;
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

        $category_repo = new CategoryRepo;
        $categories = $category_repo->getList($params);

        $sub_categories = array();

        if (count($categories)) {
            foreach ($categories as $item) {
                $p = array();
                $p['conditions']['parent_id'] = $item->category_id;
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
        $this->view->setVars(array());
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

        return $this->response->redirect(array('for' => 'category_index'));
    }
}
