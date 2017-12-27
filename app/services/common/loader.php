<?php
use Phalcon\Di\Service\SharedService;
use Perch\Loader;
use Perch\Environment;

return new SharedService(function() {
    $config = $this->getConfig();

    $runmode = Environment::getRunmode();
    $namespace = $config->namespace;
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

    if ($runmode === Environment::WEB_RUNMODE) {
        $runmodeConfig = $config[Environment::WEB_RUNMODE];

        // NOTE: We could do this in our AutoAppLoader delivered via Composer package.
        $modulesArr = [];
        foreach ($runmodeConfig->module as $moduleName) {
            $modulesArr[$moduleName] = [
                'className' => $namespace . '\\Modules\\' . ucfirst($moduleName) . '\\Module',
                'path'      => $path->webmodulesDir . $moduleName . '/Module.php',
            ];
        }
        $loader->registerModules($modulesArr);
    }

    $loader->register();

    return $loader;
});
