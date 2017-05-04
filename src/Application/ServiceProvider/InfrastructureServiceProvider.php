<?php

namespace Checkfood\Application\ServiceProvider;

use Checkfood\Domain\Repository\CategoryReadRepositoryInterface;
use Checkfood\Domain\Repository\CategoryWriteRepositoryInterface;
use Checkfood\Infrastructure\Repository\CategoryReadRepository;
use Checkfood\Infrastructure\Repository\CategoryWriteRepository;
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
        $container[CategoryReadRepositoryInterface::class] = function (Container $container) {
            return new CategoryReadRepository($container['db']);
        };

        $container[CategoryWriteRepositoryInterface::class] = function (Container $container) {
            return new CategoryWriteRepository($container['db']);
        };
    }
}
