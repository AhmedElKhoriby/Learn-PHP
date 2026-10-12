<?php

require_once "../db/index.php";
session_start();

// Auth check
if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.html");
    exit;
}

// if (!isset($_SESSION['POSTS'])) {
//     $_SESSION['POSTS'] = [];
// }


$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? "";
    $content = trim($_POST["content"] ?? "");
    $post_id = (int)($_POST["post_id"] ?? 0);

    $action = htmlspecialchars($action, ENT_QUOTES, "UTF-8");
    $content = htmlspecialchars($content, ENT_QUOTES, "UTF-8");
    $post_id = htmlspecialchars($post_id, ENT_QUOTES, "UTF-8");

    // 1. Create (Add Post)
    if ($action === "add" && $content !== "") {
        $stmt = $conn->prepare("INSERT INTO posts (user_id, content) VALUES (:user_id, :content)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }

    // 2. Update Post
    elseif ($action === "update" && $post_id > 0 && $content !== "") {
        $stmt = $conn->prepare("UPDATE posts SET content = :content WHERE id = :id AND user_id = :user_id");
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $post_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }

    // 3. Delete Post
    elseif ($action === "delete" && $post_id > 0) {
        $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id AND user_id = :user_id");
        $stmt->bindParam(':id', $post_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }

    // 4. Read Posts
    elseif ($action === "read") {
        $stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }
}

$stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = :user_id ORDER BY id DESC");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>My Posts:</h2>";
echo "<a href='../public/add-delete.html'>Back to Forms</a><hr>";

if (empty($posts)) {
    echo "No posts yet.";
} else {
    foreach ($posts as $post) {
        echo "<b>ID: " . $post['id'] . "</b> - " . htmlspecialchars($post['content'], ENT_QUOTES, "UTF-8") . "<br><br>";
    }
}
// header("Location: ../public/add-delete.html"); 
// exit;
