<?php

namespace Otus\DbModel;

class DbParams
{
    /**
     * @var string
     */
    protected $dsn;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $pass;

    public function setDSN(string $dsn)
    {
        $this->dsn = $dsn;
    }

    public function setUser(string $user)
    {
        $this->user = $user;
    }

    public function setPassword(string $pass)
    {
        $this->pass = $pass;
    }

    public function getDSN()
    {
        return $this->dsn;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->pass;
    }

}