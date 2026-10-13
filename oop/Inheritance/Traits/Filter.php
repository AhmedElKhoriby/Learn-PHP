<?php

namespace Inheritance\Traits;

trait Filter
{

  public function string($input)
  {
    $string = htmlspecialchars($input);
    echo $string;
  }

  public function email($input)
  {
    if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
      die("Invalid email format");
    }
    echo $input;
  }
}
