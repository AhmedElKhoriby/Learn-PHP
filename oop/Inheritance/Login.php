<?php

namespace Inheritance;

use Inheritance\Traits\HttpRequest;

require __DIR__ . "/../autoload.php";



ob_start();
class Login extends HttpRequest
{


  public function login()
  {
    $this->post();
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    header("location:addProduct.html");
  }
}

$login = new Login();
$login->login();
