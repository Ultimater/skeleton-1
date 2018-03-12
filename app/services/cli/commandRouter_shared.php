<?php
use Perch\Command\Router;
use Perch\Environment\Runmode;

return function() {
    $config = $this->getConfig();

    $namespace = $config->namespace;
    $runmodeConfig = $config[Runmode::get()];
    $routeConfig = $runmodeConfig->route;
    $commandConfig = $runmodeConfig->command;

    $router = new Router();
    $router->setDI($this);

    $router->setDefaultCommand($routeConfig->default->command);
    $router->setDefaultNamespace($namespace . '\\Commands');
    $router->setDefaultDirectory($config->path->appDir . 'commands/');
    $router->registerCommands($commandConfig->use->toArray());
    $router->registerAliases($commandConfig->alias->toArray());

    return $router;
};
