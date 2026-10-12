<?php

session_start();
require_once "../db/index.php";

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

    $password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        echo "User registered successfully!";
        
        //header("Location: ../public/login.html");
        //exit;

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }


    echo "<br>";
    echo "Email: " . $email;
    echo "<br>";
    echo "=============================";
    echo "<br>";
    echo "Registered Successfully !";
}
