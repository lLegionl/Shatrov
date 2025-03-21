<?php include "db.php"; 
session_start()?>
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
        background-color: #f4f4f4;
        }
        h1 {
        text-align: center;
        margin-top: 20px;
        color: #333;
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
        /* Блок регистрации */
        .input_reg {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
        width: 300px;
        margin: 20px auto; /* Центрирование по горизонтали */
        background-color: #fff;
        }

        .input_wrapper {
        list-style: none;
        padding: 0;
        margin: 0;
        }

        .input_style {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        margin-bottom: 10px;
        }

        /* Блок информации */
        .show_block_wrapper {
            display: flex;
            flex-wrap: wrap; /* Разрешаем перенос элементов на новую строку */
            justify-content: center; /* Распределяем элементы равномерно */
            max-width: 1600px; /* Максимальная ширина контейнера 1200 пикселей */
            margin: auto; /* Центрирование по горизонтали */
            padding: 20px; /* Отступ 20 пикселей со всех сторон */

        }
        .show_block {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin: 10px; /* Добавляем отступ */
        width: 300px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex; /* Добавляем flexbox */
        flex-direction: column; /* Выравниваем элементы по вертикали */
        align-items: flex-start; /* Выравниваем элементы по левому краю */
        }

        .show_block ul {
        list-style: none;
        padding: 0;
        margin: 0;
        }

        .show_block li {
        margin-bottom: 10px;
        list-style: none;
        }

        .users_info {
        font-weight: bold;
        }

        /* Кнопки */
        .edit_btn {
        background-color: green; /* Синий цвет */
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        }

        .edit_btn:hover {
        background-color: darkgreen; /* Более темный синий при наведении */
        }

        .edit_btn a {
        text-decoration: none;
        color: #fff;
        }
</style>
<body>
        <nav class="nav_bar">
            <div class="container">
            <ul class="nav_list">
                <li class="nav_link"><a href="main.php">Главная</a></li>
                <li class="nav_link"><a href="tariffs.php">Тарифы</a></li>
                <li class="nav_link"><a href="<?php if (isset($_SESSION['auth'])) {echo 'account.php?slide=1';} else echo 'account.php'; ?>">Аккаунт</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role']==1) { echo
                '<li class="nav_link"><a href="admin.php">Админ панель</a></li>';}?>
            </ul>
            </div>
        </nav>
        
        <h1>Редактирование пользователей</h1>
        
        <div class="show_block_wrapper">
            
        <?php
        session_start();
        $stm = $connect->query('SELECT * FROM `users`');
        $users = $stm->fetchAll();
        foreach($users as $user)
        {
        echo
        '<div class="show_block">'.
            '<li><p class="users_info">'."Логин - ".$user['login'].'</p></li>'.
            '<li><p class="users_info">'."Имя - ".$user['name'].'</p></li>'.
            '<li><p class="users_info">'."Фамилия - ".$user['surname'].'</p></li>'.
            '<li><p class="users_info">'."Номер телефона - ".$user['phone_number'].'</p></li>'.
            '<li><button class="edit_btn"><a href="edit.php?id='.$user['id'].'">Изменить</a></button></li>'.
            '<li><button class="edit_btn"><a href="delete.php?id='.$user['id'].'">Удалить</a></button></li>'.
        '</div>';
        }?>
        </div>
                    <h1>Редактирование тарифов</h1>
            
        <div class="show_block_wrapper">
        <?php
        session_start();
        $stm = $connect->query('SELECT * FROM `tariff`');
        $tariffs = $stm->fetchAll();
        foreach($tariffs as $tariff)
        {
        echo
        '<div class="show_block">'.
            '<ul>'.
            '<li><p class="tariff_info">'."Название - ".$tariff['tariff_name'].'</p></li>'.
            '<li><p class="tariff_info">'."скорость - ".$tariff['tariff_speed'].'</p></li>'.
            '<li><p class="tariff_info">'."стоимость - ".$tariff['tariff_price'].'</p></li>'.
            '<li><button class="edit_btn"><a href="edit.php?'.$tariff['id'].'">Изменить</a></button></li>'.
            '<li><button class="edit_btn"><a href="delete.php?'.$tariff['id'].'">Удалить</a></button></li>'.
            '</ul>'.
        '</div>';
        }?>
        </div>
</body>
</html>