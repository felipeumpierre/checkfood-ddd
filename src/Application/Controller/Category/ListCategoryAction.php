<?php

namespace Checkfood\Application\Controller\Category;

use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Checkfood\Business\Command\Category\ListCategoryCommand;

final class ListCategoryAction
{
    /**
     * @var CommandBus
     */
    protected $bus;

    /**
     * ListCategoryAction constructor.
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
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $response = $this->bus->handle(
            new ListCategoryCommand(
                $request->get('id')
            )
        );

        return new JsonResponse(
            $response,
            Response::HTTP_OK
        );
    }
}