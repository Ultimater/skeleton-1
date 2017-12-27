<?php
use Phalcon\Mvc\View;
use Phalcon\Di\Service\SharedService;

return new SharedService(function() {
    $config = $this->getConfig();
    $router = $this->getRouter();

    $moduleName = $router->getModuleName();
    $viewsDir = $config->path->webmodulesDir . $moduleName . '/views/';

    $view = new View();
    $view->setDI($this);
    $view->setViewsDir($viewsDir);
    $view->setLayoutsDir('_layouts/');
    $view->setPartialsDir('_partials/');
    $view->registerEngines([
        '.volt' => 'voltShared',
    ]);

    return $view;
});
