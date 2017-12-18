<?php
use Phalcon\Di\Service\SharedService;
use Perch\Command\Router;
use Perch\Environment;

return new SharedService(function() {
    $config = $this->getConfig();

    $runmodeConfig = $config[Environment::getRunmode()];
    $routeConfig = $runmodeConfig->route;

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
