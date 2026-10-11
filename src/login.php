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

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$user || !password_verify($password, $user['password'])) {
        echo "Invalid email or password";
        exit;
    }

    $_SESSION['user_id'] = $user['id'];

    echo "Email: " . $_SESSION['user_id'];
    echo "<br>";
    echo "=============================";
    echo "<br>";
    echo "Loged in Successfully !";
    header("Location: ../public/add-delete.html");
    exit;
}

echo "please, register first before login.";
