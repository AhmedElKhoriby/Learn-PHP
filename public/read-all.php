<?php
session_start();
require_once "../db/index.php";

$user_id = $_SESSION['user_id'] ?? null;

$stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($posts);
// die();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Posts</title>
</head>

<body>
  <h1> Welcome, <?php echo $user_id; ?></h1>

  <h1>Posts</h1>
<?php if (!empty($posts)): ?>
      <ul>
      <?php foreach ($posts as $post): ?>
        <li>
          <?php echo $post['content']; ?>
          <form action="../src/add-delete.php" method="POST" style="display:inline;">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
            <button type="submit">Delete</button>
          </form>
          <form action="../src/add-delete.php" method="POST" style="display:inline;">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
            <input type="text" name="content" placeholder="New content">
            <button type="submit">Update</button>
          </form>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

</body>


<br />
<!-- Logout -->
<form
  action="../src/logout.php"
  method="POST">
  <button type="submit">Logout</button>
</form>
</body>

</html>