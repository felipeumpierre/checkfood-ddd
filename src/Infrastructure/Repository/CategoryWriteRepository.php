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
            [
                'uuid' => $category->getUuid(),
                'name' => $category->getName(),
                'created_at' => $category->getCreatedAt(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function update(Category $category): int
    {
        return $this->connection->update(
            'category',
            (array) $category,
            ['uuid' => $category->getUuid()]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function delete(string $uuid): int
    {
        return $this->connection->delete(
            'category',
            ['uuid' => $uuid]
        );
    }
}
