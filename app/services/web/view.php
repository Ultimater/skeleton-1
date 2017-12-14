<?php
use Phalcon\Di\Service\SharedService;
use Phalcon\Mvc\View;

return new SharedService(function() {
    $config = $this->getConfig();

    $view = new View();
    $view->setDI($this);
    // $view->setViewsDir($viewsDir);
    // $view->setLayoutsDir('_layouts/');
    // $view->setPartialsDir('_partials/');

    // $view->registerEngines([
    //     '.volt' => 'voltShared',
    // ]);

    return $view;
});
