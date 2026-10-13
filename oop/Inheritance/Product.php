<?php

namespace Inheritance;

use Inheritance\Traits\HttpRequest;

require __DIR__ . "/../autoload.php";


class Product extends HttpRequest
{
  public $name;
  public $price;

  // public function __construct()
  // {
  //   if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  //     die("Invalid request method. Please use POST.");
  //   }
  // }

  public function add()
  {
        $this->post();

    $name = $_POST['name'] ?? null;
    $price = $_POST['price'] ?? null;
    header("location:addProduct.html");
  }
}

$product = new Product;
$product->add();
