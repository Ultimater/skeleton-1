<?php
namespace App\Commands;

use Perch\Command;
use Perch\Command\ArgParser\Standard as ArgParser;
use Perch\Command\HelpPrinter\Standard as HelpPrinter;

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
        $config = $this->getDI()
            ->getConfig();

        $env = $input[0] ?? 'dev';

        switch ($env) {
            case 'dev':
                $npmCmd = 'dev';
                break;
            case 'staging':
            case 'build':
                $npmCmd = 'build';
                break;
            default:
                throw new \Exception('Webpack environment is invalid.');
        }

        $exports = $this->createVariableExports([
            'APP_DIR'     => $config->path->appDir,
            'PACKAGE_DIR' => $config->path->packageDir,
        ]);
        $packageDirEsc = escapeshellarg($config->path->packageDir);

        $cmd = "$exports && npm --prefix=$packageDirEsc run $npmCmd";
        $ret = passthru($cmd);
    }

    /**
     *
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
