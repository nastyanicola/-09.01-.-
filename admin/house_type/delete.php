<?php require __DIR__ . '/../../db.php';

$id = $_GET['id'];
$pdo->prepare("DELETE FROM house_type WHERE id_house_type=?")->execute([$id]);
header("Location: index.php");
exit;
