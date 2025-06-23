<?php

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Админ-панель | Imperium Estates</title>
    <link rel="stylesheet" href="../main.css">
    <style>
        body {
            font-family: sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 40px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            margin-top: 30px;
        }

        ul {
            flex-wrap: wrap;
            padding: 0;
            list-style: none;
            display: flex;
            gap: 10px;
        }

        li {
            background: white;
            margin: 10px 0;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            transition: 0.2s;
        }

        li:hover {
            background: #e6e6e6;
        }

        a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            display: block;
        }
    </style>
</head>

<body>

    <h1>Админ-панель Imperium Estates</h1>

    <h2>Таблицы</h2>
    <ul>
        <li><a href="client/index.php">Клиенты</a></li>
        <li><a href="agent/index.php">Агенты</a></li>
        <li><a href="deal/index.php">Сделки</a></li>
        <li><a href="house/index.php">Дома</a></li>
        <li><a href="district/index.php">Районы</a></li>
        <li><a href="house_type/index.php">Типы домов</a></li>
        <li><a href="client_interest/index.php">Интересы клиентов</a></li>
        <li><a href="users/index.php">Пользователи</a></li>
        <li><a href="requests/index.php">Заявки</a></li>
        <li><a href="reviews/index.php">Отзывы</a></li>
    </ul>

    <h2>Представления</h2>
    <ul>
        <li><a href="views/houses_in_district/index.php">Дома в районе "Графский"</a></li>
        <li><a href="views/clients_interested_in_type/index.php">Заинтересованные клиенты</a></li>
        <li><a href="views/deals_by_agent/index.php">Сделки агента Анастасия</a></li>
        <li><a href="views/house_with_price_and_agent/index.php">Дома и агенты</a></li>
        <li><a href="views/clients_with_deal_amount/index.php">Сделки на 39 млн</a></li>
        <li><a href="views/houses_available_on_date/index.php">Доступные дома</a></li>
        <li><a href="views/agent_deal_totals/index.php">Суммы сделок агентов</a></li>
        <li><a href="views/available_houses_by_type/index.php">Доступные дома типа "дом"</a></li>
        <li><a href="views/clients_by_budget_range/index.php">Клиенты по бюджету</a></li>
        <li><a href="views/house_details/index.php">Детали домов</a></li>
    </ul>
</body>

</html>