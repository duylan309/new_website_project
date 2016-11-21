<?php
namespace Thue\Admin\Controller;

class StaticPageController extends BaseController
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
            'pages_display' => 10
        );

        $element_component = new ElementComponent;
        $pagination = $element_component->pagination(parent::$theme, $options);

        $TYPE = M_Category::$TYPE;
        $STATUS = M_Category::$STATUS;

        $this->view->setVars(array(
            'categories' => $categories,
            'pagination' => $pagination,
            'TYPE'       => $TYPE,
            'STATUS'     => $STATUS
        ));
        $this->view->pick(parent::$theme . '/category/index');
    }
}
