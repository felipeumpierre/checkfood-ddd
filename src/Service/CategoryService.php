<?php

namespace Checkfood\Service;

use Checkfood\Domain\Model\Category;
use Checkfood\Infrastructure\Repository\CategoryRepositoryInterface;
use Collections\Vector;

class CategoryService
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * CategoryService constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function findById(int $id): Category
    {
        return $this->categoryRepository->findById($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): Vector
    {
        return $this->categoryRepository->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function findAllMealsByCategoryId(int $id): Vector
    {
        return $this->categoryRepository->findAllMealsByCategoryId($id);
    }
}