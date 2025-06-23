<?php
require '../../db.php';
$clients = $pdo->query("
    SELECT c.first_name, c.last_name, c.phone, c.email, c.budget, ht.type_name
    FROM client c
    JOIN client_interest ci ON c.id_client = ci.id_client
    JOIN house_type ht ON ci.id_house_type = ht.id_house_type
    WHERE ht.type_name = 'дом'
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Клиенты, заинтересованные в домах</title>
    <style> 
        table { border-collapse: collapse; width: 50%; }
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

<h2>Клиенты, заинтересованные в домах</h2>
<a href="../../dashboard.php">Вернуться</a>

<table>
    <tr>
        <th>Имя</th><th>Фамилия</th><th>Телефон</th><th>Email</th><th>Бюджет</th><th>Тип дома</th>
    </tr>
    <?php foreach($clients as $c): ?>
    <tr>
        <td><?= htmlspecialchars($c['first_name']) ?></td>
        <td><?= htmlspecialchars($c['last_name']) ?></td>
        <td><?= htmlspecialchars($c['phone']) ?></td>
        <td><?= htmlspecialchars($c['email']) ?></td>
        <td><?= $c['budget'] ?></td>
        <td><?= htmlspecialchars($c['type_name']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>


</body>
</html>
