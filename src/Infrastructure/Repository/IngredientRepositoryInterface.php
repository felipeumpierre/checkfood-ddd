<?php

namespace Checkfood\Infrastructure\Repository;

use Checkfood\Domain\Entity\Ingredient;

interface IngredientRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return Ingredient
     */
    public function findById(int $id): Ingredient;

    /**
     * @return Collections\Vector
     */
    public function findAll(): Collections\Vector;

    /**
     * @param int $id
     *
     * @return Collections\Vector
     */
    public function findAllMealsByIngredientId(int $id): Collections\Vector;
}
