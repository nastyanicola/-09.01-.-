<?php require '../db.php';

$sql = "SELECT ci.id_client_interest, c.first_name, c.last_name, ht.type_name
        FROM client_interest ci
        JOIN client c ON ci.id_client = c.id_client
        JOIN house_type ht ON ci.id_house_type = ht.id_house_type";

$interests = $pdo->query($sql)->fetchAll();
?>

<h2>Список интересов клиентов</h2>
<a class="button" href="add.php">Добавить интерес клиента</a>
<a class="button" href="../dashboard.php">Вернуться</a>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Интересы клиентов — Админ панель</title>
    <style>
        table { border-collapse: collapse; width: 30%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
        a { margin-right: 8px; text-decoration: none; }
        .button{
            background:#eee;
            margin: 10px; 
            color: black; 
            padding: 11px 13px;
            border-radius: 10px; 
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Клиент</th>
        <th>Тип дома</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($interests as $i): ?>
    <tr>
        <td><?= $i['id_client_interest'] ?></td>
        <td><?= htmlspecialchars($i['first_name'] . ' ' . $i['last_name']) ?></td>
        <td><?= htmlspecialchars($i['type_name']) ?></td>
        <td>
            <a href="edit.php?id=<?= $i['id_client_interest'] ?>">✏️</a> | 
            <a href="delete.php?id=<?= $i['id_client_interest'] ?>" onclick="return confirm('Удалить?')">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
