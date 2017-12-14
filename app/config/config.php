<?php
use Phalcon\Config;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Schmalcon\Application\AutoApp\Config as AutoAppConfig;

return AutoAppConfig::getDefault()
    ->copy()
    ->merge(new Config([
        'path' => [
            'extraDir' => '/merged/extra/dir/',
        ],
        'database' => [
            'adapter'  => Mysql::class,
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname'   => '',
            'charset'  => 'utf8',
        ],
    ]));
