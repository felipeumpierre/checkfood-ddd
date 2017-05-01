<?php

namespace Checkfood\Application\ServiceProvider;

use Doctrine\DBAL\Migrations\Configuration\Configuration;
use Doctrine\DBAL\Migrations\Tools\Console\Helper\ConfigurationHelper;
use Knp\Console\ConsoleEvent;
use Knp\Console\ConsoleEvents;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Doctrine\DBAL\Migrations\Tools\Console\Command;
use Symfony\Component\Console\Helper\QuestionHelper;

class MigrationDoctrineServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $container)
    {
        $container['db.migrations.namespace'] = 'DoctrineMigrations';
        $container['db.migrations.generation_path'] = null;
        $container['db.migrations.paths'] = [];
        $container['db.migrations.table_name'] = null;
        $container['db.migrations.name'] = null;

        $container['db.migrations.configuration'] = function (Container $container) {
            $config = new Configuration($container['db']);
            $config->setMigrationsNamespace($container['db.migrations.namespace']);

            if ($container['db.migrations.generation_path']) {
                $config->setMigrationsDirectory($container['db.migrations.generation_path']);
            }

            foreach ($container['db.migrations.paths'] as $path) {
                $config->registerMigrationsFromDirectory($path);
            }

            if ($container['db.migrations.name']) {
                $config->setName($container['db.migrations.name']);
            }

            if ($container['db.migrations.table_name']) {
                $config->setMigrationsTableName($container['db.migrations.table_name']);
            }

            return $config;
        };

        $container['dispatcher']->addListener(ConsoleEvents::INIT, [$this, 'registerCommandsAndHelpers']);
    }

    /**
     * @param ConsoleEvent $event
     */
    public function registerCommandsAndHelpers(ConsoleEvent $event)
    {
        $application = $event->getApplication();
        $container = $event->getApplication()->getSilexApplication();
        $helpers = $application->getHelperSet();

        if ($application->has('question')) {
            $helpers->set(new QuestionHelper());
        }

        $helpers->set(new ConfigurationHelper(null, $container['db.migrations.configuration']));

        $application->addCommands([
            new Command\ExecuteCommand(),
            new Command\GenerateCommand(),
            new Command\LatestCommand(),
            new Command\MigrateCommand(),
            new Command\StatusCommand(),
            new Command\VersionCommand(),
        ]);
    }
}