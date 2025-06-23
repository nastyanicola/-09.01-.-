<?php require __DIR__ . '/../db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO agent (first_name, last_name, phone, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['email']]);
    header("Location: index.php");
    exit;
} ?>
<form method="post">
    Имя: <input name="first_name"><br>
    Фамилия: <input name="last_name"><br>
    Телефон: <input name="phone"><br>
    Email: <input name="email"><br>
    <button>Сохранить</button>
</form>