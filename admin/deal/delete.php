<?php require __DIR__ . '/../../db.php';
$id = $_GET['id'];
$pdo->prepare("DELETE FROM deal WHERE id_deal=?")->execute([$id]);
header("Location: index.php");
exit;