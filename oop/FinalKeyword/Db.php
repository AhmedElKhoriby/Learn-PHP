<?php

namespace FinalKeyword;

class Db
{
    private $conn;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $setDb = new DbSettings();
        $setDb->dbName();

        $this->conn = mysqli_connect(
            $setDb->hostname,
            $setDb->username,
            $setDb->password,
            $setDb->dbName
        );

        return $this;
    }
}