<?php session_start();
include "db.php";
include "header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет - ЛК-Телеком</title>
<style>
        /* Общие стили */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        h1 {
            text-align: center;
            margin: 30px 0;
            color: #2e7d32;
            font-size: 32px;
        }        
        /* Блоки форм */
        .block_wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        
        .input_login, .input_reg, .account {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            margin: 20px 0;
            border: 1px solid #e0e0e0;
            padding: 30px;
        }
        
        .input_wrapper {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        
        .input_style {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        
        .input_style:focus {
            border-color: #388e3c;
            outline: none;
        }
        
        /* Кнопки */
        .edit_btn, .btn_select, input[type="submit"] {
            background-color: #388e3c;
            color: #fff;
            border: none;
            padding: 12px 25px;
            margin: 10px 5px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            text-align: center;
            display: inline-block;
        }
        
        .edit_btn:hover, .btn_select:hover, input[type="submit"]:hover {
            background-color: #2e7d32;
        }
        
        .edit_btn a, .btn_select a {
            text-decoration: none;
            color: #fff;
        }
        
        .li_btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        /* Кнопки переключения форм */
        .form-toggle {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .toggle-btn {
            background-color: #e0e0e0;
            color: #333;
            border: none;
            padding: 12px 30px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .toggle-btn.active {
            background-color: #388e3c;
            color: #fff;
        }
        
        /* Меню аккаунта */
        .account_menu {
            list-style: none;
            padding: 0;
            margin: 0 0 30px 0;
            display: flex;
            justify-content: space-around;
            background-color: #388e3c;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .menu_link {
            flex: 1;
            text-align: center;
        }
        
        .menu_link a {
            display: block;
            padding: 15px 10px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        .menu_link a:hover {
            background-color: #2e7d32;
        }
        
        /* Слайды */
        .slide1 {
            width: 100%;
        }
        
        .slide1 ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .slide1 li {
            margin: 15px 0;
            display: flex;
            align-items: center;
        }
        
        .slide1 h4 {
            margin-left: 15px;
            color: #5d4037;
            min-width: 150px;
        }
        
        /* Тарифы */
        .tariff_wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }
        
        .tariff_block {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            width: 250px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .tariff_block:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .tariff_block h2 {
            color: #388e3c;
            margin-top: 0;
        }
        
        .tariff_block h3 {
            color: #5d4037;
            margin: 10px 0;
        }
        
        .btn_select {
            background-color: #5d4037;
            text-decoration: none;
        }
        
        .btn_select:hover {
            background-color: #3e2723;
        }
        
        /* Информация об услугах */
        .info-container {
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 25px;
            margin: 20px auto;
            max-width: 600px;
        }
        
        .info-field {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #ddd;
        }
        
        .info-field:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: bold;
            color: #5d4037;
            margin-bottom: 5px;
            display: block;
        }
        
        .info-value {
            color: #333;
            font-size: 16px;
        }
        
        /* Стили для поля телефона */
        .phone-input-wrapper {
            position: relative;
            width: 100%;
        }
        
        .phone-input-wrapper .input_style {
            padding-left: 45px;
        }
        
        .phone-prefix {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #388e3c;
            font-weight: bold;
            font-size: 16px;
            pointer-events: none;
            z-index: 1;
        }
        
        .phone-hint {
            font-size: 12px;
            color: #777;
            margin-top: 5px;
            margin-left: 5px;
        }
        
        .phone-valid {
            border-color: #4caf50 !important;
            background-color: #f0fff0;
        }
        
        .phone-invalid {
            border-color: #f44336 !important;
            background-color: #fff0f0;
        }
        
        /* Адаптивность */
        @media (max-width: 768px) {
            .nav_list {
                flex-direction: column;
                align-items: center;
            }
            
            .nav_link {
                margin: 5px 0;
            }
            
            .account_menu {
                flex-direction: column;
            }
            
            .menu_link {
                text-align: left;
            }
            
            .slide1 li {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .slide1 h4 {
                margin-left: 0;
                margin-top: 5px;
            }
            
            .tariff_block {
                width: 100%;
                margin: 10px 0;
            }
            
            .form-toggle {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
            
            .toggle-btn {
                width: 200px;
            }
        }
</style>
</head>
<body>
<?php if (!isset($_SESSION['auth'])) { ?>
    <h1>Добро пожаловать</h1>
    
    <div class="form-toggle">
        <button class="toggle-btn active" id="showLoginBtn">Вход</button>
        <button class="toggle-btn" id="showRegBtn">Регистрация</button>
    </div>
    
    <div class="block_wrapper">
        <!-- Форма авторизации -->
        <div class="input_login" id="loginForm" style="display: block;">
            <form action="auth.php" method="POST">            
                <ul class="input_wrapper">
                    <li><label>Логин</label></li>
                    <li><input type="text" class="input_style" name="login" placeholder="Введите ваш логин"></li>
                    <li><label>Пароль</label></li>
                    <li><input type="password" class="input_style" name="password" placeholder="Введите ваш пароль"></li>
                    <li class="li_btn">
                        <input type="submit" value="Войти" class="edit_btn">
                    </li>
                </ul>
            </form>
        </div>

        <!-- Форма регистрации -->
        <div class="input_reg" id="regForm" style="display: none;">
            <form action="registration.php" method="POST" id="registrationForm">            
                <ul class="input_wrapper">
                    <li><label>Логин</label></li>
                    <li><input type="text" class="input_style" name="login" placeholder="Придумайте логин"></li>
                    <li><label>Имя</label></li>
                    <li><input type="text" class="input_style" name="name" placeholder="Ваше имя"></li>
                    <li><label>Фамилия</label></li>
                    <li><input type="text" class="input_style" name="surname" placeholder="Ваша фамилия"></li>
                    <li><label>Номер телефона</label></li>
                    <li>
                        <div class="phone-input-wrapper">
                            <span class="phone-prefix">+7</span>
                            <input type="tel" class="input_style" name="phone" id="phoneInput" placeholder="(XXX) XXX-XX-XX">
                        </div>
                        <div class="phone-hint" id="phoneHint">Формат: (XXX) XXX-XX-XX</div>
                    </li>
                    <li><label>Пароль</label></li>
                    <li><input type="password" class="input_style" name="password" placeholder="Придумайте пароль"></li>
                    <li class="li_btn"><input class="edit_btn" type="submit" value="Зарегистрироваться"></li>
                </ul>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Переключение форм
        const loginForm = document.getElementById('loginForm');
        const regForm = document.getElementById('regForm');
        const showLoginBtn = document.getElementById('showLoginBtn');
        const showRegBtn = document.getElementById('showRegBtn');
        
        showLoginBtn.addEventListener('click', function() {
            loginForm.style.display = 'block';
            regForm.style.display = 'none';
            showLoginBtn.classList.add('active');
            showRegBtn.classList.remove('active');
        });
        
        showRegBtn.addEventListener('click', function() {
            loginForm.style.display = 'none';
            regForm.style.display = 'block';
            showRegBtn.classList.add('active');
            showLoginBtn.classList.remove('active');
        });
        
        // Обработка телефона в регистрации
        const phoneInput = document.getElementById('phoneInput');
        const phoneHint = document.getElementById('phoneHint');
        const form = document.getElementById('registrationForm');

        function formatPhoneNumber(value) {
            const numbers = value.replace(/\D/g, '');
            
            if (numbers.length === 0) return '';
            if (numbers.length <= 3) return `(${numbers}`;
            if (numbers.length <= 6) return `(${numbers.slice(0,3)}) ${numbers.slice(3)}`;
            if (numbers.length <= 8) return `(${numbers.slice(0,3)}) ${numbers.slice(3,6)}-${numbers.slice(6)}`;
            return `(${numbers.slice(0,3)}) ${numbers.slice(3,6)}-${numbers.slice(6,8)}-${numbers.slice(8,10)}`;
        }

        function validatePhoneNumber(value) {
            const numbers = value.replace(/\D/g, '');
            return numbers.length === 10;
        }

        function updatePhoneInput() {
            let formatted = formatPhoneNumber(phoneInput.value);
            phoneInput.value = formatted;
            
            if (validatePhoneNumber(phoneInput.value)) {
                phoneInput.classList.add('phone-valid');
                phoneInput.classList.remove('phone-invalid');
                phoneHint.style.color = '#4caf50';
                phoneHint.textContent = '✓ Номер корректный';
            } else {
                phoneInput.classList.remove('phone-valid');
                phoneInput.classList.add('phone-invalid');
                phoneHint.style.color = '#f44336';
                phoneHint.textContent = '✗ Формат: (XXX) XXX-XX-XX';
            }
        }

        if (phoneInput) {
            phoneInput.addEventListener('input', updatePhoneInput);
            
            phoneInput.addEventListener('focus', function() {
                if (!this.value) {
                    this.value = '(';
                }
            });

            form.addEventListener('submit', function(e) {
                const numbers = phoneInput.value.replace(/\D/g, '');
                
                if (numbers.length !== 10) {
                    e.preventDefault();
                    phoneInput.classList.add('phone-invalid');
                    phoneHint.style.color = '#f44336';
                    phoneHint.textContent = '✗ Введите корректный номер телефона';
                    
                    phoneInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } else {
                    phoneInput.value = numbers;
                }
            });
        }
    });
    </script>
<?php } else { ?>
    <h1>Ваш аккаунт</h1>
    <div class="block_wrapper">
        <div class="account">
            <ul class="account_menu">
                <li class="menu_link"><a href="account.php?slide=1">Личные данные</a></li>
                <li class="menu_link"><a href="account.php?slide=2">Услуги</a></li>
                <li class="menu_link"><a href="account.php?slide=3">Подключенные услуги</a></li>
            </ul>

            <?php 
            switch ($_GET['slide']) {
                case 1:
                    $phone_number = preg_replace('/^7/', '', $_SESSION['user_data']['phone_number']);
                    echo  
                    '<div class="slide1">
                    <form action="auth_edit.php?id='.$_SESSION['user_data']['id'].'" method="post" id="editForm">
                        <ul>
                            <li>
                                <input type="text" class="input_style" value="'.$_SESSION['user_data']['login'].'" name="login" required>
                                <h4>Логин</h4>
                            </li>
                            <li>
                                <input type="text" class="input_style" value="'.$_SESSION['user_data']['name'].'" name="name" required>
                                <h4>Имя</h4>
                            </li>
                            <li>
                                <input type="text" class="input_style" value="'.$_SESSION['user_data']['surname'].'" name="surname" required>
                                <h4>Фамилия</h4>
                            </li>
                            <li>
                                <div class="phone-input-wrapper">
                                    <span class="phone-prefix">+7</span>
                                    <input type="tel" class="input_style" value="'.$phone_number.'" name="phone" id="editPhoneInput" required>
                                </div>
                                <h4>Номер телефона</h4>
                                <div class="phone-hint" id="editPhoneHint"></div>
                            </li>
                            <li>
                                <input type="text" class="input_style" value="'.$_SESSION['user_data']['password'].'" name="password" required>
                                <h4>Пароль</h4>
                            </li>
                            <li class="li_btn">
                                <input class="edit_btn" value="Редактировать" type="submit"></input>
                                <button class="edit_btn"><a href="logout.php">Выйти</a></button>
                            </li>
                        </ul>
                    </form></div>';
                    
                    echo '
                    <script>
                    document.addEventListener(\'DOMContentLoaded\', function() {
                        const phoneInput = document.getElementById(\'editPhoneInput\');
                        const phoneHint = document.getElementById(\'editPhoneHint\');
                        const form = document.getElementById(\'editForm\');

                        function formatPhoneNumber(value) {
                            const numbers = value.replace(/\D/g, \'\');
                            
                            if (numbers.length === 0) return \'\';
                            if (numbers.length <= 3) return `(${numbers}`;
                            if (numbers.length <= 6) return `(${numbers.slice(0,3)}) ${numbers.slice(3)}`;
                            if (numbers.length <= 8) return `(${numbers.slice(0,3)}) ${numbers.slice(3,6)}-${numbers.slice(6)}`;
                            return `(${numbers.slice(0,3)}) ${numbers.slice(3,6)}-${numbers.slice(6,8)}-${numbers.slice(8,10)}`;
                        }

                        function validatePhoneNumber(value) {
                            const numbers = value.replace(/\D/g, \'\');
                            return numbers.length === 10;
                        }

                        function updatePhoneInput() {
                            let formatted = formatPhoneNumber(phoneInput.value);
                            phoneInput.value = formatted;
                            
                            if (validatePhoneNumber(phoneInput.value)) {
                                phoneInput.classList.add(\'phone-valid\');
                                phoneInput.classList.remove(\'phone-invalid\');
                                phoneHint.style.color = \'#4caf50\';
                                phoneHint.textContent = \'✓ Номер корректный\';
                            } else {
                                phoneInput.classList.remove(\'phone-valid\');
                                phoneInput.classList.add(\'phone-invalid\');
                                phoneHint.style.color = \'#f44336\';
                                phoneHint.textContent = \'✗ Формат: (XXX) XXX-XX-XX\';
                            }
                        }

                        if (phoneInput) {
                            phoneInput.addEventListener(\'input\', updatePhoneInput);
                            
                            phoneInput.addEventListener(\'focus\', function() {
                                if (!this.value) {
                                    this.value = \'(\';
                                }
                            });

                            form.addEventListener(\'submit\', function(e) {
                                const numbers = phoneInput.value.replace(/\D/g, \'\');
                                
                                if (numbers.length !== 10) {
                                    e.preventDefault();
                                    phoneInput.classList.add(\'phone-invalid\');
                                    phoneHint.style.color = \'#f44336\';
                                    phoneHint.textContent = \'✗ Введите корректный номер телефона\';
                                    
                                    phoneInput.scrollIntoView({ behavior: \'smooth\', block: \'center\' });
                                } else {
                                    phoneInput.value = numbers;
                                }
                            });

                            // Форматируем существующий номер при загрузке
                            if (phoneInput.value) {
                                const numbers = phoneInput.value.replace(/\D/g, \'\');
                                if (numbers.length > 0) {
                                    phoneInput.value = formatPhoneNumber(numbers);
                                }
                            }
                        }
                    });
                    </script>';
                    break;
                    
                case 2: 
                    $stm = $connect->query('SELECT * FROM `tariff`');
                    $tariffs = $stm->fetchAll();
                    echo '<div class="tariff_wrapper">';                  
                    foreach ($tariffs as $tarif) {
                        echo '
                        <div class="tariff_block">
                            <h2>'.$tarif['tariff_name'].'</h2>
                            <h3>'.$tarif['tariff_speed'].' Мбит/с</h3>
                            <h3>'.$tarif['tariff_price'].' руб./мес</h3>
                            <a class="btn_select" href="choose_tariff.php?tariff_select='.$tarif['id'].'">Выбрать</a>
                        </div>';
                    } 
                    echo '</div>';
                    break;
                    
                case 3:
                    $id_of_user = $_SESSION['id_user'];
                    $stm = $connect->query("SELECT services.*, tariff.tariff_name
                    FROM services
                    JOIN tariff ON services.tariff_id = tariff.id
                    WHERE services.user_id = $id_of_user");
                    $services = $stm->fetchAll();
                    
                    if ($services) {
                        foreach ($services as $service)
                        echo '<div class="info-container">
                            <div class="info-field">
                                <span class="info-label">Тариф:</span>
                                <span class="info-value">'.$service['tariff_name'].'</span>
                            </div>
                            <div class="info-field">
                                <span class="info-label">Адрес:</span>
                                <span class="info-value">'.$service['addres'].'</span>
                            </div>
                            <div class="info-field">
                                <span class="info-label">Начало действия:</span>
                                <span class="info-value">'.$service['tariff_start'].'</span>
                            </div>
                            <div class="info-field">
                                <span class="info-label">Окончание действия:</span>
                                <span class="info-value">'.$service['tariff_end'].'</span>
                            </div>
                        </div>';
                    } else {
                        echo '<div class="info-container">
                            <p>У вас нет подключенных тарифов</p>
                            <button class="edit_btn"><a href="account.php?slide=2">Выбрать тариф</a></button>
                        </div>';
                    }
                    break;
            }
            ?>
        </div>
    </div>
<?php } ?>
</body>
</html>
<?php include "footer.php"; ?>