<?php

namespace Checkfood\Application\ServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Checkfood\Application\Controller;

class ApplicationServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $container)
    {
        $this->registerCategoryController($container);
    }

    /**
     * @param Container $container
     */
    private function registerCategoryController(Container $container)
    {
        $container[Controller\Category\CreateCategoryAction::class] = function (Container $container) {
            return new Controller\Category\CreateCategoryAction(
                $container['bus']
            );
        };

        $container[Controller\Category\ListCategoryAction::class] = function (Container $container) {
            return new Controller\Category\ListCategoryAction(
                $container['bus']
            );
        };
    }
}
