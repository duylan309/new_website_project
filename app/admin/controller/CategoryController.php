<?php
namespace Thue\Admin\Controller;

class CategoryController extends BaseController
{
    public function initialize()
    {
        parent::authenticateUser();
        parent::initialize();
    }

    public function indexAction()
    {
        $this->view->setVars(array());
        $this->view->pick(parent::$theme . '/category/index');
    }
}
