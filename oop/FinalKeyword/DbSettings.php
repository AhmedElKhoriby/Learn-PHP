<?php

namespace FinalKeyword;

final class DbSettings
{
    public $hostname = 'localhost';
    public $username = 'root';
    public $password = '';
    public $dbName = 'oop';

    public function dbName()
    {
        echo "database name is {$this->dbName}";
    }
}