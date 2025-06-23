<?php require __DIR__ . '/../../db.php';

$id = $_GET['id'];
$pdo->prepare("DELETE FROM reviews WHERE id=?")->execute([$id]);
header("Location: index.php");
exit;
