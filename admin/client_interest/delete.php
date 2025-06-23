<?php require __DIR__ . '/../../db.php';

$id = $_GET['id'];
$pdo->prepare("DELETE FROM client_interest WHERE id_client_interest=?")->execute([$id]);
header("Location: index.php");
exit;
