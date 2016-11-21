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
        $page = $this->request->getQuery('page', array('int'), 1);
        $limit = $this->config->application->pagination_limit;

        $params = array();
        $params['page']  = $page;
        $params['limit'] = $limit;

        $category_repo = new CategoryRepo;
        $categories = $category_repo->getPaginationList($params);

        $options = array(
            'url'           => $this->url->get(array('for' => 'category_index')),
            'query'         => array(),
            'total_pages'   => isset($categories->total_pages) ? $categories->total_pages : 0,
            'page'          => $page,
            'pages_display' => 3
        );

        $element_component = new ElementComponent;
        $pagination = $element_component->pagination(parent::$theme, $options);

        $STATUS = M_Category::$STATUS;

        $this->view->setVars(array(
            'categories' => $categories,
            'pagination' => $pagination,
            'STATUS'     => $STATUS
        ));
        $this->view->pick(parent::$theme . '/category/index');
    }
}
