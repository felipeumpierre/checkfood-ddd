<?php

namespace Checkfood\Infrastructure\Repository;

use Checkfood\Domain\Model\Category;
use Checkfood\Domain\Repository\CategoryWriteRepositoryInterface;

class CategoryWriteRepository extends BaseRepository implements CategoryWriteRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function insert(Category $category): int
    {
        return $this->connection->insert(
            'category',
            $category->toArray()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function update(Category $category): int
    {
        return $this->connection->update(
            'category',
            $category->toArray(),
            ['id' => $category->getId()]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function delete(int $id): int
    {
        return $this->connection->delete(
            'category',
            ['id' => $id]
        );
    }
}
