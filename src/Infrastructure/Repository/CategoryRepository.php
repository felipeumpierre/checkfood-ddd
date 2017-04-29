<?php

namespace Checkfood\Infrastructure\Repository;

use Checkfood\Domain\Model\Category;
use Checkfood\Domain\Repository\CategoryRepositoryInterface;
use Collections\Vector;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return Category
     */
    public function findById(int $id): Category
    {
        return new Category();
    }

    /**
     * @return Vector
     */
    public function findAll(): Vector
    {
        return new Vector();
    }

    /**
     * @param int $id
     *
     * @return Vector
     */
    public function findAllMealsByCategoryId(int $id): Vector
    {
        return new Vector();
    }
}
