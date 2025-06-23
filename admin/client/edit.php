<?php require __DIR__ . '/../db.php';

$id = $_GET['id'];
$client = $pdo->query("SELECT * FROM client WHERE id_client=$id")->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE client SET first_name=?, last_name=?, phone=?, email=?, budget=? WHERE id_client=?");
    $stmt->execute([$_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['email'], $_POST['budget'], $id]);
    header("Location: index.php");
    exit;
}
 ?>

<form method="post">
    Имя: <input name="first_name" value="<?= $client['first_name'] ?>"><br>
    Фамилия: <input name="last_name" value="<?= $client['last_name'] ?>"><br>
    Телефон: <input name="phone" value="<?= $client['phone'] ?>"><br>
    Email: <input name="email" value="<?= $client['email'] ?>"><br>
    Бюджет: <input name="budget" type="number" value="<?= $client['budget'] ?>"><br>
    <button>Сохранить</button>
</form>