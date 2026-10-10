<?php

session_start();
// if (!isset($_SESSION['POSTS'])) {
//     $_SESSION['POSTS'] = [];
// }

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $post_to_add = htmlspecialchars(
      trim($_POST["add"] ?? ""),
      ENT_QUOTES,
      "UTF-8"
  );
  
  if($post_to_add !== "") {
    $_SESSION['POSTS'][] = $post_to_add;
  }

  $post_to_delete = htmlspecialchars(
      trim($_POST["delete"] ?? ""),
      ENT_QUOTES,
      "UTF-8"
  );

  if($post_to_delete !== "") {
    $key = array_search($post_to_delete, $_SESSION['POSTS']);
    if($key === false) { 
      echo "there is no value: " . $post_to_delete;
      exit;
    }
    unset($_SESSION['POSTS'][$key]);
  }

  echo  "Posts: <br>";
  print_r($_SESSION['POSTS']);
}

// header("Location: ../public/add-delete.html");
// exit;
