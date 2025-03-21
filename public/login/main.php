<?php session_start();
include "db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        /* Общие стили */
        body {
        font-family: sans-serif;
        margin: 0;
        background-color: #fff;
        }
        h1,h2,h3 {
        text-align: center;
        margin-top: 20px;
        color: black;
        }
        p {
        font-family: sans-serif; /* Используйте шрифт без засечек */
        font-size: 16px; /* Размер шрифта 16 пикселей */
        line-height: 1.5; /* Межстрочный интервал 1.5 */
        color: #333; /* Серый цвет текста */
        }
        /* Навигационная панель */
        .nav_bar {
        background-color: green; /* Синий цвет */
        color: #fff;
        padding: 10px 0;
        }
        .nav_list {
        display: flex;
        justify-content: center;
        list-style: none;
        max-width: 1600px; /* Максимальная ширина контейнера 1200 пикселей */
        margin: auto; /* Центрирование по горизонтали */
        padding: 20px; /* Отступ 20 пикселей со всех сторон */
        }
        .nav_link {
        margin: 0 15px;
        }
        .nav_link a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        }
    .input_reg {
        position: relative;
        margin: auto;
        width: 500px;
        min-height: 350px;
        background-color: antiquewhite;
        border-radius: 20px;
        display: flex;
        justify-content: center;
    }
    .input_wrapper {
        list-style-type: none; 
    }
    .input_style {
        width: 240px;
        height: 20px;
        margin: 10px;
    }
    h1 {
        display: flex;
        justify-content: center;
    }
    .show_users {
        position: relative;
        display: inline-block;
        background-color: antiquewhite;
        min-width: 150px;
        margin: 20px;
        border-radius: 20px;
        
    }
    .users_info {
        padding-left: 10px;
    }
    .edit_btn {
        background-color: brown;
        margin: 10px;
        min-width: 50px;
        height: 30px;
        border-radius: 30px;
    }
    .edit_btn a {
        text-decoration: none;
        color: white;
    
    }
    .main_content {
        position: relative;
        display: flex;
        max-width: 1200px;
        background-color:#fff1;
        margin: auto;
        
        flex-wrap: wrap;
        justify-content: center;
        flex-direction: column;
    }
        .short_content {
            background-image: url("main_images.jpg");
            background-repeat: no-repeat;
            background-size: contain;
            height: 600px;

            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-content: center;
        }
        .short_content h3 {
            display: flex;
            justify-content: center;
        }
        .description_content {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .block {
            width: 150px;
            display: block;
            flex-direction: column;
            justify-content: flex-start;

            padding: 20px;
            border-radius: 5px;
            background-color: #f5f5f5; /* Светло-серый фон */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Тень */
            margin: 20px;
        }
        .block:hover {
            background-color:rgb(133, 204, 124);
            transition: background-color 0.5s ease, color 0.5s ease;
        }
        .services {
            display: flex;
            justify-content: center;
        }
        .show_tariff {
        border: 1px solid #ddd; /* Тонкая граница */
        padding: 20px; /* Отступ внутри */
        margin-bottom: 20px; /* Отступ снизу */
        border-radius: 5px; /* Скругленные углы */
        background-color: #f9f9f9; /* Светло-серый фон */
        margin: 20px;
        }

        .show_tariff ul {
        list-style: none; /* Убираем маркеры списка */
        padding: 0; /* Убираем отступ списка */
        }

        .show_tariff li {
        margin-bottom: 10px; /* Отступ снизу для каждого элемента списка */
        }

        .tariff_info {
        font-weight: bold; /* Жирный шрифт для информации */
        }
        footer {
        background-color: #f0f0f0;
        padding: 30px 0;
        text-align: center;
        }

        .container {
        max-width: 960px;
        margin: 0 auto;
        }

        .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        }

        .col-md-4 {
        width: 33.33%;
        padding: 0 15px;
        }

        .social-links {
        list-style: none;
        padding: 0;
        }

        .social-links li {
        display: inline-block;
        margin: 0 10px;
        }

        .social-links a {
        color: #333;
        font-size: 18px;
        }

        .copyright {
        margin-top: 30px;
        font-size: 14px;
        }

</style>
<body>
<nav class="nav_bar">
    <h2>ЛК-Телеком</h2>
            <ul class="nav_list">
                <li class="nav_link"><a href="main.php">Главная</a></li>
                <li class="nav_link"><a href="tariffs.php">Тарифы</a></li>
                <li class="nav_link"><a href="<?php if (isset($_SESSION['auth'])) {echo 'account.php?slide=1';} else echo 'account.php'; ?>">Аккаунт</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role']==1) { echo
                '<li class="nav_link"><a href="admin.php">Админ панель</a></li>';}?>
            </ul>
        </nav>

        <div class="main_content">
                    <div class="short_content">
                        <h3>ЛК-Телеком</h3>
                        <h1>Интернет на дом</h1>
                        <h3>быстро.качественно.надежно</h3>
                    </div>
                    <h2>Почему именно мы</h2>
                    <div class="description_content">
                        <div class="block">
                            <h3>Стабильность</h3>
                            <p>Подключаем кабельный интернет по оптоволокну с 2005 года и имеем обширную сеть с дублирующими каналами</p>
                        </div>
                        <div class="block">
                            <h3>Покрытие</h3>
                            <p>Осуществляем подключение абонентов частного сектора в пригородах г.Красногорска и Красногорском районе</p>
                        </div>
                        <div class="block">
                            <h3>Высокая скорость</h3>
                            <p>Современное и качественное оборудование гарантирует высокую скорость интернета</p>
                        </div>
                        <div class="block">
                            <h3>Безлимитный интернет</h3>
                            <p>Удобная тарифная сетка, демократичная стоимость тарифных планов</p>
                        </div>
                    </div>
                    <h2>Предоставляемы нами тарифы</h2>
                    <div class="services">
                    <?php
                    $stm = $connect->query('SELECT * FROM `tariff`');
                    $tariffs = $stm->fetchAll();
                    foreach($tariffs as $tarif)
                    {
                    echo
                    '<div class="show_tariff">'.
                        '<ul>'.
                        '<li><h3>'.$tarif['tariff_name'].'</h3></li>'.
                        '<li><p class="tariff_info">'.$tarif['tariff_speed'].' Мб/с</p></li>'.
                        '<li><p class="tariff_info">'.$tarif['tariff_price'].' руб</p></li>'.
                        '</ul>'.
                    '</div>';
                    }?>
                    </div>
        </div>
                    <footer>
            <div class="container">
                <div class="row">
                <div class="col-md-4">
                    <h3>О компании</h3>
                    <p>Информация о вашей компании, миссия, ценности.</p>
                    <ul class="social-links">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Полезные ссылки</h3>
                    <ul>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">Политика конфиденциальности</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Контакты</h3>
                    <p>Адрес, телефон, email.</p>
                </div>
                </div>
                <div class="copyright">
                <p>&copy; 2023 [Название компании]. Все права защищены.</p>
                </div>
            </div>
            </footer>
</body>
</html>