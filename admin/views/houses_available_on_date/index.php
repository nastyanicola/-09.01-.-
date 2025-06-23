<?php
require_once '../../../db.php';

$houses = $pdo->query("
    SELECT h.address, h.rooms, h.area, h.price, h.status, d.name AS district, a.first_name, a.last_name
    FROM house h
    JOIN district d ON h.id_district = d.id_district
    JOIN agent a ON h.id_agent = a.id_agent
    WHERE h.status = 'доступен'
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Доступные дома</title>
    <style>
        table { border-collapse: collapse; width: 50%; }
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

<h1>Дома, доступные для продажи</h1>
<a href="../../dashboard.php">Вернуться</a>

<table>
    <thead>
        <tr>
            <th>Адрес</th>
            <th>Район</th>
            <th>Комнат</th>
            <th>Площадь</th>
            <th>Цена</th>
            <th>Агент</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($houses as $h): ?>
            <tr>
                <td><?= htmlspecialchars($h['address']) ?></td>
                <td><?= htmlspecialchars($h['district']) ?></td>
                <td><?= htmlspecialchars($h['rooms']) ?></td>
                <td><?= htmlspecialchars($h['area']) ?> м²</td>
                <td><?= number_format($h['price'], 0, '', ' ') ?> ₽</td>
                <td><?= htmlspecialchars($h['first_name'] . ' ' . $h['last_name']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
