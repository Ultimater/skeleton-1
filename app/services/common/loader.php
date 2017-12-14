<?php
use Phalcon\Di\Service\SharedService;
use Schmalcon\Loader;

return new SharedService(function() {
    $config = $this->getConfig();

    $namespace = $config->namespace;
    $runmode = $config->runmode;
    $path = $config->path;

    // NOTE: This will would be automatically done in the Composer autoload.
    //       Its only done here now for simulation.
    include $path->packageDir . 'vendor_simulation/require.php';

    // Setup Composer autoload
    include $path->packageDir . 'vendor/autoload.php';

    $loader = new Loader();
    $loader->registerNamespaces([
        $namespace . '\\Commands' => $path->commonDir . 'commands',
        $namespace . '\\Models'   => $path->commonDir . '/models',
        $namespace                => $path->libraryDir . 'library',
    ]);

    if (isset($runmode['module'])) {
        // NOTE: We could do this in our AutoAppLoader delivered via Composer package.
        $modulesArr = [];
        foreach ($runmode->module as $moduleName) {
            $modulesArr[$moduleName] = [
                'className' => $namespace . '\\Modules\\' . ucfirst($moduleName) . '\\Module',
                'path'      => $path->modulesDir . $moduleName . '/Module.php',
            ];
        }
        $loader->registerModules($modulesArr);
    }

    $loader->register();

    return $loader;
});
