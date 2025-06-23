<?php require __DIR__ . '/../db.php';

$id = $_GET['id'];
$pdo->prepare("DELETE FROM district WHERE id_district=?")->execute([$id]);
header("Location: index.php");
exit;
