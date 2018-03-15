<?php
use Perch\Environment\Runmode;
use Perch\Mvc\Router;

return function() {
    $config = $this->getConfig();

    $runmodeConfig = $config[Runmode::WEB];

    $routeConfig = $runmodeConfig->route;
    $defaultModule = $routeConfig->default->module;
    $isSingleModule = $routeConfig['singleModule'] ?? false;

    $router = new Router();
    $router->removeExtraSlashes(true);
    $router->setDefaultModule($defaultModule);

    if ($isSingleModule) {
        $router->addBasicDefaultRoutes($defaultModule);
    } else {
        $modules = $routeConfig->module->toArray();
        foreach ($modules as $moduleName) {
            $router->addStdModule($moduleName);
        }
    }

    return $router;
};
