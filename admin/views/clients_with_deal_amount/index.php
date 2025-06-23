<?php
require_once '../../../db.php';

$clients = $pdo->query("
    SELECT c.first_name, c.last_name, d.amount, h.address
    FROM deal d
    JOIN client c ON d.id_client = c.id_client
    JOIN house h ON d.id_house = h.id_house
    WHERE d.amount = 39000000
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Клиенты с определённой суммой сделки</title>
    <style>
        table {
            border-collapse: collapse;
            width: 40%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background: #eee;
        }

        a {
            margin-right: 8px;
            margin-top: 10px;
            background: #eee;
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

    <h1>Клиенты с суммой сделки 39 000 000</h1>
    <a href="../../dashboard.php">Вернуться</a>

    <table>
        <thead>
            <tr>
                <th>Имя клиента</th>
                <th>Фамилия клиента</th>
                <th>Адрес дома</th>
                <th>Сумма сделки</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= htmlspecialchars($client['first_name']) ?></td>
                    <td><?= htmlspecialchars($client['last_name']) ?></td>
                    <td><?= htmlspecialchars($client['address']) ?></td>
                    <td><?= htmlspecialchars(number_format($client['amount'], 0, '', ' ')) ?> ₽</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>