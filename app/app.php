<?php declare(strict_types=1);

use Checkfood\Application\ServiceProvider\ApplicationServiceProvider;
use Checkfood\Application\ServiceProvider\CommandBusServiceProvider;
use Checkfood\Application\ServiceProvider\InfrastructureServiceProvider;
use Checkfood\Application\ServiceProvider\MigrationDoctrineServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use WhoopsPimple\WhoopsServiceProvider;

$app = new Silex\Application();

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(new WhoopsServiceProvider());
$app->register(new DoctrineServiceProvider());
$app->register(new MigrationDoctrineServiceProvider());
$app->register(new ApplicationServiceProvider());
$app->register(new CommandBusServiceProvider());
$app->register(new InfrastructureServiceProvider());

return $app;
