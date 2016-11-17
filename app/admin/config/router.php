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

// --------- Category
$router->add('/category{query:(/.*)*}', array(
    'module'     => 'admin',
    'controller' => 'category',
    'action'     => 'index'
))->setName('category_index');

$router->add('/category/add{query:(/.*)*}', array(
    'module'     => 'admin',
    'controller' => 'category',
    'action'     => 'add'
))->setName('category_add');

$router->add('/category/edit{query:(/.*)*}', array(
    'module'     => 'admin',
    'controller' => 'category',
    'action'     => 'edit'
))->setName('category_edit');

$router->add('/category/delete{query:(/.*)*}', array(
    'module'     => 'admin',
    'controller' => 'category',
    'action'     => 'delete'
))->setName('category_delete');
// Category ---------

$router->setUriSource(\Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI);
$router->notFound(array(
    'module'     => 'admin',
    'controller' => 'error',
    'action'     => 'error404'
));
