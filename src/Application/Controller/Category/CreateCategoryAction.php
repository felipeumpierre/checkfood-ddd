<?php

namespace Checkfood\Application\Controller;

use Ramsey\Uuid\Uuid;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Checkfood\Business\Command\Category\CreateCategoryCommand;

class CreateCategoryAction
{
    /**
     * @var CommandBus
     */
    protected $bus;

    /**
     * @param CommandBus $bus
     */
    public function __constructor(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $id = (string) Uuid::uuid4();

        $this->bus->handle(
            new CreateCategoryCommand(
                $id,
                $request->request->get('name')
            )
        );

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
