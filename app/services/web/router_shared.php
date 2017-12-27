<?php
use Perch\Environment;
use Perch\Mvc\Router;

return function() {
    $config = $this->getConfig();

    $runmodeConfig = $config[Environment::WEB_RUNMODE];

    $routeConfig = $runmodeConfig->route;
    $defaultModule = $routeConfig->default->module;

    $router = new Router();
    $router->removeExtraSlashes(true);
    $router->setDefaultModule($defaultModule);

    $isSingleModule = $routeConfig['singleModule'] ?? false;
    if ($isSingleModule) {
        $router->addBasicDefaultRoutes($defaultModule);
    } else {
        $modules = $runmodeConfig->module->toArray();
        foreach ($modules as $moduleName) {
            $router->addStdModule($moduleName);
        }
    }

    return $router;
};
