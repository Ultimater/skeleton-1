<?php
namespace BobFrancisJr\Security\Commands;

use Perch\Command;

/**
 *
 */
class IntruderDetectCommand extends Command
{

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setShortDescription('Detect Intruder')
            ->setLongDescription('Detect Evil Bad Intruders.');
    }

    /**
     *
     */
    public function execute($input)
    {
        echo "Detecting Intruders: " . self::CLASS . "\n";
    }
}
