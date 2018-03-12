<?php
use Perch\Loader;
use Perch\Environment\Runmode;

return function() {
    $config = $this->getConfig();

    $namespace = $config->namespace;
    $path = $config->path;

    // NOTE: This will would be automatically done in the Composer autoload.
    //       Its only done here now for simulation.
    include $path->packageDir . 'vendor_simulation/require.php';

    // Setup Composer autoload
    include $path->packageDir . 'vendor/autoload.php';

    $loader = new Loader();
    $loader->registerNamespaces([
        $namespace . '\\Commands' => $path->appDir . 'commands',
        $namespace . '\\Models'   => $path->commonDir . '/models',
        $namespace                => $path->libraryDir . 'library',
    ]);

    $loader->register();

    return $loader;
};
