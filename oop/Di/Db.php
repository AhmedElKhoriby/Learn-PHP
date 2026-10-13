<?php

namespace Di;

class Db
{
    private $conn;

    public function __construct($dbName)
    {
        $this->connect($dbName);
    }

    public function connect($dbName)
    {
        $this->conn = mysqli_connect("localhost", "root", "", $dbName);

        return $this;
    }

    protected function select($table)
    {
        $sql = "SELECT * FROM $table";
        $query = mysqli_query($this->conn, $sql);

        return $query;
    }
}
