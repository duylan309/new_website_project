<?php
$router->add('/{query:(/.*)*}', array(
    'module'     => 'admin',
    'controller' => 'dashboard',
    'action'     => 'index'
))->setName('dashboard');

// --------- Auth
$router->add('/auth/login{query:(/.*)*}', array(
    'module'     => 'admin',
    'controller' => 'auth',
    'action'     => 'login'
))->setName('auth_login');

$router->add('/auth/logout', array(
    'module'     => 'admin',
    'controller' => 'auth',
    'action'     => 'logout'
))->setName('auth_logout');
// Auth ---------

$router->setUriSource(\Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI);
$router->notFound(array(
    'module'     => 'admin',
    'controller' => 'error',
    'action'     => 'error404'
));
