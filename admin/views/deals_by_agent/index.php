<?php
require '../../db.php';
$deals = $pdo->query("
    SELECT d.amount, d.data, c.first_name AS client_first_name, c.last_name AS client_last_name,
           h.address AS house_address, a.first_name AS agent_first_name, a.last_name AS agent_last_name
    FROM deal d
    JOIN client c ON d.id_client = c.id_client
    JOIN house h ON d.id_house = h.id_house
    JOIN agent a ON d.id_agent = a.id_agent
    WHERE d.id_agent = 1
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сделки агента с ID 1</title>
    <style> 
        table { border-collapse: collapse; width: 40%; }
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

<h2>Сделки агента Анастасия</h2>
<a href="../../dashboard.php">Вернуться</a>
<table>
    <tr>
        <th>Клиент</th><th>Адрес дома</th><th>Сумма</th><th>Дата</th>
    </tr>
    <?php foreach($deals as $d): ?>
    <tr>
        <td><?= htmlspecialchars($d['client_first_name'].' '.$d['client_last_name']) ?></td>
        <td><?= htmlspecialchars($d['house_address']) ?></td>
        <td><?= $d['amount'] ?></td>
        <td><?= $d['data'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>


</body>
</html>
