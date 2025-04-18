<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
</head>
<style>
            /* Общие стили */
            body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        h1, h2, h3 {
            text-align: center;
            margin-top: 20px;
            color: #d7ccc8; 
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            color: #424242;
        }
        
        /* Навигационная панель */
        .nav_bar {
            background-color: #388e3c; /* Зеленый */
            color: #fff;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .nav_list {
            display: flex;
            justify-content: center;
            list-style: none;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0;
        }
        .nav_link {
            margin: 0 20px;
            padding: 10px 0;
        }
        .nav_link a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s;
        }
        .nav_link a:hover {
            color: #d7ccc8; /* Светло-бежевый */
        }
        

</style>
<nav class="nav_bar">
    <h2>ЛК-Телеком</h2>
            <ul class="nav_list">
                <li class="nav_link"><a href="main.php">Главная</a></li>
                <!-- <li class="nav_link"><a href="tariffs.php">Тарифы</a></li> -->
                <li class="nav_link"><a href="<?php if (isset($_SESSION['auth'])) {echo 'account.php?slide=1';} else echo 'account.php'; ?>">Аккаунт</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role']==1) { echo
                '<li class="nav_link"><a href="admin.php">Админ панель</a></li>';}?>
            </ul>
        </nav>
