<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();
?>
<a href="create.php">New Post</a> | <a href="logout.php">Logout</a>
<h1>Posts</h1>
<?php foreach ($posts as $post): ?>
    <div>
        <h2><?= htmlspecialchars($post['title']) ?></h2>
        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
        <small><?= $post['created_at'] ?></small><br>
        <a href="edit.php?id=<?= $post['id'] ?>">Edit</a>
        <a href="delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </div>
<?php endforeach; ?>