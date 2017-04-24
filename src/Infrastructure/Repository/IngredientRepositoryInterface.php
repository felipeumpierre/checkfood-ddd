<?php

namespace Checkfood\Infrastructure\Repository;

use Checkfood\Domain\Model\Ingredient;
use Collections\Vector;

interface IngredientRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return Ingredient
     */
    public function findById(int $id): Ingredient;

    /**
     * @return Vector
     */
    public function findAll(): Vector;

    /**
     * @param int $id
     *
     * @return Vector
     */
    public function findAllMealsByIngredientId(int $id): Vector;
}
