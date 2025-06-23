<?php
require '../../db.php';
$houses = $pdo->query("
    SELECT h.address, h.price, a.first_name, a.last_name, a.phone
    FROM house h
    JOIN agent a ON h.id_agent = a.id_agent
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Дома с ценой и агентом</title>
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

<h2>Дома с ценой и агентом</h2>
<a href="../../dashboard.php">Вернуться</a>
<table>
    <tr>
        <th>Адрес</th><th>Цена</th><th>Имя агента</th><th>Фамилия агента</th><th>Телефон агента</th>
    </tr>
    <?php foreach($houses as $h): ?>
    <tr>
        <td><?= htmlspecialchars($h['address']) ?></td>
        <td><?= $h['price'] ?></td>
        <td><?= htmlspecialchars($h['first_name']) ?></td>
        <td><?= htmlspecialchars($h['last_name']) ?></td>
        <td><?= htmlspecialchars($h['phone']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>


</body>
</html>
