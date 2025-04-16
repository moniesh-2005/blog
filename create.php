<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);
    header('Location: index.php');
}
?>
<form method="POST">
    Title: <input type="text" name="title" required><br>
    Content: <textarea name="content" required></textarea><br>
    <button type="submit">Create</button>
</form>