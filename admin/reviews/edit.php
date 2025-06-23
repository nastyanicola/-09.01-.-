<?php require __DIR__ . '/../../db.php';

$id = $_GET['id'];
$review = $pdo->query("SELECT * FROM reviews WHERE id=$id")->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE reviews SET name=?, rating=?, message=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['rating'], $_POST['message'], $id]);
    header("Location: index.php");
    exit;
}
 ?>

<form method="post">
    Имя: <input name="name" value="<?= $review['name'] ?>"><br>
    Оценка (1–5): <input name="rating" type="number" min="1" max="5" value="<?= $review['rating'] ?>"><br>
    Сообщение:<br>
    <textarea name="message"><?= $review['message'] ?></textarea><br>
    <button>Сохранить</button>
</form>
