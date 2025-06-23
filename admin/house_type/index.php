<?php require '../db.php';

$types = $pdo->query("SELECT * FROM house_type")->fetchAll();
?>

<h2>Список типов домов</h2>
<a class="button" href="add.php">Добавить тип дома</a>
<a class="button" href="../dashboard.php">Вернуться</a>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тип дома — Админ панель</title>
    <style>
        table { border-collapse: collapse; width: 20%; }
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
        <th>Тип дома</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($types as $t): ?>
    <tr>
        <td><?= $t['id_house_type'] ?></td>
        <td><?= htmlspecialchars($t['type_name']) ?></td>
        <td>
            <a href="edit.php?id=<?= $t['id_house_type'] ?>">✏️</a> | 
            <a href="delete.php?id=<?= $t['id_house_type'] ?>" onclick="return confirm('Удалить?')">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
