<?php

namespace Checkfood\Domain\Entity;

class Category extends Aggregate\AggregateId
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
    public function create(int $id, string $name): self
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
}
