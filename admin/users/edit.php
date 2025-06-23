<?php require __DIR__ . '/../../db.php';

$id = $_GET['id'];
$user = $pdo->query("SELECT * FROM users WHERE id=$id")->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE users SET name=?, phone=?, email=?, password=? WHERE id=?");
    $stmt->execute([
        $_POST['name'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['password'],
        $id
    ]);
    header("Location: index.php");
    exit;
} ?>
<form method="post">
    Имя: <input name="name" value="<?= $user['name'] ?>"><br>
    Телефон: <input name="phone" value="<?= $user['phone'] ?>"><br>
    Email: <input name="email" value="<?= $user['email'] ?>"><br>
    Пароль: <input name="password" type="text" value="<?= $user['password'] ?>"><br>
    <button>Сохранить</button>
</form>
