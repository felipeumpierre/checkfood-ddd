<?php

namespace Checkfood\Infrastructure\Repository;

use Checkfood\Domain\Entity\Category;

interface CategoryRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return Category
     */
    public function findById(int $id): Category;

    /**
     * @return Collections\Vector
     */
    public function findAll(): Collections\Vector;

    /**
     * @param int $id
     *
     * @return Collections\Vector
     */
    public function findAllMealsByCategoryId(int $id): Collections\Vector;
}
