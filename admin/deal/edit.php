<?php require __DIR__ . '/../../db.php';

$id = $_GET['id'];

$deal = $pdo->query("SELECT * FROM deal WHERE id_deal = $id")->fetch();

$clients = $pdo->query("SELECT * FROM client")->fetchAll();
$houses = $pdo->query("SELECT * FROM house")->fetchAll();
$agents = $pdo->query("SELECT * FROM agent")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE deal SET id_client=?, id_house=?, id_agent=?, amount=?, data=? WHERE id_deal=?");
    $stmt->execute([
        $_POST['id_client'], $_POST['id_house'], $_POST['id_agent'],
        $_POST['amount'], $_POST['data'], $id
    ]);
    header("Location: index.php");
    exit;
}
?>

<form method="post">
    Клиент:
    <select name="id_client">
        <?php foreach ($clients as $c): ?>
        <option value="<?= $c['id_client'] ?>" <?= $c['id_client'] == $deal['id_client'] ? 'selected' : '' ?>>
            <?= $c['first_name'] ?> <?= $c['last_name'] ?>
        </option>
        <?php endforeach; ?>
    </select><br>

    Дом:
    <select name="id_house">
        <?php foreach ($houses as $h): ?>
        <option value="<?= $h['id_house'] ?>" <?= $h['id_house'] == $deal['id_house'] ? 'selected' : '' ?>>
            <?= $h['address'] ?>
        </option>
        <?php endforeach; ?>
    </select><br>

    Агент:
    <select name="id_agent">
        <?php foreach ($agents as $a): ?>
        <option value="<?= $a['id_agent'] ?>" <?= $a['id_agent'] == $deal['id_agent'] ? 'selected' : '' ?>>
            <?= $a['first_name'] ?> <?= $a['last_name'] ?>
        </option>
        <?php endforeach; ?>
    </select><br>

    Сумма: <input name="amount" type="number" value="<?= $deal['amount'] ?>"><br>
    Дата: <input name="data" type="data" value="<?= $deal['data'] ?>"><br>
    <button>Сохранить</button>
</form>
