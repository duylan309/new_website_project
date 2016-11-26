<?php
date_default_timezone_set('Asia/Bangkok');
ini_set('display_errors', true);
error_reporting(E_ALL);

define('ROOT', realpath(dirname(dirname(dirname(__FILE__)))));
require_once ROOT . '/vendor/autoload.php';

// Usage: php cli.php <task name> <action name> <params>
// Example: php cli.php cache clear

try {
    $loader = new \Phalcon\Loader;
    $loader->registerDirs(array(
        ROOT . '/app/admin/task/'
    ));
    $loader->register();

    $di = new \Phalcon\DI\FactoryDefault\CLI;
    $di_mvc = new \Phalcon\DI\FactoryDefault;

    $loader->registerNamespaces(array(
        'Thue\Data\Lib'  => ROOT . '/app/data/lib/',
        'ThueData\Model' => ROOT . '/app/data/model/'
    ))->register();

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
            $logger = new \Phalcon\Logger\Adapter\File(ROOT . '/log/admin/cli_db_master.log');

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
            $logger = new \Phalcon\Logger\Adapter\File(ROOT . '/log/admin/cli_db_slave.log');

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

    $di->setShared('urlMvc', function() use ($config) {
        $url = new \Phalcon\Mvc\Url;
        $url->setBaseUri($config->application->base_url);
        return $url;
    });

    $di_mvc->setShared('router', function() {
        $router = new \Phalcon\Mvc\Router(false);
        require_once ROOT . '/app/admin/config/router.php';
        $router->removeExtraSlashes(true);
        return $router;
    });

    $di->setShared('diMvc', function() use ($di_mvc) {
        return $di_mvc;
    });

    $di->setShared('modelsMetadata', function () use ($config) {
        $meta_data = new \Phalcon\Mvc\Model\MetaData\Files(array(
            'metaDataDir' => ROOT . '/cache/data/model/',
            'lifetime'    => 31536000
        ));
        return $meta_data;
    });

    $di->setShared('logger', function () {
        $logger = new \Phalcon\Logger\Adapter\File(ROOT . '/log/admin/cli_debug.log');
        return $logger;
    });

    $console = new \Phalcon\CLI\Console;
    $console->setDI($di);

    $arguments = array();
    $params = array();

    foreach ($argv as $k => $arg) {
        if ($k == 1) {
            $arguments['task'] = $arg;
        } elseif ($k == 2) {
            $arguments['action'] = $arg;
        } elseif ($k >= 3) {
            $params[] = $arg;
        }
    }

    $arguments['params'] = $params;
    $console->handle($arguments);
} catch (\Exception $e) {
    echo $e->getMessage();
}
