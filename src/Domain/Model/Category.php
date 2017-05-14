<?php

namespace Checkfood\Domain\Model;

use Ramsey\Uuid\Uuid;

final class Category extends Aggregate\AggregateId implements \JsonSerializable
{
    /**
     * @param string $name
     */
    protected $name;

    /**
     * @var string
     */
    protected $createdAt;

    /**
     * @param array $elem
     *
     * @return self
     */
    public static function factory(array $elem): self
    {
        return self::create(
            $elem['uuid'] ?? Uuid::uuid4(),
            $elem['name'],
            $elem['createdAt'] ?? null
        );
    }

    /**
     * @param string $uuid
     * @param string $name
     * @param string|null $createdAt
     *
     * @return Category
     */
    public static function create(string $uuid, string $name, string $createdAt = null): self
    {
        $category = new self;
        $category->uuid = $uuid;
        $category->name = $name;
        $category->createdAt = $createdAt ?? (new \DateTimeImmutable())->format(DATE_ISO8601);

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
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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
    public function jsonSerialize(): array
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'created_at' => $this->createdAt
        ];
    }
}
