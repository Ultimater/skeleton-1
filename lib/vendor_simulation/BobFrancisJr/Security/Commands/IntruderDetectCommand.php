<?php
namespace BobFrancisJr\Security\Commands;

use Schmalcon\Command;

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
    public function execute($args)
    {
        echo "Detecting Intruders: " . self::CLASS . "\n";
    }
}
