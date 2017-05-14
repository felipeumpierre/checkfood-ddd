<?php

namespace Checkfood\Infrastructure\Repository;

use Checkfood\Domain\Model\Category;
use Checkfood\Domain\Repository\CategoryReadRepositoryInterface;
use Collections\Vector;

class CategoryReadRepository extends BaseRepository implements CategoryReadRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function findById(int $id): Category
    {
        $query = $this->connection->createQueryBuilder()
            ->select('category_id', 'name')
            ->from('category')
            ->where('category_id = ?')
            ->setParameter(0, $id);

        $category = $query->execute()->fetch();

        if (empty($category)) {
            return new Category();
        }

        return Category::factory($category);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): Vector
    {
        $vector = new Vector();

        $query = $this->connection->createQueryBuilder()
            ->select('category_id', 'name')
            ->from('category');

        $categories = $query->execute()->fetchAll();
        if (empty($categories)) {
            return $vector;
        }

        foreach ($categories as $category) {
            $vector->add(
                Category::factory($category)
            );
        }

        return $vector;
    }

    /**
     * {@inheritdoc}
     */
    public function findAllMealsByCategoryId(int $id): Vector
    {
        return new Vector();
    }
}
