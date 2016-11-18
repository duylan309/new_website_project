<?php
namespace Thue\Admin\Controller;

use Thue\Data\Model\M_User;
use Thue\Data\Model\R_UserAdmin;

class AuthController extends BaseController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function loginAction()
    {
        if ($this->session->has('USER')) {
            return $this->response->redirect(array('for' => 'dashboard'));
        }

        $referral_url = $this->request->getQuery('referral_url');
        $form = new \Thue\Admin\Form\AuthLoginForm;

        if ($this->request->isPost()) {
            if (!$form->isValid($this->request->getPost())) {
                $this->flashSession->error('Thông tin không hợp lệ');
                goto RETURN_RESPONSE;
            }

            $email = $this->request->getPost('email');
            $password = md5($this->request->getPost('password'));

            $user = M_User::findFirst(array(
                'conditions' => 'email = :email:',
                'bind' => array('email' => $email)
            ));

            if (!$user) {
                $this->flashSession->error('Không tồn tại tài khoản này');
                goto RETURN_RESPONSE;
            }

            $user_admin = R_UserAdmin::findFirst(array(
                'conditions' => 'user_id = :user_id:',
                'bind' => array('user_id' => $user->user_id)
            ));

            if (!$user_admin) {
                $this->flashSession->error('Tài khoản này không có quyền quản trị');
                goto RETURN_RESPONSE;
            }

            if ($user_admin->password != $password) {
                $this->flashSession->error('Mật khẩu không chính xác');
                goto RETURN_RESPONSE;
            }

            if ($user_admin->status == R_UserAdmin::STATUS_INACTIVE) {
                $this->flashSession->error('Tài khoản này chưa được kích hoạt');
                goto RETURN_RESPONSE;
            }

            $user_admin->logined_at = date('Y-m-d H:i:s');
            try {
                $user_admin->save();

                $R_UserAdmin = new R_UserAdmin;
                $b = $R_UserAdmin->getModelsManager()->createBuilder();

                $b->columns(array(
                    'u1.user_id',
                    'u1.email',
                    'u1.name',
                    'ua1.permission',
                    'ua1.status'
                ));
                $b->from(array('u1' => '\Thue\Data\Model\M_User'));
                $b->innerJoin('\Thue\Data\Model\R_UserAdmin', 'ua1.user_id = u1.user_id', 'ua1');

                $b->where('u1.user_id = :user_id:', array('user_id' => $user->user_id));
                $b->Andwhere('ua1.status = :status:', array('status' => R_UserAdmin::STATUS_ACTIVE));

                $user = $b->getQuery()->execute();

                if ($user && isset($user[0])) {
                    parent::setUserSession($user[0]);

                    $redirect = $this->url->get(array('for' => 'dashboard'));

                    if ($referral_url != '') {
                        $redirect = $referral_url;
                    }

                    return $this->response->redirect($redirect);
                }

                return $this->response->redirect(array('for' => 'auth_login', 'query' => '?' . http_build_query(array('referral_url' => $referral_url))));
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
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

        return $this->response->redirect(array('for' => 'dashboard'));
    }
}
