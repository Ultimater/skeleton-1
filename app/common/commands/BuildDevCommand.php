<?php
namespace App\Commands;

use Perch\Command;

/**
 *
 */
class BuildDevCommand extends Command
{

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setShortDescription('Build Dev')
            ->setLongDescription('Build the development environment.');
    }

    /**
     *
     */
    public function execute($args)
    {
        echo "We are preparing such complicated shit for development in: " . self::CLASS . "\n";

        $this->command('webpackDevServer', []);
    }
}
