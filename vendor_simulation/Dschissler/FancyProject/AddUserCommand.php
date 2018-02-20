<?php
namespace Dschissler\FancyProject;

use Perch\Command;
use Perch\Command\ArgParser\Standard as ArgParser;
use Perch\Command\HelpPrinter\Standard as HelpPrinter;

/**
 *
 */
class AddUserCommand extends Command
{

    /**
     *
     */
    public function configure()
    {
        $this
            ->setShortDescription('Add User')
            ->setLongDescription('Add a user to the system and assign it a role.')
            ->setArgHandlers(ArgParser::class, HelpPrinter::class, [
                'args' => [
                    'required' => ['email', 'role'],
                    'optional' => [],
                ],
                'opts' => [
                    'p|password:'   => 'set user password (otherwise it will need to be on first login).',
                    'a|activate'    => 'activate',
                    'E|send-email?' => 'send email confirmation with optional message',
                ],
            ]);
    }

    /**
     *
     */
    public function execute($input)
    {
        echo "Run: " . self::CLASS . "\n";
        print_r($args);
        echo "\n";
    }
}
