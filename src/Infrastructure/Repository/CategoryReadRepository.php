<?php

namespace Checkfood\Infrastructure\Repository;

use Checkfood\Domain\Model\Category;
use Checkfood\Domain\Repository\CategoryReadRepositoryInterface;
use Collections\Vector;

class CategoryReadRepository extends BaseRepository implements CategoryReadRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return Category
     */
    public function findById(int $id): Category
    {
        $query = $this->connection->createQueryBuilder()
            ->select('category_id', 'name')
            ->from('category')
            ->where('category_id = ?')
            ->setParameter(0, $id);

        $stmt = $query->execute();
        $category = $stmt->fetch();

        if (empty($category)) {
            return new Category();
        }

        return Category::create(
            $category['category_id'],
            $category['name']
        );
    }

    /**
     * @return Vector
     */
    public function findAll(): Vector
    {
        $vector = new Vector();

        $query = $this->connection->createQueryBuilder()
            ->select('category_id', 'name')
            ->from('category');

        $stmt = $query->execute();
        $categories = $stmt->fetchAll();
        if (empty($categories)) {
            return $vector;
        }

        foreach ($categories as $category) {
            $vector->add(
                Category::create(
                    $category['category_id'],
                    $category['name']
                )
            );
        }

        return $vector;
    }

    /**
     * @param int $id
     *
     * @return Vector
     */
    public function findAllMealsByCategoryId(int $id): Vector
    {
        return new Vector();
    }
}
