<?php
require_once '../db.php';

$stmt = $pdo->query("SELECT * FROM client");
$clients = $stmt->fetchAll();
?>

<h2>Список клиентов</h2>
<a class="button" href="add.php">Добавить клиента</a>
<a class="button" href="../dashboard.php">Вернуться</a>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Клиенты — Админ панель</title>
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
        <th>ID</th><th>Имя</th><th>Фамилия</th><th>Телефон</th><th>Email</th><th>Бюджет</th><th>Действия</th>
    </tr>
    <?php foreach ($clients as $client): ?>
    <tr>
        <td><?= $client['id_client'] ?></td>
        <td><?= $client['first_name'] ?></td>
        <td><?= $client['last_name'] ?></td>
        <td><?= $client['phone'] ?></td>
        <td><?= $client['email'] ?></td>
        <td><?= $client['budget'] ?></td>
        <td>
            <a href="edit.php?id=<?= $client['id_client'] ?>">✏️</a>
            <a href="delete.php?id=<?= $client['id_client'] ?>" onclick="return confirm('Удалить клиента?')">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
