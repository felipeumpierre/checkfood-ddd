<?php declare(strict_types=1);

$app = new Silex\Application();

$app->register(new CommandBusServiceProvider());

return $app;
