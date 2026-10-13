<?php

use Encapsulation\Db;
use Encapsulation\User;

require_once __DIR__ . "/../autoload.php";


$db = new User;
$db->getUsers();
