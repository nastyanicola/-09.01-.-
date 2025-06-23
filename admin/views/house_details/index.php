<?php
require_once '../../../db.php';

$houses = $pdo->query("
    SELECT address, rooms, area, status, price
    FROM house
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Характеристики домов</title>
    <style>
        table { border-collapse: collapse; width: 40%; }
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

<h1>Характеристики домов</h1>
<a href="../../dashboard.php">Вернуться</a>

<table>
    <thead>
        <tr>
            <th>Адрес</th>
            <th>Комнат</th>
            <th>Площадь</th>
            <th>Статус</th>
            <th>Цена</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($houses as $h): ?>
            <tr>
                <td><?= htmlspecialchars($h['address']) ?></td>
                <td><?= htmlspecialchars($h['rooms']) ?></td>
                <td><?= htmlspecialchars($h['area']) ?> м²</td>
                <td><?= htmlspecialchars($h['status']) ?></td>
                <td><?= number_format($h['price'], 0, '', ' ') ?> ₽</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
