<?php

namespace Checkfood\Business\Handler\Category;

use Checkfood\Business\Command\Category\CreateCategoryCommand;
use Checkfood\Domain\Model\Category;
use Checkfood\Domain\Repository\CategoryWriteRepositoryInterface;

final class CreateCategoryHandler
{
    /**
     * @var CategoryWriteRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * CreateCategoryHandler constructor.
     *
     * @param CategoryWriteRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryWriteRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param CreateCategoryCommand $command
     *
     * @return mixed
     */
    public function handle(CreateCategoryCommand $command)
    {
        return $this->categoryRepository->insert(
            Category::create(
                $command->uuid,
                $command->name
            )
        );
    }
}
