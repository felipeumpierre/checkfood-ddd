#!/usr/bin/env php
<?php

use Checkfood\Application\ServiceProvider\ConsoleServiceProvider;

$app = require_once __DIR__ . '/bootstrap.php';
$app->register(new ConsoleServiceProvider(), [
    'console.name' => 'Checkfood',
    'console.version' => '0.0.0',
    'console.project_directory' => __DIR__ . '/..',
]);

/** @var \Symfony\Component\Console\Application $console */
$console = $app['console'];
$console->run();