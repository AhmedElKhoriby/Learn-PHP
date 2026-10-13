<?php

namespace Static;

class User
{
    public static $test = 1;
    // public $test = 1;

    // public function name()
    // {
    //     return  self::$test;
    //     // echo self::$test++;
    //     // echo $this->test;
    //     // echo $this->test++;
    // }

    public static function name()
    {
        return self::$test++;
        // echo $this->test++;
    }
}