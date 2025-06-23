<?php require __DIR__ . '/../../db.php';

$sql = "SELECT h.*, d.name AS district_name, ht.type_name, a.first_name AS agent_name
        FROM house h
        JOIN district d ON h.id_district = d.id_district
        JOIN house_type ht ON h.id_house_type = ht.id_house_type
        JOIN agent a ON h.id_agent = a.id_agent";

$houses = $pdo->query($sql)->fetchAll();
?>

<h2>Список домов</h2>
<a class="button" href="add.php">Добавить дом</a>
<a class="button" href="../dashboard.php">Вернуться</a>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Дома — Админ панель</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
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
        <th>Район</th>
        <th>Тип</th>
        <th>Агент</th>
        <th>Адрес</th>
        <th>Комнат</th>
        <th>Площадь (м²)</th>
        <th>Цена</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($houses as $h): ?>
    <tr>
        <td><?= $h['id_house'] ?></td>
        <td><?= htmlspecialchars($h['district_name']) ?></td>
        <td><?= htmlspecialchars($h['type_name']) ?></td>
        <td><?= htmlspecialchars($h['agent_name']) ?></td>
        <td><?= htmlspecialchars($h['address']) ?></td>
        <td><?= $h['rooms'] ?></td>
        <td><?= $h['area'] ?></td>
        <td><?= $h['price'] ?></td>
        <td><?= htmlspecialchars($h['status']) ?></td>
        <td>
            <a href="edit.php?id=<?= $h['id_house'] ?>">✏️</a> |
            <a href="delete.php?id=<?= $h['id_house'] ?>" onclick="return confirm('Удалить?')">❌</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
