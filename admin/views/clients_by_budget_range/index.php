<?php
require_once '../../../db.php';

$clients = $pdo->query("
    SELECT DISTINCT c.first_name, c.last_name, c.budget
    FROM client c
    JOIN house h ON c.budget >= h.price
    WHERE h.price BETWEEN 20000000 AND 30000000
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Клиенты по бюджету</title>
    <style>
        table { border-collapse: collapse; width: 20%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
        a {
            margin: 10px; background:#eee; color: black;
            padding: 13px 14px; border-radius: 10px;
            text-decoration: none; display: inline-block;
        }
    </style>
</head>
<body>

<h1>Клиенты с бюджетом от 30 до 40 млн</h1>
<a href="../../dashboard.php">Вернуться</a>

<table>
    <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Бюджет</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= htmlspecialchars($client['first_name']) ?></td>
                <td><?= htmlspecialchars($client['last_name']) ?></td>
                <td><?= number_format($client['budget'], 0, '', ' ') ?> ₽</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
