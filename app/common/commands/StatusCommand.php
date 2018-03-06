<?php
namespace App\Commands;

use Perch\Command;

/**
 *
 */
class StatusCommand extends Command
{

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setShortDescription('Status')
            ->setLongDescription('Show the system status.');
    }

    /**
     *
     */
    public function execute($input)
    {
        echo __CLASS__ . "\n";
    }
}
