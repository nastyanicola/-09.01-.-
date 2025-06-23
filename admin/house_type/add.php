<?php require __DIR__ . '/../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO house_type (type_name) VALUES (?)");
    $stmt->execute([$_POST['type_name']]);
    header("Location: index.php");
    exit;
}
?>

<form method="post">
    Тип дома: <input name="type_name"><br>
    <button>Сохранить</button>
</form>
