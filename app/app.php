<?php declare(strict_types=1);

use Checkfood\Application\ServiceProvider\CommandBusServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

$app = new Silex\Application();

$app->register(new DoctrineServiceProvider(), [
    'db.options' => [
        'dbname' => getenv('MYSQL_DBNAME'),
        'host' => getenv('MYSQL_HOST'),
        'user' => getenv('MYSQL_USER'),
        'password' => getenv('MYSQL_PASSWORD'),
    ],
]);

$app->register(new CommandBusServiceProvider());

return $app;
