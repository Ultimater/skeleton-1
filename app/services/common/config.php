<?php
use Schmalcon\Application\AutoApp\Config as AutoAppConfig;
use Phalcon\Di\Service\SharedService;

return new SharedService(function() {
    return require AutoAppConfig::getDefault()->path->configDir . '/config.php';
});
