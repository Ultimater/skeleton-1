<?php

return function($view) {
    $config = $this->getConfig();

    $appDir = $config->path->appDir;
    $voltCacheDir = $config->path->voltCacheDir;
    $configDir = $config->path->configDir;

    // switch (ENV) {
    //     case DIST_ENV:
    //         $compileAlways = false;
    //         $stat = false;
    //         break;
    //     case DEV_ENV:
    //         $compileAlways = true;
    //         $stat = true;
    //         break;
    // }

    $compileAlways = true;
    $stat = true;

    $volt = new Volt($view, $this);
    $volt->setOptions([
        'compileAlways' => $compileAlways,
        'stat'          => $stat,
        'compiledPath'  => function($templatePath) use ($voltCacheDir, $phalconDir) {
            // This makes the phalcon view path into a portable fragment
            $templateFrag = str_replace($phalconDir, '', $templatePath);
            // Allows modules to share the compiled layouts and partials paths
            $templateFrag = preg_replace('/^modules\/[a-z]+\/views\/(_partials|_layouts)\/..\/..\/..\/..\//', '', $templateFrag);
            // Allows modules to share the compiled layouts and partials paths
            $templateFrag = preg_replace('/modules\/[a-z]+\/views\/..\/..\/..\//', '', $templateFrag);
            // Replace '/' with a safe '%%'
            $templateFrag = str_replace('/', '%%', $templateFrag);

            if (strpos($templateFrag, '..') !== false) {
                throw new \Exception('Error: template fragment has ".." in path.');
            }

            return "{$voltCacheDir}{$templateFrag}.php";
        },
    ]);

    return $volt;
};
