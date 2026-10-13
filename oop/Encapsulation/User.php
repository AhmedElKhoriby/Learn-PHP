<?php

namespace Encapsulation;

use Encapsulation\Db;

class User extends Db
{
  public function getUsers()
  {
    $result = $this->select('users');
    while ($data = mysqli_fetch_assoc($result)) {
      echo "Email: " . $data['email'] . "<br>";
      echo "Name: " . $data['name'] . "<br>";
      echo "----------------------------<br>";
    }
  }
}
