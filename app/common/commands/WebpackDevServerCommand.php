<?php
namespace App\Commands;

use Perch\Command;

/**
 *
 */
class WebpackDevServerCommand extends Command
{

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setShortDescription('Webpack Dev Server')
            ->setLongDescription('Run the Webpack Dev Server.');
    }

    /**
     *
     */
    public function execute($args)
    {
        $config = $this->getDI()
            ->getConfig();

        echo "The Webpack Dev Server is now running in: " . self::CLASS . "\n";

        $exports = $this->createVariableExports([
            'APP_DIR'     => $config->path->appDir,
            'PACKAGE_DIR' => $config->path->packageDir,
        ]);
        $packageDirEsc = escapeshellarg($config->path->packageDir);

        $cmd = "$exports && npm --prefix=$packageDirEsc run dev";
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
