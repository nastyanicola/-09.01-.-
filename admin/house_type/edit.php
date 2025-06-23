<?php require __DIR__ . '/../../db.php';

$id = $_GET['id'];
$house_type = $pdo->query("SELECT * FROM house_type WHERE id_house_type=$id")->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE house_type SET type_name=? WHERE id_house_type=?");
    $stmt->execute([$_POST['type_name'], $id]);
    header("Location: index.php");
    exit;
}
?>

<form method="post">
    Тип дома: <input name="type_name" value="<?= htmlspecialchars($house_type['type_name']) ?>"><br>
    <button>Сохранить</button>
</form>
