<?php
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && $password === $user['password']) {

    session_start();
    $_SESSION['user'] = $user;
    header('Location: profile.php');
    exit;
} else {
    echo "Неверный логин или пароль.";
}
