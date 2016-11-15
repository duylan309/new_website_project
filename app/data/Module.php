<?php
namespace Thue\Data;

class Module
{
    public function registerAutoloaders()
    {
        $loader = new \Phalcon\Loader;

        $loader->registerNamespaces([
            'Thue\Data\Lib'   => ROOT . '/app/data/lib/',
            'Thue\Data\Model' => ROOT . '/app/data/model/',
            'Thue\Data\Repo'  => ROOT . '/app/data/repo/'
        ]);
        $loader->register();
    }

    public function registerServices($di)
    {

    }
}
