<?php

namespace Otus\Core;

use PDO;

class DbConnection
{
    /**
     * @var PDO
     */
    private $connection;

    public function __construct(string $dsn, string $userName, string $password)
    {
        $this->connection = new PDO($dsn, $userName, $password);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}