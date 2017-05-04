<?php

namespace Checkfood\Infrastructure\Repository;

use Checkfood\Domain\Model\Category;
use Checkfood\Domain\Repository\CategoryRepositoryInterface;
use Collections\Vector;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
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
        return new Vector();
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

    public function delete(Category $category): int
    {
        return $this->connection->delete(
            'category',
            ['category_id' => $category->getId()]
        );
    }
}
