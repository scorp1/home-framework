<?php

namespace Otus\DbModel;

use PDO;

class DbConnection
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * DbConnection constructor.
     *
     * @param string $dsn
     * @param string $user
     * @param string $pass]
     */
    public function __construct(string $dsn, string $user, string $pass)
    {
        $this->connection = new \PDO($dsn, $user, $pass);
    }

    /**
     * @return PDO|string
     */
    public function getConnection()
    {
        return $this->connection;
    }
}