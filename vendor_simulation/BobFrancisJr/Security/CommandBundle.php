<?php
namespace BobFrancisJr\Security;

class CommandBundle
{
    public static function getCommands()
    {
        return [
            'BobFrancisJr\Security\Commands\IntruderDetectCommand',
        ];
    }
}
