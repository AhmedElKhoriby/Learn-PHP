<?php

namespace Inheritance;

use Inheritance\Traits\HttpRequest;
use Inheritance\Traits\MainTrait;

require __DIR__ . "/../autoload.php";

class Register extends HttpRequest
{

  use MainTrait;

  public function register()
  {
    $this->post();
    // $name =  $this->string($_POST['name']);
    //$phone = $_POST['phone'] ?? null;
    $email = $this->email($_POST['email']);
    $password = $_POST['password'] ?? null;
    header("location:Login.html");
  }
}

$register = new Register();
$register->register();
