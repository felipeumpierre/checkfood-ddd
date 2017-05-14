<?php

namespace Checkfood\Infrastructure\DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170501161651 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('category');
        $table->addColumn('category_id', Type::INTEGER, ['unsigned' => true, 'autoincrement' => true]);
        $table->addColumn('uuid', Type::STRING, ['length' => 60]);
        $table->addColumn('name', Type::STRING, ['length' => 100]);
        $table->addColumn('created_at', Type::DATETIME);

        $table->setPrimaryKey(['category_id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('category');
    }
}
