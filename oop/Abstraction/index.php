<?php

require "../autoload.php";

use Abstraction\Laptop;
use Abstraction\PC;

(new Laptop())->test();
(new PC())->test();

