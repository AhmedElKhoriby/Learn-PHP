<?php

namespace Abstraction;

use Abstraction\Computer;
require_once __DIR__ . "/../autoload.php";

// use ComputerInterface;

class Laptop extends Computer
{
  public function makeCpu()
  {
    echo "Laptop CPU is made by Laptop";
  }
}
