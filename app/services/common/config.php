<?php
use Perch\Application\AutoApp;
use Phalcon\Di\Service\SharedService;

return new SharedService(function() {
    return AutoApp::getConfig();
});
