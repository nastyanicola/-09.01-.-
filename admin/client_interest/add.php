<?php require __DIR__ . '/../../db.php';

$clients = $pdo->query("SELECT id_client, first_name, last_name FROM client")->fetchAll();
$house_types = $pdo->query("SELECT id_house_type, type_name FROM house_type")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO client_interest (id_client, id_house_type) VALUES (?, ?)");
    $stmt->execute([$_POST['id_client'], $_POST['id_house_type']]);
    header("Location: index.php");
    exit;
}
?>

<form method="post">
    Клиент: 
    <select name="id_client" required>
        <option value="">Выберите клиента</option>
        <?php foreach ($clients as $c): ?>
            <option value="<?= $c['id_client'] ?>"><?= htmlspecialchars($c['first_name'] . ' ' . $c['last_name']) ?></option>
        <?php endforeach; ?>
    </select><br>

    Тип дома: 
    <select name="id_house_type" required>
        <option value="">Выберите тип дома</option>
        <?php foreach ($house_types as $ht): ?>
            <option value="<?= $ht['id_house_type'] ?>"><?= htmlspecialchars($ht['type_name']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <button>Сохранить</button>
</form>
