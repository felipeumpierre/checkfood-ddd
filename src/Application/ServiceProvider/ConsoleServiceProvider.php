<?php

namespace Checkfood\Application\ServiceProvider;

use Knp\Console\Application;
use Knp\Console\ConsoleEvent;
use Knp\Console\ConsoleEvents as KnpConsoleEvents;
use Knp\Provider\ConsoleServiceProvider as KnpConsoleServiceProvider;
use Pimple\Container;
use Psr\Log\LoggerAwareInterface;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleCommandEvent;

final class ConsoleServiceProvider extends KnpConsoleServiceProvider
{
    /**
     * @inheritdoc
     */
    public function register(Container $container)
    {
        /** @var \Symfony\Component\EventDispatcher\EventDispatcher $dispatcher */
        $dispatcher = $container['dispatcher'];
        $dispatcher->addListener(KnpConsoleEvents::INIT, [$this, 'registerServices']);
        $dispatcher->addListener(ConsoleEvents::COMMAND, [$this, 'registerConsoleLogger']);

        parent::register($container);
    }

    /**
     * @param ConsoleEvent $event
     */
    public function registerServices(ConsoleEvent $event)
    {
        $application = $event->getApplication();
        $container = $event->getApplication()->getSilexApplication();

        $application->setDispatcher($container['dispatcher']);
        $application->setCatchExceptions(true);
    }

    /**
     * @param ConsoleCommandEvent $event
     */
    public function registerConsoleLogger(ConsoleCommandEvent $event)
    {
        $command = $event->getCommand();

        $app = $command->getApplication();
        if (!$app instanceof Application) {
            return;
        }
        $container = $app->getSilexApplication();

        // Register logger with the command when supported
        if ($command instanceof LoggerAwareInterface) {
            $command->setLogger($container['logger']);
        }
    }
}