<?php
require_once '../../../db.php';

$agents = $pdo->query("
    SELECT a.first_name, a.last_name, SUM(d.amount) AS total_deals
    FROM agent a
    LEFT JOIN deal d ON a.id_agent = d.id_agent
    GROUP BY a.id_agent
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Суммы сделок по агентам</title>
    <style>
        table { border-collapse: collapse; width: 30%; }
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

<h1>Суммы сделок по агентам</h1>
<a href="../../dashboard.php">Вернуться</a>

<table>
    <thead>
        <tr>
            <th>Имя агента</th>
            <th>Фамилия агента</th>
            <th>Сумма сделок</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($agents as $agent): ?>
            <tr>
                <td><?= htmlspecialchars($agent['first_name']) ?></td>
                <td><?= htmlspecialchars($agent['last_name']) ?></td>
                <td><?= number_format($agent['total_deals'] ?? 0, 0, '', ' ') ?> ₽</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
