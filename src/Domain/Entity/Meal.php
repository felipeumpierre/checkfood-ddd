<?php

namespace Checkfood\Domain\Entity;

class Meal extends Aggregate\AggregateId
{
    /**
     * @param int $categoryId
     */
    protected $categoryId;

    /**
     * @param double $price
     */
    protected $price;

    /**
     * @param int $id
     * @param int $categoryId
     * @param double $price
     *
     * @return self
     */
    public function create(int $id, int $categoryId, double $price): self
    {
        $meal = new self;
        $meal->id = $id;
        $meal->categoryId = $categoryId;
        $meal->price = $price;
        
        return $meal;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @return double
     */
    public function getPrice(): double
    {
        return $this->price;
    }

    /**
     * @param Meal $meal
     *
     * @return bool
     */
    public function equal(Meal $meal): bool
    {
        return ($this->categoryId === $meal->categoryId && $this->price === $meal->price);
    }
}
