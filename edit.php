<?php
include 'db.php';
session_start();

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([$title, $content, $id]);
    header('Location: index.php');
}
?>
<form method="POST">
    Title: <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br>
    Content: <textarea name="content" required><?= htmlspecialchars($post['content']) ?></textarea><br>
    <button type="submit">Update</button>
</form>