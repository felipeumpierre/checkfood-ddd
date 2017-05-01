<?php

namespace Checkfood\Business\Handler\Category;

use Checkfood\Business\Command\CommandInterface;
use Checkfood\Business\Handler\HandlerInterface;
use Checkfood\Domain\Repository\CategoryRepositoryInterface;

final class ListCategoryHandler implements HandlerInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * ListCategoryHandler constructor.
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
        if (empty($command->id)) {
            return $this->categoryRepository->findAll();
        }

        return $this->categoryRepository->findById($command->id);
    }
}