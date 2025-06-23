<?php require __DIR__ . '/../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO house (id_district, id_agent, id_house_type, address, rooms, area, price, status)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['id_district'], $_POST['id_agent'], $_POST['id_house_type'],
        $_POST['address'], $_POST['rooms'], $_POST['area'],
        $_POST['price'], $_POST['status']
    ]);
    header("Location: index.php");
    exit;
}

$districts = $pdo->query("SELECT * FROM district")->fetchAll();
$agents = $pdo->query("SELECT * FROM agent")->fetchAll();
$types = $pdo->query("SELECT * FROM house_type")->fetchAll();
?>

<form method="post">
    Район:
    <select name="id_district">
        <option value="">Выберите район</option>
        <?php foreach ($districts as $d): ?>
        <option value="<?= $d['id_district'] ?>"><?= $d['name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Агент:
    <select name="id_agent">
        <option value="">Выберите агента</option>
        <?php foreach ($agents as $a): ?>
        <option value="<?= $a['id_agent'] ?>"><?= $a['first_name'] ?> <?= $a['last_name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Тип дома:
    <select name="id_house_type">
        <option value="">Выберите тип дома</option>
        <?php foreach ($types as $t): ?>
        <option value="<?= $t['id_house_type'] ?>"><?= $t['type_name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Адрес: <input name="address"><br>
    Комнат: <input name="rooms" type="number"><br>
    Площадь: <input name="area" type="number"><br>
    Цена: <input name="price" type="number"><br>
    Статус: <input name="status"><br>
    <button>Сохранить</button>
</form>
