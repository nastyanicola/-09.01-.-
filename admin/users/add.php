<?php require __DIR__ . '/../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO users (name, phone, email, password, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([
        $_POST['name'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['password']
    ]);
    header("Location: index.php");
    exit;
} ?>
<form method="post">
    Имя: <input name="name"><br>
    Телефон: <input name="phone"><br>
    Email: <input name="email"><br>
    Пароль: <input name="password" type="text"><br>
    <button>Сохранить</button>
</form>
