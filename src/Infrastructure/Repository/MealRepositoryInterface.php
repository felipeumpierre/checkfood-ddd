<?php

namespace Checkfood\Infrastructure\Repository;

use Checkfood\Domain\Entity\Meal;
use Checkfood\Infrastructure\Collection\MealCollection;

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
     * @return Collections\Vector
     */
    public function findAllByRestaurant(int $restaurantId): Collections\Vector;

    /**
     * @return Collections\Vector
     */
    public function findAll(): Collections\Vector;
}