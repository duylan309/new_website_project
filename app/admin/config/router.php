<?php
$router->setUriSource(\Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI);

$router->notFound(array(
    'module'     => 'admin',
    'controller' => 'error',
    'action'     => 'error404'
));
