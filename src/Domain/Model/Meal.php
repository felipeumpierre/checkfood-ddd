<?php

namespace Checkfood\Domain\Model;

use Ramsey\Uuid\Uuid;

class Meal extends Aggregate\AggregateId implements \JsonSerializable
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
     * @param array $elem
     *
     * @return self
     */
    public static function factory(array $elem): self
    {
        return self::create(
            $elem['uuid'],
            $elem['fk_category'],
            $elem['price']
        );
    }

    /**
     * @param string $uuid
     * @param int $categoryId
     * @param double $price
     *
     * @return self
     */
    public function create(string $uuid, int $categoryId, double $price): self
    {
        $meal = new self;
        $meal->uuid = $uuid;
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

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'uuid' => $this->uuid,
            'category_id' => $this->categoryId,
            'price' => $this->price,
        ];
    }
}
