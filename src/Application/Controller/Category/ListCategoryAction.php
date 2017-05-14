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
        return new JsonResponse(
            $this->bus->handle(
                new ListCategoryCommand(
                    $request->get('id')
                )
            ),
            Response::HTTP_OK
        );
    }
}