<?php require __DIR__ . '/../db.php';
$id = $_GET['id'];
$agent = $pdo->query("SELECT * FROM agent WHERE id_agent=$id")->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE agent SET first_name=?, last_name=?, phone=?, email=? WHERE id_agent=?");
    $stmt->execute([$_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['email'], $id]);
    header("Location: index.php");
    exit;
} ?>
<form method="post">
    Имя: <input name="first_name" value="<?= $agent['first_name'] ?>"><br>
    Фамилия: <input name="last_name" value="<?= $agent['last_name'] ?>"><br>
    Телефон: <input name="phone" value="<?= $agent['phone'] ?>"><br>
    Email: <input name="email" value="<?= $agent['email'] ?>"><br>
    <button>Сохранить</button>
</form>