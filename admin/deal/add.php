<?php require __DIR__ . '/../../db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO deal (id_client, id_house, id_agent, amount, data) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['id_client'], $_POST['id_house'], $_POST['id_agent'],
        $_POST['amount'], $_POST['data']
    ]);
    header("Location: index.php");
    exit;
}

$clients = $pdo->query("SELECT * FROM client")->fetchAll();
$houses = $pdo->query("SELECT * FROM house")->fetchAll();
$agents = $pdo->query("SELECT * FROM agent")->fetchAll();
?>

<form method="post">
    Клиент:
    <select name="id_client">
        <option value="">Выберите клиента</option>
        <?php foreach ($clients as $c): ?>
        <option value="<?= $c['id_client'] ?>"><?= $c['first_name'] ?> <?= $c['last_name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Дом:
    <select name="id_house">
        <option value="">Выберите адрес</option>
        <?php foreach ($houses as $h): ?>
        <option value="<?= $h['id_house'] ?>"><?= $h['address'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Агент:
    <select name="id_agent">
        <option value="">Выберите агента</option>
        <?php foreach ($agents as $a): ?>
        <option value="<?= $a['id_agent'] ?>"><?= $a['first_name'] ?> <?= $a['last_name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Сумма: <input name="amount" type="number"><br>
    Дата: <input name="data" type="data"><br>
    <button>Сохранить</button>
</form>
