<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $rating = (int)($_POST['rating'] ?? 0);
    $message = trim($_POST['message'] ?? '');

    if (!$name || $rating < 1 || $rating > 5 || !$message) {
        die('Пожалуйста, заполните все поля корректно.');
    }

    $stmt = $pdo->prepare("INSERT INTO reviews (name, rating, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $rating, $message]);

    header('Location: reviews.html?review=success');
    exit;
} else {
    header('Location: reviews.html');
    exit;
}
