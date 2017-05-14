<?php

namespace Checkfood\Application\Controller\Category;

use Ramsey\Uuid\Uuid;
use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Checkfood\Business\Command\Category\CreateCategoryCommand;

final class CreateCategoryAction
{
    /**
     * @var CommandBus
     */
    protected $bus;

    /**
     * CreateCategoryAction constructor.
     *
     * @param CommandBus $bus
     */
    public function __construct(CommandBus $bus)
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
        $this->bus->handle(
            new CreateCategoryCommand(
                (string) Uuid::uuid4(),
                $request->request->get('name')
            )
        );

        return new Response(null, Response::HTTP_NO_CONTENT);
    }
}
