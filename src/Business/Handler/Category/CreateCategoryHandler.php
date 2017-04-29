<?php

namespace Checkfood\Business\Handler\Category;

use Checkfood\Business\Command\CommandInterface;
use Checkfood\Business\Handler\HandlerInterface;
use Checkfood\Domain\Repository\CategoryRepositoryInterface;

final class CreateCategoryHandler implements HandlerInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * CreateCategoryHandler constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param CommandInterface $command
     *
     * @return mixed
     */
    public function handle(CommandInterface $command)
    {
        // all the business logic here

        return;
    }
}
