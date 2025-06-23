<?php require __DIR__ . '/../../db.php';

$id = $_GET['id'];
$clients = $pdo->query("SELECT id_client, first_name, last_name FROM client")->fetchAll();
$house_types = $pdo->query("SELECT id_house_type, type_name FROM house_type")->fetchAll();

$interest = $pdo->query("SELECT * FROM client_interest WHERE id_client_interest=$id")->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE client_interest SET id_client=?, id_house_type=? WHERE id_client_interest=?");
    $stmt->execute([$_POST['id_client'], $_POST['id_house_type'], $id]);
    header("Location: index.php");
    exit;
}
?>

<form method="post">
    Клиент: 
    <select name="id_client" required>
        <option value="">Выберите клиента</option>
        <?php foreach ($clients as $c): ?>
            <option value="<?= $c['id_client'] ?>" <?= $interest['id_client'] == $c['id_client'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['first_name'] . ' ' . $c['last_name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    Тип дома: 
    <select name="id_house_type" required>
        <option value="">Выберите тип дома</option>
        <?php foreach ($house_types as $ht): ?>
            <option value="<?= $ht['id_house_type'] ?>" <?= $interest['id_house_type'] == $ht['id_house_type'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($ht['type_name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <button>Сохранить</button>
</form>
