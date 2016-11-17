<?php
namespace Thue\Admin\Controller;

use Phalcon\Mvc\Controller;
use Thue\Data\Model\R_UserAdmin;

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

    public function authenticateUser()
    {
        $authenticate = true;
        $user = array();

        if (!$this->session->has('USER')) {
            if (!$this->cookies->has('USER')) {
                $authenticate = false;
            } else {
                $cookie = $this->cookies->get('USER');
                $user = @unserialize($cookie->getValue());

                if ($user && is_array($user) && isset($user['user_id'])) {
                    $authenticate = true;
                } else {
                    $authenticate = false;
                    $user = array();
                }
            }
        } else {
            $user = $this->session->get('USER');
        }

        if ($authenticate && count($user)) {
            $cacheName = md5(serialize(array(
                'BaseController',
                'authenticateUser',
                'M_User',
                'findFirst',
                $user['user_id']
            )));

            $result = $this->cache->get($cacheName);

            if (!$result) {
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

                $b->where('u1.user_id = :user_id:', array('user_id' => $user['user_id']));
                $b->where('ua1.status = :status:', array('status' => R_UserAdmin::STATUS_ACTIVE));

                $result = $b->getQuery()->execute();
                $authenticate = false;

                if ($result && isset($result[0])) {
                    $result = $result[0];
                    $authenticate = true;

                    self::setUserSession($result);
                    $this->cache->save($cacheName, $result, 120);
                }
            }
        }

        if (!$authenticate) {
            $this->session->remove('USER');
            $cookie = $this->cookies->get('USER');
            $cookie->delete();

            $request_uri = $this->url->getBaseUri();

            if (
                $request_uri != $this->url->get(array('for' => 'dashboard'))
                && $request_uri != $this->url->get(array('for' => 'auth_login'))
            ) {
                $referral_url = $request_uri;
            } else {
                $referral_url = $this->url->get(array('for' => 'dashboard'));
            }

            $query = http_build_query(array('referral_url' => $referral_url));
            $url = $this->url->get(array('for' => 'auth_login', 'query' => '?' . $query));

            header('Location: ' . $url);
            exit();
        }
    }

    public function setUserSession($user)
    {
        if ($user && count($user)) {
            $session = array(
                'user_id'    => $user['user_id'],
                'name'       => $user['name'],
                'email'      => $user['email'],
                'permission' => $user['permission']
            );

            $this->session->set('USER', $session);
            $this->cookies->set('USER', serialize($session), strtotime('+1 hour'));
        } else {
            $this->session->remove('USER');
            $cookie = $this->cookies->get('USER');
            $cookie->delete();
        }
    }
}
