<?php

namespace Inheritance\Traits;

class HttpRequest
{
  public function get()
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
      die("forbidden");
    }
  }

  public function post()
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      die("forbidden");
    }
  }
}
