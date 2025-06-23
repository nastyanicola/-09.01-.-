<?php require __DIR__ . '/../db.php';

$id = $_GET['id'];
$district = $pdo->query("SELECT * FROM district WHERE id_district=$id")->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE district SET name=? WHERE id_district=?");
    $stmt->execute([$_POST['name'], $id]);
    header("Location: index.php");
    exit;
}
?>

<form method="post">
    Название района: <input name="name" value="<?= htmlspecialchars($district['name']) ?>"><br>
    <button>Сохранить</button>
</form>
