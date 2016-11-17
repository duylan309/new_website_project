<?php
$router->add('/{query:(/.*)*}', array(
    'module'     => 'admin',
    'controller' => 'dashboard',
    'action'     => 'index'
))->setName('dashboard');

// --------- Auth
$router->add('/user/login', array(
    'module'     => 'admin',
    'controller' => 'auth',
    'action'     => 'login'
));

$router->add('/user/logout', array(
    'module'     => 'admin',
    'controller' => 'auth',
    'action'     => 'logout'
));
// Auth ---------

$router->setUriSource(\Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI);
$router->notFound(array(
    'module'     => 'admin',
    'controller' => 'error',
    'action'     => 'error404'
));
