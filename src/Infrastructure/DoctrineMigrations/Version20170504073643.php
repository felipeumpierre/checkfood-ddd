<?php

namespace Checkfood\Infrastructure\DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Ramsey\Uuid\Uuid;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170504073643 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->connection->insert(
            'category',
            [
                'uuid' => Uuid::uuid4(),
                'name' => 'Test 1',
            ]
        );

        $this->connection->insert(
            'category',
            [
                'uuid' => Uuid::uuid4(),
                'name' => 'Test 2',
            ]
        );

        $this->connection->insert(
            'category',
            [
                'uuid' => Uuid::uuid4(),
                'name' => 'Test 3',
            ]
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->connection->delete('category', ['id' => 1]);
        $this->connection->delete('category', ['id' => 2]);
        $this->connection->delete('category', ['id' => 3]);
    }
}
