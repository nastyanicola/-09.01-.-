<?php require __DIR__ . '/../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO reviews (name, rating, message) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['rating'], $_POST['message']]);
    header("Location: index.php");
    exit;
}
 ?>

<form method="post">
    Имя: <input name="name"><br>
    Оценка (1–5): <input name="rating" type="number" min="1" max="5"><br>
    Сообщение:<br>
    <textarea name="message"></textarea><br>
    <button>Сохранить</button>
</form>
