<?php

namespace Checkfood\Domain\Repository;

use Checkfood\Domain\Model\Category;

interface CategoryWriteRepositoryInterface
{
    /**
     * @param Category $category
     *
     * @return int
     */
    public function insert(Category $category): int;

    /**
     * @param Category $category
     *
     * @return int
     */
    public function update(Category $category): int;

    /**
     * @param string $uuid
     *
     * @return int
     */
    public function delete(string $uuid): int;
}
