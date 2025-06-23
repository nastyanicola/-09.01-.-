<?php require __DIR__ . '/../../db.php';
$reviews = $pdo->query("SELECT * FROM reviews")->fetchAll(); ?>

<h2>Список отзывов</h2>
<a class="button" href="add.php">Добавить отзыв</a>
<a class="button" href="../dashboard.php">Вернуться</a>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отзывы — Админ панель</title>
    <style>
        table { border-collapse: collapse; width: 40%; }
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
        <th>Оценка</th>
        <th>Сообщение</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($reviews as $r): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><?= $r['name'] ?></td>
        <td><?= $r['rating'] ?></td>
        <td><?= $r['message'] ?></td>
        <td>
            <a href="edit.php?id=<?= $r['id'] ?>">✏️</a> |
            <a href="delete.php?id=<?= $r['id'] ?>" onclick="return confirm('Удалить отзыв?')">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
