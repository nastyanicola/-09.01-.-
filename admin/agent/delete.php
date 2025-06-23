<?php require __DIR__ . '/../db.php';
$id = $_GET['id'];
$pdo->prepare("DELETE FROM agent WHERE id_agent=?")->execute([$id]);
header("Location: index.php");
exit;