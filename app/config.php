<?php

// application configuration
$app['name'] = 'checkfood';
$app['debug'] = true;
$app['app.log_root_dir'] = sprintf('/var/log/%s', $app['name']);

// db config
$app['dbs.options'] = [
    'default' => [
        'dbname' => getenv('DATABASE_DBNAME'),
        'user' => getenv('DATABASE_USER'),
        'password' => getenv('DATABASE_PASSWORD'),
        'host' => getenv('DATABASE_HOST'),
        'driver' => getenv('DATABASE_DRIVER'),
    ],
];

$app['db.migrations.name'] = 'Checkfood Migrations';
$app['db.migrations.namespace'] = 'Checkfood\Infrastructure\DoctrineMigrations';
$app['db.migrations.generation_path'] = __DIR__ . '/../src/Infrastructure/DoctrineMigrations';
$app['db.migrations.paths'] = [__DIR__ . '/../src/Infrastructure/DoctrineMigrations'];
$app['db.migrations.table_name'] = 'doctrine_migration_versions';
