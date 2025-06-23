<?php require __DIR__ . '/../../db.php';

$users = $pdo->query("SELECT * FROM users")->fetchAll(); ?>

<h2>Список пользователей</h2>
<a class="button" href="add.php">Добавить пользователя</a>
<a class="button" href="../dashboard.php">Вернуться</a>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пользователи — Админ панель</title>
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

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Телефон</th>
        <th>Email</th>
        <th>Пароль</th>
        <th>Создан</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($users as $u): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= $u['name'] ?></td>
        <td><?= $u['phone'] ?></td>
        <td><?= $u['email'] ?></td>
        <td><?= $u['password'] ?></td>
        <td><?= $u['created_at'] ?></td>
        <td>
            <a href="edit.php?id=<?= $u['id'] ?>">✏️</a> | 
            <a href="delete.php?id=<?= $u['id'] ?>" onclick="return confirm('Удалить пользователя?')">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

