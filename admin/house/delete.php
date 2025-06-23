<?php require __DIR__ . '/../db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM house WHERE id_house = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
