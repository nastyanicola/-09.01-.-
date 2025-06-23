<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Подключение автозагрузки Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST["name"]));
    $surname = htmlspecialchars(trim($_POST["surname"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $phone   = htmlspecialchars(trim($_POST["phone"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nastya.naa2109@gmail.com'; 
        $mail->Password   = 'jgzk grbg gssz wuab'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('nastya.naa2109@gmail.com', 'Imperium Estates');
        $mail->addAddress('nastya.naa2109@gmail.com'); 

        $mail->Subject = 'Новое сообщение с сайта';
        $mail->Body    = "Имя: $name\nФамилия: $surname\nEmail: $email\nТелефон: $phone\nСообщение:\n$message";

        $mail->send();
        echo 'Спасибо! Ваше сообщение отправлено.';
    } catch (Exception $e) {
        echo "Ошибка при отправке: {$mail->ErrorInfo}";
    }
}
?>
