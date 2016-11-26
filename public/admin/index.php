<?php
date_default_timezone_set('Asia/Bangkok');
ini_set('display_errors', true);
error_reporting(E_ALL);

define('ROOT', realpath(dirname(dirname(dirname(__FILE__)))));
require_once ROOT . '/vendor/autoload.php';

try {
    $loader = new \Phalcon\Loader;
    $loader->registerDirs(array(
        ROOT . '/app/admin/',
        ROOT . '/app/data/'
    ))->register();

    $di = new \Phalcon\DI\FactoryDefault;

    require_once ROOT . '/app/admin/config/parameter.php';
    $config = new \Phalcon\Config($parameter);
    $di->setShared('config', $config);

    $di->setShared('db', function () use ($config) {
        $connection = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            'host'     => $config->db->host,
            'port'     => $config->db->port,
            'username' => $config->db->username,
            'password' => $config->db->password,
            'dbname'   => $config->db->name,
            'charset'  => $config->db->charset
        ));

        if ($config->db->debug) {
            $e = new \Phalcon\Events\Manager;
            $logger = new \Phalcon\Logger\Adapter\File(ROOT . '/log/admin/db_master.log');

            $e->attach('db', function ($event, $connection) use ($logger) {
                if ($event->getType() == 'beforeQuery') {
                    $sql = $connection->getSQLVariables();
                    if (count($sql)) {
                        $logger->log($connection->getSQLStatement() . ' ' . join(', ', $sql), \Phalcon\Logger::INFO);
                    } else {
                        $logger->log($connection->getSQLStatement(), \Phalcon\Logger::INFO);
                    }
                }
            });
            $connection->setEventsManager($e);
        }

        return $connection;
    });

    $di->setShared('db_slave', function () use ($config) {
        $connection = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            'host'     => $config->db_slave->host,
            'port'     => $config->db->port,
            'username' => $config->db_slave->username,
            'password' => $config->db_slave->password,
            'dbname'   => $config->db_slave->name,
            'charset'  => $config->db_slave->charset
        ));

        if ($config->db_slave->debug) {
            $e = new \Phalcon\Events\Manager;
            $logger = new \Phalcon\Logger\Adapter\File(ROOT . '/log/admin/db_slave.log');

            $e->attach('db', function ($event, $connection) use ($logger) {
                if ($event->getType() == 'beforeQuery') {
                    $sql = $connection->getSQLVariables();
                    if (count($sql)) {
                        $logger->log($connection->getSQLStatement() . ' ' . join(', ', $sql), \Phalcon\Logger::INFO);
                    } else {
                        $logger->log($connection->getSQLStatement(), \Phalcon\Logger::INFO);
                    }
                }
            });
            $connection->setEventsManager($e);
        }

        return $connection;
    });

    $di->setShared('url', function () use ($config) {
        $url = new \Phalcon\Mvc\Url;
        $url->setBaseUri($config->application->base_url);
        return $url;
    });

    $di->setShared('router', function () {
        $router = new \Phalcon\Mvc\Router(false);
        require_once ROOT . '/app/admin/config/router.php';
        $router->removeExtraSlashes(true);
        return $router;
    });

    if ($config->cache->type == 'memcache') {
        $di->setShared('cache', function () use ($config) {
            $data_cache = new \Phalcon\Cache\Frontend\Data(array(
                'lifetime' => $config->cache->lifetime,
                'prefix'   => $config->cache->prefix
            ));
            $cache = new \Phalcon\Cache\Backend\Memcache($data_cache, array(
                'host'       => $config->cache->memcache->host,
                'port'       => $config->cache->memcache->port,
                'persistent' => $config->cache->memcache->persistent
            ));
            return $cache;
        });
    } elseif ($config->cache->type == 'redis') {
        $di->setShared('cache', function () use ($config) {
            $data_cache = new \Phalcon\Cache\Frontend\Data(array(
                'lifetime' => $config->cache->lifetime,
                'prefix'   => $config->cache->prefix
            ));
            $cache = new \Phalcon\Cache\Backend\Redis($data_cache, array(
                'host'       => $config->cache->redis->host,
                'port'       => $config->cache->redis->port,
                'auth'       => $config->cache->redis->auth,
                'persistent' => $config->cache->redis->persistent
            ));
            return $cache;
        });
    } elseif ($config->cache->type == 'apc') {
        $di->setShared('cache', function () use ($config) {
            $data_cache = new \Phalcon\Cache\Frontend\Data(array(
                'lifetime' => $config->cache->lifetime,
                'prefix'   => $config->cache->prefix
            ));
            $cache = new \Phalcon\Cache\Backend\Apc($data_cache, array());
            return $cache;
        });
    } else {
        $di->setShared('cache', function () use ($config) {
            $data_cache = new \Phalcon\Cache\Frontend\Data(array(
                'lifetime' => $config->cache->lifetime,
                'prefix'   => $config->cache->prefix
            ));
            $cache = new \Phalcon\Cache\Backend\File($data_cache, array(
                'cacheDir' => ROOT . '/cache/admin/data/'
            ));
            return $cache;
        });
    }

    $di->setShared('modelsMetadata', function () use ($config) {
        $meta_data = new \Phalcon\Mvc\Model\MetaData\Files(array(
            'metaDataDir' => ROOT . '/cache/data/model/',
            'lifetime'    => 31536000
        ));
        return $meta_data;
    });

    if ($config->cache->type == 'memcache') {
        $di->setShared('modelsCache', function () use ($config) {
            $data_cache = new \Phalcon\Cache\Frontend\Data(array(
                'lifetime' => $config->cache->lifetime,
                'prefix'   => $config->cache->prefix
            ));
            $cache = new \Phalcon\Cache\Backend\Memcache($data_cache, array(
                'host'       => $config->cache->memcache->host,
                'port'       => $config->cache->memcache->port,
                'persistent' => $config->cache->memcache->persistent
            ));
            return $cache;
        });
    } elseif ($config->cache->type == 'redis') {
        $di->setShared('modelsCache', function () use ($config) {
            $data_cache = new \Phalcon\Cache\Frontend\Data(array(
                'lifetime' => $config->cache->lifetime,
                'prefix'   => $config->cache->prefix
            ));
            $cache = new \Phalcon\Cache\Backend\Redis($data_cache, array(
                'host'       => $config->cache->redis->host,
                'port'       => $config->cache->redis->port,
                'auth'       => $config->cache->redis->auth,
                'persistent' => $config->cache->redis->persistent
            ));
            return $cache;
        });
    } elseif ($config->cache->type == 'apc') {
        $di->setShared('modelsCache', function () use ($config) {
            $data_cache = new \Phalcon\Cache\Frontend\Data(array(
                'lifetime' => $config->cache->lifetime,
                'prefix'   => $config->cache->prefix
            ));
            $cache = new \Phalcon\Cache\Backend\Apc($data_cache, array());
            return $cache;
        });
    } else {
        $di->setShared('cache', function () use ($config) {
            $data_cache = new \Phalcon\Cache\Frontend\Data(array(
                'lifetime' => $config->cache->lifetime,
                'prefix'   => $config->cache->prefix
            ));
            $cache = new \Phalcon\Cache\Backend\File($data_cache, array(
                'cacheDir' => ROOT . '/cache/admin/data/'
            ));
            return $cache;
        });
    }

    $di->setShared('security', function () {
        $security = new \Phalcon\Security;
        return $security;
    });

    $di->setShared('session', function () use ($config) {
        $session = new \Phalcon\Session\Adapter\Files;
        $session->start();
        return $session;
    });

    $di->setShared('crypt', function () use ($config) {
        $crypt = new \Phalcon\Crypt;
        $crypt->setKey($config->application->cookie_key);
        return $crypt;
    });

    $di->setShared('cookies', function () {
        $cookies = new \Phalcon\Http\Response\Cookies;
        $cookies->useEncryption(false);
        return $cookies;
    });

    $di->setShared('flashSession', function () {
        return new \Phalcon\Flash\Session(array(
            'error'   => 'alert alert-danger',
            'success' => 'alert alert-success',
            'warning' => 'alert alert-warning'
        ));
    });

    $di->setShared('dispatcher', function () {
        $dispatcher = new \Phalcon\Mvc\Dispatcher;
        $dispatcher->setDefaultNamespace('Thue\Admin\Controller\\');

        $eventsManager = new \Phalcon\Events\Manager;
        $eventsManager->attach('dispatch', function ($event, $dispatcher, $exception) {
            $type = $event->getType();

            if ($type == 'beforeException') {
                if (
                    $exception->getCode() == \Phalcon\Mvc\Dispatcher::EXCEPTION_HANDLER_NOT_FOUND
                    || $exception->getCode() == \Phalcon\Mvc\Dispatcher::EXCEPTION_ACTION_NOT_FOUND
                ) {
                    $dispatcher->forward(array(
                        'module'     => 'admin',
                        'controller' => 'error',
                        'action'     => 'error404'
                    ));
                    return false;
                } else {
                    $dispatcher->forward(array(
                        'module'     => 'admin',
                        'controller' => 'error',
                        'action'     => 'error',
                        'params'     => array($exception)
                    ));
                    return false;
                }
            }
        });

        $dispatcher->setEventsManager($eventsManager);
        return $dispatcher;
    });

    $di->setShared('logger', function () {
        $logger = new \Phalcon\Logger\Adapter\File(ROOT . '/log/admin/debug.log');
        return $logger;
    });

    $di->setShared('t', function () use ($di) {
        $session = $di->getShared('session');
        $request = $di->getShared('request');

        if ($session->has('LANG')) {
            $language = $session->get('LANG');
            if (!in_array($language, array('vi', 'en'))) {
                $language = 'vi';
            }
        } else {
            $language = 'vi';
        }

        require_once ROOT . '/app/data/lang/' . $language . '.php';
        return new \Phalcon\Translate\Adapter\NativeArray(array('content' => $content));
    });

    $application = new \Phalcon\Mvc\Application($di);
    $application->registerModules(array(
        'admin' => array(
            'className' => 'Thue\Admin\Module',
            'path'      => ROOT . '/app/admin/Module.php'
        ),
        'data' => array(
            'className' => 'Thue\Data\Module',
            'path'      => ROOT . '/app/data/Module.php'
        )
    ));
    echo $application->handle()->getContent();
} catch (\Exception $e) {
    throw new \Phalcon\Exception($e->getMessage());
}
