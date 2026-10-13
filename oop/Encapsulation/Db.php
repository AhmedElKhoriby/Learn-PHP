<?php

namespace Encapsulation;

use mysqli;

class Db
{

  private $conn;

  public function __construct()
  {
    $this->connect();
  }

  public function connect()
  {
    return $this->conn = mysqli_connect("localhost", "root", "", "oop");
  }

  public function select($table)
  {
    $sql = "SELECT * FROM $table";
    $query = mysqli_query($this->conn, $sql);
    return $query;
  }
}
