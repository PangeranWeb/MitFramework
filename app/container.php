<?php
$container = new \Slim\Container;

$container = $app->getContainer();
$container['db'] = function ($c) {
    $setting = $c->get('settings')['database'];
    $config = new \Doctrine\DBAL\Configuration();
    $connectionParams = array(
        'dbname' => $setting['name'],
        'user' => $setting['user'],
        'password' => $setting['pass'],
        'host' => $setting['host'].":".['port'],
        'driver' => 'pdo_mysql',
    );
    $connection = \Doctrine\DBAL\DriverManager::getConnection(
        $connectionParams,
        $config
    );
    return $connection->createQueryBuilder();

};
