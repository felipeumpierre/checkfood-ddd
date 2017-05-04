<?php

namespace Checkfood\Business\Handler\Category;

use Checkfood\Business\Command\Category\ListCategoryCommand;
use Checkfood\Business\Command\CommandInterface;
use Checkfood\Business\Handler\HandlerInterface;
use Checkfood\Domain\Repository\CategoryReadRepositoryInterface;

final class ListCategoryHandler implements HandlerInterface
{
    /**
     * @var CategoryReadRepositoryInterface
     */
    protected $categoryReadRepository;

    /**
     * ListCategoryHandler constructor.
     *
     * @param CategoryReadRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryReadRepositoryInterface $categoryRepository)
    {
        $this->categoryReadRepository = $categoryRepository;
    }

    /**
     * @param ListCategoryCommand|CommandInterface $command
     *
     * @return mixed
     */
    public function handle(CommandInterface $command)
    {
        if (empty($command->id)) {
            return $this->categoryReadRepository->findAll();
        }

        return $this->categoryReadRepository->findById($command->id);
    }
}