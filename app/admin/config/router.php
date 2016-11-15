<?php
$router->add('/{query:(/.*)*}', array(
    'module'     => 'admin',
    'controller' => 'dashboard',
    'action'     => 'index'
))->setName('dashboard');

$router->setUriSource(\Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI);

$router->notFound(array(
    'module'     => 'admin',
    'controller' => 'error',
    'action'     => 'error404'
));
