<?php

namespace Di;

use Polymorphism\ComputerInterface;

class User extends Db implements DbInterface
{
  public function name()
  {
    //
  }

  public function getUsers()
  {
    $result = $this->select('users');

    while ($data = mysqli_fetch_assoc($result)) {
      foreach ($data as $column => $row) {
        echo "$column : $row <br>";
      }

      echo "--------------<br>";
    }
  }
}
