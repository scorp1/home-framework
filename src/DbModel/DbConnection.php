<?php

namespace Otus\DbModel;

use PDO;

class DbConnection
{
    /**
     * @var PDO
     */
    private $connection;

    private $dbParams;

    public function __construct(DbParams $dbParams)
    {
        $this->dbParams = $dbParams;
    }

    public function connect()
    {
        $this->connection = new PDO($this->dbParams->getDSN(), $this->dbParams->getUser(), $this->dbParams->getPassword());

        return $this;
    }

    public function getConnection()
    {
        if(isset($this->connection)){
            try{
                echo "все ок";
                return $this->connection;
            }catch (\PDOException $e){
                return $e->getMessage();
            }

        }
        print_r("Не работает!");
    }
}