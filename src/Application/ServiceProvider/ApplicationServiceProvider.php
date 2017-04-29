<?php

namespace Checkfood\Application\ServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Checkfood\Application\Controller\CreateCategoryAction;

class ApplicationServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $container)
    {
        $this->registerController($container);
    }

    /**
     * @param Container $container
     */
    private function registerController(Container $container)
    {
        $container[CreateCategoryAction::class] = function (Container $container) {
            return new CreateCategoryAction(
                $container['bus']
            );
        };
    }
}