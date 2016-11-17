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

        if ($this->request->isPost()) {
            if (!$form->isValid($this->request->getPost())) {
                $this->flashSession->error('Thông tin không hợp lệ');
                goto RETURN_RESPONSE;
            }
        }

        RETURN_RESPONSE:
            $this->view->setVars(array(
                'form' => $form
            ));
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
