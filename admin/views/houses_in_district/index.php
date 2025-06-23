<?php
require '../../db.php';
$houses = $pdo->query("
    SELECT h.address, h.rooms, h.area, h.price, h.status, d.name AS district_name, a.first_name AS agent_first_name, a.last_name AS agent_last_name
    FROM house h
    JOIN district d ON h.id_district = d.id_district
    JOIN agent a ON h.id_agent = a.id_agent
    WHERE d.name = 'Графский'
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Дома в районе «Графский»</title>
    <style> 
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
        a { 
            margin-right: 8px; 
            margin-top: 10px; 
            background:#eee;
            margin: 10px; 
            color: black; 
            padding: 13px 14px;
            border-radius: 10px; 
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>

<h2>Дома в районе «Графский»</h2>
<a href="../../dashboard.php">Вернуться</a>

<table>
    <tr>
        <th>Адрес</th><th>Комнаты</th><th>Площадь</th><th>Цена</th><th>Статус</th><th>Район</th><th>Агент</th>
    </tr>
    <?php foreach($houses as $h): ?>
    <tr>
        <td><?= htmlspecialchars($h['address']) ?></td>
        <td><?= $h['rooms'] ?></td>
        <td><?= $h['area'] ?></td>
        <td><?= $h['price'] ?></td>
        <td><?= htmlspecialchars($h['status']) ?></td>
        <td><?= htmlspecialchars($h['district_name']) ?></td>
        <td><?= htmlspecialchars($h['agent_first_name'].' '.$h['agent_last_name']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
