<?php
namespace Thue\Admin\Controller;

use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
    public static $theme;

    public function initialize()
    {
        self::$theme = 'default';
        $this->view->setMainView(self::$theme . '/');
    }

    public function outputJson($response)
    {
        $this->view->disable();
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setJsonContent($response);
        $this->response->send();
        exit;
    }
}
