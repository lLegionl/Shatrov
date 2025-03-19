<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .nav_bar {
        background-color: green;
    }
    .nav_list {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .nav_link {
        list-style-type: none;
        margin: 20px;
    }
    .nav_link a {
        text-decoration: none;
        color: azure;
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
    .show_block {
        position: relative;
        display: inline-block;
        background-color: antiquewhite;
        min-width: 150px;
        margin: 20px;
        border-radius: 20px;
        
    }
    .show_block {
        padding: 20px;
    }
    .show_block li,ul {
        list-style-type: none;
        padding: 0px;

    }
    .tariff_info {
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

</style>
<body>
        <nav class="nav_bar">
            <ul class="nav_list">
                <li class="nav_link"><a href="main.php">Главная</a></li>
                <li class="nav_link"><a href="tariffs.php">Тарифы</a></li>
                <li class="nav_link"><a href="account.php">Аккаунт</a></li>
                <?php session_start(); if (isset($_SESSION['role']) && ($_SESSION['role']==1)) { echo
                '<li class="nav_link"><a href="admin.php">Админ панель</a></li>';}?>
            </ul>
        </nav>
        <h1>Редактирование пользователей</h1>
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
                    <h1>Редактирование тарифов</h1>
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
</body>
</html>