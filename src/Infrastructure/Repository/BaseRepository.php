<?php

namespace Checkfood\Infrastructure\Repository;

use Doctrine\DBAL\Connection;

abstract class BaseRepository
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * BaseRepository constructor.
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
}
