<?php require '../db.php';

$districts = $pdo->query("SELECT * FROM district")->fetchAll();
?>

<h2>Список районов</h2>
<a class="button" href="add.php">Добавить район</a>
<a class="button" href="../dashboard.php">Вернуться</a>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Районы — Админ панель</title>
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

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($districts as $d): ?>
    <tr>
        <td><?= $d['id_district'] ?></td>
        <td><?= htmlspecialchars($d['name']) ?></td>
        <td>
            <a href="edit.php?id=<?= $d['id_district'] ?>">✏️</a> 
            <a href="delete.php?id=<?= $d['id_district'] ?>" onclick="return confirm('Удалить?')">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
