<?php
namespace App\Modules\Main;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

/**
 *
 */
class Module implements ModuleDefinitionInterface
{

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            __NAMESPACE__ . '\\Controllers' => __DIR__ . '/controllers',
            __NAMESPACE__ . '\\Models'      => __DIR__ . '/models',
        ]);
        $loader->register();
    }

    /**
     *
     */
    public function registerServices(DiInterface $di = null)
    {
        $di->getDispatcher()
            ->setDefaultNamespace(__NAMESPACE__ . '\\Controllers');
    }
}
