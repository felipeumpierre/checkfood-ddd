<?php

namespace Checkfood\Infrastructure\Repository;

use Checkfood\Domain\Model\Meal;
use Checkfood\Infrastructure\Collection\MealCollection;
use Collections\Vector;

interface MealRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return Meal
     */
    public function findById(int $id): Meal;

    /**
     * @param int $restaurantId
     *
     * @return Vector
     */
    public function findAllByRestaurant(int $restaurantId): Vector;

    /**
     * @return Vector
     */
    public function findAll(): Vector;
}