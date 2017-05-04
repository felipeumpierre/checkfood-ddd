<?php

namespace Checkfood\Business\Handler\Category;

use Checkfood\Business\Command\Category\CreateCategoryCommand;
use Checkfood\Business\Command\CommandInterface;
use Checkfood\Business\Handler\HandlerInterface;
use Checkfood\Domain\Model\Category;
use Checkfood\Domain\Repository\CategoryWriteRepositoryInterface;

final class CreateCategoryHandler implements HandlerInterface
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
     * @param CreateCategoryCommand|CommandInterface $command
     *
     * @return mixed
     */
    public function handle(CommandInterface $command)
    {
        return $this->categoryRepository->insert(
            Category::create(
                $command->id,
                $command->name
            )
        );
    }
}
