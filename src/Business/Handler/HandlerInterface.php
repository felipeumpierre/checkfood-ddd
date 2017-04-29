<?php

namespace Checkfood\Business\Handler;

use Checkfood\Business\Command\CommandInterface;

interface HandlerInterface
{
    /**
     * @param CommandInterface $command
     *
     * @return mixed
     */
    public function handle(CommandInterface $command);
}