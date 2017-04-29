<?php

namespace Checkfood\Application\ServiceProvider;

use Bezdomni\Tactician\Pimple\PimpleLocator;
use Checkfood\Business\Command\Category\CreateCategoryCommand;
use Checkfood\Business\Handler\Category\CreateCategoryHandler;
use Checkfood\Domain\Repository\CategoryRepositoryInterface;
use Checkfood\Infrastructure\Tactician\DbalTransactionMiddleware;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Plugins\LockingMiddleware;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class CommandBusServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $container)
    {
        $this->registerCommandBusMiddleware($container);
        $this->registerCommandBus($container);
        $this->registerLocator($container);
        $this->registerHandlers($container);
    }

    /**
     * @param Container $container
     */
    private function registerCommandBusMiddleware(Container $container)
    {
        $container['bus.middleware'] = function (Container $container) {
            return [
                new LockingMiddleware(),
                new DbalTransactionMiddleware($container['db']),
                new CommandHandlerMiddleware(
                    new ClassNameExtractor(),
                    $container['bus.locator'],
                    new HandleInflector()
                ),
            ];
        };
    }

    /**
     * Register the command bus
     *
     * @param Container $container
     */
    private function registerCommandBus(Container $container)
    {
        $container['bus'] = function (Container $container) {
            return new CommandBus($container['bus.middleware']);
        };
    }

    /**
     * @param Container $container
     */
    private function registerLocator(Container $container)
    {
        $container['bus.locator'] = function (Container $container) {
            return new PimpleLocator(
                $container,
                [
                    CreateCategoryCommand::class => CreateCategoryHandler::class,
                ]
            );
        };
    }

    /**
     * @param Container $container
     */
    private function registerHandlers(Container $container)
    {
        $container[CreateCategoryHandler::class] = function (Container $container) {
            return new CreateCategoryHandler(
                $container[CategoryRepositoryInterface::class]
            );
        };
    }
}