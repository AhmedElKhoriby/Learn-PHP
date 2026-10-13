<?php

namespace Di;

class Category extends Db
{
  public function getCategories()
  {
    $result = $this->select('categories');

    while ($data = mysqli_fetch_assoc($result)) {
      foreach ($data as $column => $row) {
        echo $column . ': ' . $row . '<br>';
      }

      echo "----------------<br>";
    }
  }
}
