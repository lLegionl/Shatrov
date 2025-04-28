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
        
        /* Основной контент */
        .main_content {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }

            /* Футер */
            footer {
            background-color: #5d4037; /* Коричневый */
            color: #fff;
            padding: 40px 0 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .col-md-4 {
            width: 30%;
            padding: 0 15px;
            margin-bottom: 20px;
        }
        footer h3 {
            color: #d7ccc8; /* Светло-бежевый */
            margin-top: 0;
        }
        footer p, footer a {
            color: #d7ccc8;
        }
        footer a:hover {
            color: #fff;
        }
        .copyright {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #8d6e63;
            font-size: 14px;
        }
        

</style>
<footer>
            <div class="container">
                <div class="row">
                <div class="col-md-4">
                    <h3>О компании</h3>
                    <p>ЛК-Телеком - провайдер качественного интернета 
                        в Красногорске и Красногорском районе с 2005 года.</p>
                </div>
                <div class="col-md-4">
                    <h3>Полезные ссылки</h3>
                    <ul>
                    <li><a href="main.php">Главная</a></li>
                    <li><a href="main.php#tariffs">Тарифы</a></li>
                    <li><a href="<?php if (!empty($_SESSION['auth']) && $_SESSION['auth']==1){ 
                    echo 'account.php?slide=1';}
                    else echo 'account.php';?>">Личный кабинет</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Контакты</h3>
                    <p>г. Красногорск, ул. Ленина, 1</p>
                    <p>Телефон: +7 (495) 123-45-67</p>
                    <p>Email: info@lk-telecom.ru</p>
                </div>
                </div>
                <div class="copyright">
                <p>&copy; 2025 ЛК-Телеком. Все права защищены.</p>
                </div>
            </div>
</footer>