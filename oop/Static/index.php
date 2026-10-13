<?php

use Static\User;

require_once __DIR__ . "/../autoload.php";

echo (new User)->name();
echo User::name();
// echo (new User)->name();
// echo (new User)->name();
// echo (new User)->name();
