<?php
use Perch\Mvc\Router;

return function() {
    $config = $this->getConfig();

    $runmode = $config->runmode;

    $routeConfig = $runmode->route;
    $defaultModule = $routeConfig->default->module;

    $router = new Router();
    $router->removeExtraSlashes(true);
    $router->setDefaultModule($defaultModule);

    // I dislike this more than green haired lesbians who voted for Hillary.
    // if (!isset($_GET['_url'])) {
    //    $router->setUriSource(Router::URI_SOURCE_SERVER_REQUEST_URI);
    // }

    $isSingleModule = $routeConfig['singleModule'] ?? false;
    if ($isSingleModule) {
        $router->addBasicDefaultRoutes($defaultModule);
    } else {
        $modules = $runmode->module->toArray();
        foreach ($modules as $moduleName) {
            $router->addStdModule($moduleName);
        }
    }

    return $router;
};
