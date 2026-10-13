<?php

namespace Abstraction;

use Inheritance\Traits\Filter;
use Inheritance\Traits\HttpRequest;

require_once __DIR__ . "/../autoload.php";

abstract class Computer extends HttpRequest
{
  use Filter;
  public $test;

  public function test()
  {
    return $this->makeCpu();
  }

  abstract public function makeCpu();
}
