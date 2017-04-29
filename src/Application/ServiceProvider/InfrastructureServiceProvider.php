<?php

namespace Checkfood\Application\ServiceProvider;

use Checkfood\Domain\Repository\CategoryRepositoryInterface;
use Checkfood\Infrastructure\Repository\CategoryRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class InfrastructureServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $container)
    {
        $this->registerRepository($container);
    }

    /**
     * @param Container $container
     */
    private function registerRepository(Container $container)
    {
        $container[CategoryRepositoryInterface::class] = function (Container $container) {
            return new CategoryRepository($container['db']);
        };
    }
}