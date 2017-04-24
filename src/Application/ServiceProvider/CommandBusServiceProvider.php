<?php

namespace Checkfood\Application\ServiceProvider;

use Bezdomni\Tactician\Pimple\PimpleLocator;
use Checkfood\Business\Command\Category\CreateCategoryCommand;
use League\Tactician\CommandBus;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class CommandBusServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $container)
    {
        $this->registerCommandBus($container);
        $this->registerLocator($container);
    }

    /**
     * Register the command bus
     *
     * @param Container $container
     */
    private function registerCommandBus(Container $container)
    {
        $container['bus'] = function () {
            return new CommandBus([]);
        };
    }

    private function registerLocator(Container $container)
    {
        $container['bus.locator'] = function (Container $container) {
            return new PimpleLocator(
                $container,
                [
                    CreateCategoryCommand::class => CreateCategoryCommand::class,
                ]
            );
        };
    }

    private function registerHandlers(Container $container)
    {

    }
}