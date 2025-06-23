<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="head">
            <div class="logo">
                <a href="index.html">
                    <img src="./img/logo.svg" alt="Логотип">
                </a>
            </div>
            <div class="pages">
                <a href="catalog.html">Каталог</a>
                <a href="reviews.html">Отзывы</a>
                <a href="contact.html">Контакты</a>
            </div>
            <div class="login">
                <a href="./profile.php">
                    <img src="./img/login.svg" onclick="openModal()" alt="Логотип">
                </a>
            </div>
        </div>
    </header>

    <div class="date">
        <div class="date-head">
            <p>Контактные данные</p>
        </div>
        <div class="date-text">
            Имя: <?= htmlspecialchars($user['name']) ?><br>
            Телефон: <?= htmlspecialchars($user['phone']) ?><br>
            Почта: <?= htmlspecialchars($user['email']) ?><br>
        </div>
    </div>

    <div id="modal" class="request">
        <div class="modal-content">
            <form action="request.php" method="POST" id="request-form" class="form-box">
                <h2>Записаться на просмотр</h2>
                <p>Присоединяйтесь к нам, чтобы получить доступ к эксклюзивным домам</p>

                <input type="text" name="name" placeholder="Имя" required>
                <input type="tel" name="phone" placeholder="Телефон" required>
                <input type="text" name="time" placeholder="Время" required>
                <input type="date" name="date" placeholder="Дата" required>

                <button class="form-btn" type="submit">Записаться</button>
            </form>
        </div>
    </div>


    <footer>
        <div class="footer">
            <div class="slogan">
                <p class="name-podval">Imperium Estates</p>
                <p class="slogan-podval">Откройте для себя уникальные дома<br>
                    с безупречным сервисом и вниманием к каждой детали</p>
            </div>
            <div class="contact">
                <p class="contact1"> Контакты<br></p>
                <p class="contact1"> +7 (999) 999-99-99<br></p>
                <p class="contact1"> info@imperiumestates.com<br></p>
                <p class="contact1"> г.Москва, ул. Домская, д.6</p>
            </div>
        </div>
    </footer>

    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
            switchToLogin();
        }

        function switchToRegister() {
            document.getElementById('login-form').classList.add('hidden');
            document.getElementById('register-form').classList.remove('hidden');
        }

        function switchToLogin() {
            document.getElementById('register-form').classList.add('hidden');
            document.getElementById('login-form').classList.remove('hidden');
        }

        window.addEventListener('click', function (e) {
            const modal = document.getElementById('modal');
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("request-form");
            const nameInput = form.querySelector('input[name="name"]');
            const phoneInput = form.querySelector('input[name="phone"]');
            const timeInput = form.querySelector('input[name="time"]');
            const dateInput = form.querySelector('input[name="date"]');

            document.querySelectorAll('input[name="phone"]').forEach(input => {
                input.addEventListener('input', function () {
                    let cleaned = this.value.replace(/\D/g, '');
                    let formatted = '+7 ';
                    if (cleaned.length > 1) formatted += '(' + cleaned.slice(1, 4);
                    if (cleaned.length >= 4) formatted += ') ' + cleaned.slice(4, 7);
                    if (cleaned.length >= 7) formatted += '-' + cleaned.slice(7, 9);
                    if (cleaned.length >= 9) formatted += '-' + cleaned.slice(9, 11);
                    this.value = formatted;
                });
            });

            nameInput.addEventListener("input", function () {
                const value = nameInput.value;
                if (!/^[а-яА-Яa-zA-Z\s\-]+$/.test(value)) {
                    nameInput.setCustomValidity("Имя может содержать только буквы, пробел и тире.");
                } else {
                    nameInput.setCustomValidity("");
                }
            });

            timeInput.addEventListener('input', function (e) {
                let input = e.target.value.replace(/\D/g, '');
                let formattedInput = '';

                if (input.length > 0) {
                    formattedInput = input.substring(0, 2);
                }
                if (input.length >= 2) {
                    formattedInput += ':' + input.substring(2, 4);
                }

                e.target.value = formattedInput;
            });

            form.addEventListener("submit", function (e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    form.reportValidity();
                }
            });
        });

    </script>
</body>

</html>