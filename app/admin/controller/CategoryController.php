<?php
namespace Thue\Admin\Controller;

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
        $page = $this->request->getQuery('page', array('int'), 1);
        $limit = $this->config->application->pagination_limit;

        $params = array();
        $params['page']  = $page;
        $params['limit'] = $limit;

        $category_repo = new CategoryRepo;
        $categories = $category_repo->getPaginationList($params);

        $this->view->setVars(array(
            'categories' => $categories
        ));
        $this->view->pick(parent::$theme . '/category/index');
    }
}
