<?php

namespace Otus\DbModel;

use PDO;

class DbModel
{
    /**
     * @var DbConnection
     */
    private $connection;

    /**
     * @var \PDOStatement
     */
    private $statement;

    private $statementExecute;
    /**
     * DbModel constructor.
     *
     * @param \Otus\DbModel\DbConnection $dbConnection
     */
    public function __construct(DbConnection $dbConnection)
    {
        $this->connection = $dbConnection;
    }

    /**
     * @param string $query
     *
     * @return $this
     */
    public function statement(string $query)
    {
        $this->statement = $this->connection->getConnection()->prepare($query);

        return $this;
    }

    public function exec()
    {
        $this->statementExecute = $this->statement->execute();

        return $this;
    }

    /**
     * @param string $nameParameter
     * @param $value
     *
     * @return $this
     */
    public function bind(string $nameParameter, $value)
    {
        $typeParameter = \PDO::PARAM_STR;

        if(is_integer($value)){
            $typeParameter = \PDO::PARAM_INT;
        }

        $this->statement->bindParam($nameParameter, $value, $typeParameter);

        return $this;
    }
}