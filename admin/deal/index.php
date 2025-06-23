<?php require __DIR__ . '/../../db.php';

$sql = "SELECT d.id_deal, c.first_name AS client_name, h.address AS house_address, 
               a.first_name AS agent_name, d.amount, d.data
        FROM deal d
        JOIN client c ON d.id_client = c.id_client
        JOIN house h ON d.id_house = h.id_house
        JOIN agent a ON d.id_agent = a.id_agent";

$deal = $pdo->query($sql)->fetchAll();
?>

<h2>Список сделок</h2>
<a class="button" href="add.php">Добавить сделку</a>
<a class="button" href="../dashboard.php">Вернуться</a>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сделки — Админ панель</title>
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
        <th>Клиент</th>
        <th>Дом</th>
        <th>Агент</th>
        <th>Сумма</th>
        <th>Дата</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($deal as $deal): ?>
    <tr>
        <td><?= $deal['id_deal'] ?></td>
        <td><?= htmlspecialchars($deal['client_name']) ?></td>
        <td><?= htmlspecialchars($deal['house_address']) ?></td>
        <td><?= htmlspecialchars($deal['agent_name']) ?></td>
        <td><?= $deal['amount'] ?></td>
        <td><?= $deal['data'] ?></td>
        <td>
            <a href="edit.php?id=<?= $deal['id_deal'] ?>">✏️</a> |
            <a href="delete.php?id=<?= $deal['id_deal'] ?>" onclick="return confirm('Удалить?')">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
