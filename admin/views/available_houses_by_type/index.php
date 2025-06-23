<?php
require_once '../../../db.php';

$houses = $pdo->query("
    SELECT h.address, h.price, ht.type_name
    FROM house h
    JOIN house_type ht ON h.id_house_type = ht.id_house_type
    WHERE h.status = 'доступен' AND ht.type_name = 'дом'
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Доступные дома по типу</title>
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

<h1>Доступные дома типа "дом"</h1>
<a href="../../dashboard.php">Вернуться</a>

<table>
    <thead>
        <tr>
            <th>Адрес</th>
            <th>Тип</th>
            <th>Цена</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($houses as $house): ?>
            <tr>
                <td><?= htmlspecialchars($house['address']) ?></td>
                <td><?= htmlspecialchars($house['type_name']) ?></td>
                <td><?= number_format($house['price'], 0, '', ' ') ?> ₽</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
