<?php
namespace Thue\Admin\Controller;

class ErrorController extends BaseController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function errorAction($e)
    {
        $this->view->setVars(array(
            'code'    => $e->getCode(),
            'message' => $e->getMessage()
        ));
        $this->view->pick(parent::$theme . '/error/error');
    }

    public function error404Action()
    {
        $this->response->setStatusCode(404, 'Page not found');
        $this->view->pick(parent::$theme . '/error/error404');
    }
}
