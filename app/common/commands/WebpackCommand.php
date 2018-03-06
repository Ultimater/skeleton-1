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
                    'optional' => [],
                ],
                'opts' => [
                    'e|environment?' => 'Environment to use (default is dev).',
                ],
            ]);
    }

    /**
     *
     */
    public function execute(array $input)
    {
        $opts = $input['opts'];
        $environment = $opts['environment'] ?? Environment::DEVELOPMENT;

        if (!Environment::isValidEnvironment($environment)) {
            throw new \Exception('Invalid environment.');
        }

        $config = $this->getDI()
            ->getConfig();

        $configDir = $config->path->configDir;
        $packageDir = $config->path->packageDir;
        $nodeModulesDir = $packageDir . 'node_modules/';

        $cmdName = $environment === Environment::DEVELOPMENT ? 'webpack-dev-server' : 'webpack';
        $mode = $environment === Environment::DEVELOPMENT ? 'development' : 'production';

        $exports = $this->createVariableExports($config, [
            'NODE_PATH' => $nodeModulesDir,
        ]);
        $cmdEsc = escapeshellcmd($nodeModulesDir . '.bin/' . $cmdName);
        $modeEsc = escapeshellarg($mode);
        $configEsc = escapeshellarg($configDir . 'webpack.js');

        $cmd = "$exports && $cmdEsc --config=$configEsc --mode=$modeEsc";
        $ret = passthru($cmd);
    }
}
