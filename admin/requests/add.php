<?php require __DIR__ . '/../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO requests (name, phone, time, date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['phone'], $_POST['time'], $_POST['date']]);
    header("Location: index.php");
    exit;
} 
?>

<form method="post">
    Имя: <input name="name"><br>
    Телефон: <input name="phone"><br>
    Время: <input name="time" type="time"><br>
    Дата: <input name="date" type="date"><br>
    <button>Сохранить</button>
</form>
