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

document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function (e) {
        let isValid = true;
        const inputs = form.querySelectorAll('input');

        inputs.forEach(input => {
            const error = input.nextElementSibling;
            if (error && error.classList.contains('error-msg')) {
                error.remove();
            }

            input.value = input.value.trim();

            if (!input.value) {
                showError(input, 'Поле обязательно для заполнения');
                isValid = false;
                return;
            }

            if (input.name === 'name' && /[^а-яА-Яa-zA-Z\s\-]/.test(input.value)) {
                showError(input, 'Имя не должно содержать цифры или спецсимволы');
                isValid = false;
            }

            if (input.name === 'email' && !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(input.value)) {
                showError(input, 'Некорректный формат почты');
                isValid = false;
            }

            if (input.name === 'password' && input.value.length < 6) {
                showError(input, 'Пароль должен быть не менее 6 символов');
                isValid = false;
            }

            if (input.name === 'phone' && input.value.replace(/\D/g, '').length !== 11) {
                showError(input, 'Введите корректный номер телефона');
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();
        }
    });
});

function showError(input, message) {
    const error = document.createElement('div');
    error.className = 'error-msg';
    error.style.color = 'red';
    error.style.fontSize = '13px';
    error.style.marginTop = '5px';
    error.textContent = message;
    input.insertAdjacentElement('afterend', error);
}


document.addEventListener('DOMContentLoaded', function () {
    const reviewForm = document.querySelector('.reviews-form');

    reviewForm.addEventListener('submit', function (e) {
        let isValid = true;

        // Удалить предыдущие сообщения об ошибке
        reviewForm.querySelectorAll('.error-msg').forEach(el => el.remove());

        // Проверка поля имени
        const nameInput = reviewForm.querySelector('input[name="name"]');
        if (!nameInput.value.trim()) {
            showError(nameInput, 'Пожалуйста, введите ваше имя');
            isValid = false;
        }

        // Проверка выбора рейтинга
        const ratingInputs = reviewForm.querySelectorAll('input[name="rating"]');
        let ratingSelected = false;
        ratingInputs.forEach(input => {
            if (input.checked) {
                ratingSelected = true;
            }
        });
        if (!ratingSelected) {
            const ratingBlock = reviewForm.querySelector('.rating');
            showError(ratingBlock, 'Пожалуйста, выберите оценку');
            isValid = false;
        }

        // Проверка текстового отзыва
        const messageInput = reviewForm.querySelector('textarea[name="message"]');
        if (!messageInput.value.trim()) {
            showError(messageInput, 'Пожалуйста, напишите отзыв');
            isValid = false;
        }

        // Отмена отправки, если есть ошибки
        if (!isValid) {
            e.preventDefault();
        }
    });

    // Функция показа ошибок
    function showError(element, message) {
        const error = document.createElement('div');
        error.className = 'error-msg';
        error.style.color = 'red';
        error.style.fontSize = '13px';
        error.style.marginTop = '5px';
        error.textContent = message;
        element.insertAdjacentElement('afterend', error);
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    const inputs = {
        name: document.getElementById('name'),
        surname: document.getElementById('surname'),
        email: document.getElementById('email'),
        phone: document.getElementById('phone'),
        message: document.getElementById('message')
    };

    const errors = {
        name: document.getElementById('name-error'),
        surname: document.getElementById('surname-error'),
        email: document.getElementById('email-error'),
        phone: document.getElementById('phone-error'),
        message: document.getElementById('message-error')
    };

    // 4.1.4. Маска ввода для телефона
    inputs.phone.addEventListener('input', function (e) {
        const input = e.target.value.replace(/\D/g, '');
        let formattedInput = '';

        if (input.length > 0) {
            formattedInput = '+7 (' + input.substring(1, 4);
        }
        if (input.length >= 4) {
            formattedInput += ') ' + input.substring(4, 7);
        }
        if (input.length >= 7) {
            formattedInput += '-' + input.substring(7, 9);
        }
        if (input.length >= 9) {
            formattedInput += '-' + input.substring(9, 11);
        }

        e.target.value = formattedInput;
    });

    // 4.1.3. Ограничение на ввод некорректных символов
    inputs.name.addEventListener('input', function (e) {
        e.target.value = e.target.value.replace(/[^a-zA-Zа-яА-ЯёЁ\s-]/g, '');
    });

    inputs.surname.addEventListener('input', function (e) {
        e.target.value = e.target.value.replace(/[^a-zA-Zа-яА-ЯёЁ\s-]/g, '');
    });

    // Валидация при вводе
    Object.keys(inputs).forEach(key => {
        inputs[key].addEventListener('blur', function () {
            validateField(key);
        });
    });

    // Функции валидации
    function validateField(fieldName) {
        const value = inputs[fieldName].value.trim();
        let isValid = true;
        let errorMessage = '';

        // 4.1.2. Проверка на незаполненные поля
        if (!value) {
            isValid = false;
            errorMessage = 'Это поле обязательно для заполнения';
        } else {
            // Дополнительные проверки
            switch (fieldName) {
                case 'name':
                case 'surname':
                    // 4.1.3. Проверка на валидные символы
                    if (!/^[a-zA-Zа-яА-ЯёЁ\s-]+$/.test(value)) {
                        isValid = false;
                        errorMessage = 'Допустимы только буквы, пробелы и дефисы';
                    }
                    break;
                case 'email':
                    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                        isValid = false;
                        errorMessage = 'Введите корректный email адрес';
                    }
                    break;
                case 'phone':
                    // Проверка полного формата телефона
                    if (!/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/.test(value)) {
                        isValid = false;
                        errorMessage = 'Введите телефон в формате: +7 (XXX) XXX-XX-XX';
                    }
                    break;
            }
        }

        // Обновление стилей и сообщений
        if (!isValid) {
            inputs[fieldName].classList.add('error');
            inputs[fieldName].classList.remove('success');
            errors[fieldName].textContent = errorMessage;
            errors[fieldName].style.display = 'block';
        } else {
            inputs[fieldName].classList.remove('error');
            inputs[fieldName].classList.add('success');
            errors[fieldName].style.display = 'none';
        }

        return isValid;
    }

    // Валидация всей формы
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        let isFormValid = true;

        // Проверка всех полей
        Object.keys(inputs).forEach(key => {
            if (!validateField(key)) {
                isFormValid = false;
            }
        });

        // Отправка формы если все валидно
        if (isFormValid) {
            form.submit();
        }
    });
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