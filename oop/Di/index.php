<?php

use Di\DI;
use Di\User;

// use Di\DbInterface;

require_once __DIR__ . "/../autoload.php";


echo (new Di)->test(new User('oop'));
