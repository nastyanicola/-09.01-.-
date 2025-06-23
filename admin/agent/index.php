<?php
require_once '../db.php';

$stmt = $pdo->query("SELECT * FROM agent");
$agents = $stmt->fetchAll();
?>

<h2>Список агентов</h2>
<a class="button" href="add.php">Добавить агента</a>
<a class="button" href="../dashboard.php">Вернуться</a>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Агенты — Админ панель</title>
    <style>
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
        a { margin-right: 8px; text-decoration: none; }
        .button{
            background:#eee;
            margin: 10px; 
            color: black; 
            padding: 11px 13px;
            border-radius: 10px; 
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Имя</th><th>Фамилия</th><th>Телефон</th><th>Email</th><th>Действия</th>
    </tr>
    <?php foreach ($agents as $agent): ?>
    <tr>
        <td><?= $agent['id_agent'] ?></td>
        <td><?= $agent['first_name'] ?></td>
        <td><?= $agent['last_name'] ?></td>
        <td><?= $agent['phone'] ?></td>
        <td><?= $agent['email'] ?></td>
        <td>
            <a href="edit.php?id=<?= $agent['id_agent'] ?>">✏️</a>
            <a href="delete.php?id=<?= $agent['id_agent'] ?>" onclick="return confirm('Удалить агента?')">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
