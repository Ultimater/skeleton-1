<?php
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Db\Adapter\Pdo\Postgresql;

return function() {
    $config = $this->getConfig();

    $class = $config->database->adapter;
    $params = [
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        'charset'  => $config->database->charset,
    ];

    if ($class == Postgresql::class) {
        unset($params['charset']);
    }

    $connection = new $class($params);

    return $connection;
};
