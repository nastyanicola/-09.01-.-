<?php
require 'db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && $user['password'] === $password) {
    $_SESSION['user'] = $user;
    header("Location: profile.php");
    exit;
} else {
    echo "Неверный email или пароль!";
}
?>
