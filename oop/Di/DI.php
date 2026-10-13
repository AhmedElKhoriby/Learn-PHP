<?php

namespace Di;

use DI\Db;
use DI\DbInterface;

class DI
{
    public function test($di)
    {
        if ($di instanceof Db) {
            echo "hello";
        } else {
            echo "false";
        }
    }
}