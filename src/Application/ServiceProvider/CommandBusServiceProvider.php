<?php

use League\Tactician\CommandBus;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class CommandBusServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $pimple)
    {
        $this->registerCommandBus($pimple);
    }

    /**
     * Register the command bus
     *
     * @param Container $pimple
     */
    private function registerCommandBus(Container $pimple)
    {
        $pimple['bus'] = function () {
            return new CommandBus([]);
        };
    }
}