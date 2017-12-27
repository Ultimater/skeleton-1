<?php
use Phalcon\Mvc\View\Engine\Volt;

return function($view) {
    $config = $this->getConfig();

    $volt = new Volt($view, $this);
    $volt->setOptions([
        'compiledPath'      => $config->path->tmpDir . 'volt/',
        'compiledExtension' => '.compiled',
    ]);

    return $volt;
};
