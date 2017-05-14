<?php

namespace Checkfood\Business\Handler\Category;

use Checkfood\Business\Command\Category\ListCategoryCommand;
use Checkfood\Domain\Repository\CategoryReadRepositoryInterface;

final class ListCategoryHandler
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
     * @param ListCategoryCommand $command
     *
     * @return mixed
     */
    public function handle(ListCategoryCommand $command)
    {
        if (empty($command->id)) {
            return $this->categoryReadRepository->findAll();
        }

        return $this->categoryReadRepository->findById($command->id);
    }
}