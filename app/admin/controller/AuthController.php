<?php
namespace Thue\Admin\Controller;

class AuthController extends BaseController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function loginAction()
    {
        $form = new \Thue\Admin\Form\AuthLoginForm;
        $this->view->pick(parent::$theme . '/auth/login');
    }

    public function logoutAction()
    {
        $this->session->remove('USER');
        $cookie = $this->cookies->get('USER');
        $cookie->delete();

        return $this->response->redirect(array('for' => 'auth_login'));
    }
}
