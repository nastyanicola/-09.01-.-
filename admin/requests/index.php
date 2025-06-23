<?php require '../db.php';

$requests = $pdo->query("SELECT * FROM requests")->fetchAll(); 
?>

<h2>Список заявок на просмотр</h2>
<a class="button" href="add.php">Добавить заявку</a>
<a class="button" href="../dashboard.php">Вернуться</a>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заявки — Админ панель</title>
    <style>
        table { border-collapse: collapse; width:40%; }
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
        <th>Время</th>
        <th>Дата</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($requests as $r): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><?= $r['name'] ?></td>
        <td><?= $r['phone'] ?></td>
        <td><?= $r['time'] ?></td>
        <td><?= $r['date'] ?></td>
        <td>
            <a href="edit.php?id=<?= $r['id'] ?>">✏️</a> |
            <a href="delete.php?id=<?= $r['id'] ?>" onclick="return confirm('Удалить заявку?')">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
