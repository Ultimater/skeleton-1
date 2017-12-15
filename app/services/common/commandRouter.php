<?php
use Phalcon\Di\Service\SharedService;
use Perch\Command\Router;

return new SharedService(function() {
    $config = $this->getConfig();

    $routeConfig = $config->runmode->route;
    $cmdConfig = $config->commands;

    $router = new Router();
    $router->setDI($this);
    if (isset($routeConfig->default['command'])) {
        $router->setDefaultCommand($routeConfig->default->command);
    }
    $router->setDefaultNamespace($cmdConfig->default->namespace);
    $router->registerCommands($cmdConfig->use->toArray());
    $router->registerAliases($cmdConfig->alias->toArray());

    return $router;
});
