<?php
$host  = "localhost";
$username = "root";
$password = "";
$db_name = "my_database";

try {
    // dsn => data sourse name
    $conn = new PDO("mysql:host=$host", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $conn->exec("CREATE DATABASE IF NOT EXISTS $db_name");

    $conn->exec("USE $db_name");

    $conn->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        content TEXT NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )");

    // echo "Connected successfully to the database!";

  } catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
  }