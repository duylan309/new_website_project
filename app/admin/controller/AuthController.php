<?php
namespace Thue\Admin\Controller;

class AuthController extends BaseController
{
    public function loginAction()
    {

    }

    public function logoutAction()
    {
        $this->session->remove('USER');
        $cookie = $this->cookies->get('USER');
        $cookie->delete();

        return $this->response->redirect(array('for' => 'auth_login'));
    }
}
