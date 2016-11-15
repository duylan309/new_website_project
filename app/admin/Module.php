<?php
namespace Thue\Admin;

class Module
{
    public function registerAutoloaders()
    {
        $loader = new \Phalcon\Loader;

        $loader->registerNamespaces(array(
            'Thue\Admin\Controller'     => ROOT . '/app/admin/controller/',
            'Thue\Admin\Form'           => ROOT . '/app/admin/form/',
            'Thue\Admin\Form\Validator' => ROOT . '/app/admin/form/validator/',
            'Thue\Data\Lib'             => ROOT . '/app/data/lib/',
            'Thue\Data\Model'           => ROOT . '/app/data/model/',
            'Thue\Data\Repo'            => ROOT . '/app/data/repo/'
        ));
        $loader->register();
    }

    public function registerServices($di)
    {
        $config = $di->getService('config')->getDefinition();

        $di->setShared('volt', function ($view, $di) use ($config) {
            $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);

            $volt->setOptions(array(
                'compiledPath'      => ROOT . '/cache/admin/view/',
                'compiledSeparator' => $config->volt->separator,
                'compileAlways'     => (bool)$config->volt->debug,
                'stat'              => (bool)$config->volt->stat
            ));

            $compiler = $volt->getCompiler();
            $compiler->addFunction('http_build_query', 'http_build_query');

            return $volt;
        });

        $di->setShared('view', function () {
            $view = new \Phalcon\Mvc\View();
            $view->setViewsDir(ROOT . '/app/admin/view/');
            $view->registerEngines(array('.volt' => 'volt'));

            return $view;
        });
    }
}
