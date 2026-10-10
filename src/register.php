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

    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;


    echo "<br>";
    echo "Email: " . $_SESSION["email"];
    echo "<br>";
    echo "=============================";
    echo "<br>";
    echo "Registered Successfully !";
}
