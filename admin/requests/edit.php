<?php require __DIR__ . '/../../db.php';

$id = $_GET['id'];
$request = $pdo->query("SELECT * FROM requests WHERE id=$id")->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE requests SET name=?, phone=?, time=?, date=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['phone'], $_POST['time'], $_POST['date'], $id]);
    header("Location: index.php");
    exit;
} ?>

<form method="post">
    Имя: <input name="name" value="<?= $request['name'] ?>"><br>
    Телефон: <input name="phone" value="<?= $request['phone'] ?>"><br>
    Время: <input name="time" type="time" value="<?= $request['time'] ?>"><br>
    Дата: <input name="date" type="date" value="<?= $request['date'] ?>"><br>
    <button>Сохранить</button>
</form>
