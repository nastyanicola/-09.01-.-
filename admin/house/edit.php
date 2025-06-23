<?php require __DIR__ . '/../db.php';

$id = $_GET['id'];
$house = $pdo->query("SELECT * FROM house WHERE id_house = $id")->fetch();

$districts = $pdo->query("SELECT * FROM district")->fetchAll();
$agents = $pdo->query("SELECT * FROM agent")->fetchAll();
$types = $pdo->query("SELECT * FROM house_type")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE house SET id_district=?, id_agent=?, id_house_type=?, address=?, rooms=?, area=?, price=?, status=? WHERE id_house=?");
    $stmt->execute([
        $_POST['id_district'], $_POST['id_agent'], $_POST['id_house_type'],
        $_POST['address'], $_POST['rooms'], $_POST['area'],
        $_POST['price'], $_POST['status'], $id
    ]);
    header("Location: index.php");
    exit;
}
?>

<form method="post">
    Район:
    <select name="id_district">
        <?php foreach ($districts as $d): ?>
        <option value="<?= $d['id_district'] ?>" <?= $d['id_district'] == $house['id_district'] ? 'selected' : '' ?>>
            <?= $d['name'] ?>
        </option>
        <?php endforeach; ?>
    </select><br>

    Агент:
    <select name="id_agent">
        <?php foreach ($agents as $a): ?>
        <option value="<?= $a['id_agent'] ?>" <?= $a['id_agent'] == $house['id_agent'] ? 'selected' : '' ?>>
            <?= $a['first_name'] ?> <?= $a['last_name'] ?>
        </option>
        <?php endforeach; ?>
    </select><br>

    Тип дома:
    <select name="id_house_type">
        <?php foreach ($types as $t): ?>
        <option value="<?= $t['id_house_type'] ?>" <?= $t['id_house_type'] == $house['id_house_type'] ? 'selected' : '' ?>>
            <?= $t['type_name'] ?>
        </option>
        <?php endforeach; ?>
    </select><br>

    Адрес: <input name="address" value="<?= htmlspecialchars($house['address']) ?>"><br>
    Комнат: <input name="rooms" type="number" value="<?= $house['rooms'] ?>"><br>
    Площадь: <input name="area" type="number" value="<?= $house['area'] ?>"><br>
    Цена: <input name="price" type="number" value="<?= $house['price'] ?>"><br>
    Статус: <input name="status" value="<?= htmlspecialchars($house['status']) ?>"><br>
    <button>Сохранить</button>
</form>
