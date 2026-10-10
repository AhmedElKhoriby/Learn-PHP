<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email");
    }

    if (strlen($password) < 8) {
        die("Password must be at least 8 characters");
    }

    $email = htmlspecialchars(
        $email,
        ENT_QUOTES,
        "UTF-8"
    );

    $password = htmlspecialchars(
        $password,
        ENT_QUOTES,
        "UTF-8"
    );

    if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
      
      if($_SESSION['email'] !== $email) {
        echo "there is no email such like that!";
        exit;
      }

      if($_SESSION['password'] !== $password) {
        echo "password is wrong!";
        exit;
      }

      
      echo "Email: " . $_SESSION["email"];
      echo "<br>";
      echo "=============================";
      echo "<br>";
      echo "Loged in Successfully !";
      exit;
    }

    echo "please, register first before login.";
}