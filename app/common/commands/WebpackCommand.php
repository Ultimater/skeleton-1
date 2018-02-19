<?php
namespace App\Commands;

use Perch\Command;
use Perch\Command\ArgParser\Standard as ArgParser;
use Perch\Command\HelpPrinter\Standard as HelpPrinter;
use Perch\Environment;

/**
 *
 */
class WebpackCommand extends Command
{

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setShortDescription('Webpack')
            ->setLongDescription('Run Webpack.')
            ->setArgHandlers(ArgParser::class, HelpPrinter::class, [
                'args' => [
                    'required' => [],
                    'optional' => ['environment'],
                ],
                'opts' => [],
            ]);
    }

    /**
     *
     */
    public function execute($input)
    {
        $env = $input[0] ?? Environment::DEV;

        $config = $this->getDI()
            ->getConfig();

        $appDir = $config->path->appDir;
        $packageDir = $config->path->packageDir;
        $nodeModulesDir = $packageDir . 'node_modules/';

        $cmdName = $env === Environment::DEV ? 'webpack-dev-server' : 'webpack';
        $mode = $env === Environment::DEV ? 'development' : 'production';

        $exports = $this->createVariableExports([
            'APP_DIR'   => $config->path->appDir,
            'NODE_PATH' => $nodeModulesDir,
        ]);
        $cmdEsc = escapeshellcmd($nodeModulesDir . '.bin/' . $cmdName);
        $modeEsc = escapeshellarg($mode);
        $configEsc = escapeshellarg($appDir . 'config/webpack.js');

        $cmd = "$exports && $cmdEsc --config=$configEsc --mode=$modeEsc";
        $ret = passthru($cmd);
    }

    /**
     * Make this multi-platform.
     */
    protected function createVariableExports($envArr)
    {
        $exportArr = [];
        foreach ($envArr as $name => $value) {
            $exportArr[] = "export $name=" . escapeshellarg($value);
        }
        return implode (' ', $exportArr);
    }
}
