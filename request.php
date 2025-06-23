<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $time = $_POST['time'] ?? '';
    $date = $_POST['date'] ?? '';

    if (!$name || !$phone || !$time || !$date) {
        die('Пожалуйста, заполните все поля формы.');
    }

    $stmt = $pdo->prepare("INSERT INTO requests (name, phone, time, date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $phone, $time, $date]);

    header('Location: profile.php?request=success');
    exit;
} else {
    header('Location: profile.php');
    exit;
}
