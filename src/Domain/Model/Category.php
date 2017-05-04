<?php

namespace Checkfood\Domain\Model;

final class Category extends Aggregate\AggregateId implements \JsonSerializable
{
    /**
     * @param string $name
     */
    protected $name;

    /**
     * @param int $id
     * @param string $name
     *
     * @return self
     */
    public static function create(int $id, string $name): self
    {
        $category = new self;
        $category->id = $id;
        $category->name = $name;

        return $category;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Category $category
     *
     * @return bool
     */
    public function equal(Category $category): bool
    {
        return $this->name == $category->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
