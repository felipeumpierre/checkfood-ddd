<?php

namespace Checkfood\Infrastructure\Tactician;

use Doctrine\DBAL\Connection;
use Exception;
use League\Tactician\Middleware;
use Throwable;

/**
 * Wraps command execution inside a database transaction
 */
class DbalTransactionMiddleware implements Middleware
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Executes the given command and optionally returns a value
     *
     * @param object $command
     * @param callable $next
     *
     * @throws Throwable
     * @throws Exception
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        $this->connection->beginTransaction();

        try {
            $returnValue = $next($command);

            $this->connection->commit();
        } catch (Exception $e) {
            $this->rollbackTransaction();

            throw $e;
        } catch (Throwable $e) {
            $this->rollbackTransaction();

            throw $e;
        }

        return $returnValue;
    }

    /**
     * Rollback the current transaction.
     */
    protected function rollbackTransaction()
    {
        $this->connection->rollBack();
    }
}
