<?php include "db.php";?>
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
    .show_tariff {
        position: relative;
        display: inline-block;
        background-color: antiquewhite;
        min-width: 150px;
        margin: 20px;
        border-radius: 20px;
        
    }
    .show_tariff {
        padding: 20px;
    }
    .show_tariff li,ul {
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


        <?php
        session_start();
        $stm = $connect->query('SELECT * FROM `tariff`');
        $tariffs = $stm->fetchAll();
        foreach($tariffs as $tarif)
        {
        echo
        '<div class="show_tariff">'.
            '<ul>'.
            '<li><p class="tariff_info">'."Название - ".$tarif['tariff_name'].'</p></li>'.
            '<li><p class="tariff_info">'."скорость - ".$tarif['tariff_speed'].'</p></li>'.
            '<li><p class="tariff_info">'."стоимость - ".$tarif['tariff_price'].'</p></li>'.
            '<li><button class="edit_btn"><a href="edit.php?'.$tarif['id'].'">Изменить</a></button></li>'.
            '<li><button class="edit_btn"><a href="delete.php?'.$tarif['id'].'">Удалить</a></button></li>'.
            '</ul>'.
        '</div>';
        }?>
</body>
</html>