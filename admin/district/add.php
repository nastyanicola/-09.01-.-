<?php require __DIR__ . '/../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO district (name) VALUES (?)");
    $stmt->execute([$_POST['name']]);
    header("Location: index.php");
    exit;
}
?>

<form method="post">
    Название района: <input name="name"><br>
    <button>Сохранить</button>
</form>
