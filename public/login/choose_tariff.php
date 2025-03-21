<?php
session_start();
include "db.php";
?>
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
    .input_choose {
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
    .tariff-selection {
        margin: auto;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
        width: 300px;
    }
    .tariff-selection label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    }
    .tariff-selection input[type="text"],
    .tariff-selection select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
    }
    .tariff-selection button {
    background-color: #4CAF50; /* Зеленый цвет */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    border-radius: 4px;
    cursor: pointer;
    }

    .tariff-selection button:hover {
    background-color: #3e8e41; /* Более темный зеленый при наведении */
    }

</style>
<body>
<nav class="nav_bar">
            <ul class="nav_list">
                <li class="nav_link"><a href="main.php">Главная</a></li>
                <li class="nav_link"><a href="tariffs.php">Тарифы</a></li>
                <li class="nav_link"><a href="<?php if (isset($_SESSION['auth'])) {echo 'account.php?slide=1';} else echo 'account.php'; ?>">Аккаунт</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role']==1) { echo
                '<li class="nav_link"><a href="admin.php">Админ панель</a></li>';}?>
            </ul>
        </nav>
        <h1>Подключение тарифа</h1>
        <form action="tariff_claim.php" method="POST">
        <div class="tariff-selection">
            <label for="tariff-type">Тариф:</label>
            <select id="tariff-type" name="tariff_select">
            <?php
                    $stm = $connect->query('SELECT * FROM `tariff`');
                    $tariffs = $stm->fetchAll();                    
                    foreach ($tariffs as $tarif)
                    {
                        echo '<option value="'.$tarif['id'].'">'.$tarif['tariff_name'].'</option>';
                    }
                    ?>
            </select>
            <label for="tariff-name">Адресс подключение:</label>
            <input type="text" id="tariff-name" name="addres" placeholder="Введите адрес">
            <button type="submit">Отправить</button>
            </form>
    </div>

        
</body>
</html>