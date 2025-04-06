<?php session_start();
include "db.php";
include "header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЛК-Телеком - Главная</title>
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
        
        /* Баннер */
        .short_content {
            background-image: linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.7)), url("main_images.jpg");
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            margin-bottom: 40px;
        }
        .short_content h1 {
            font-size: 48px;
            color: #2e7d32;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
            margin: 0;
        }
        .short_content h3 {
            font-size: 24px;
            color: #5d4037; /* Коричневый */
            margin: 10px 0 0;
        }
        
        /* Блоки преимуществ */
        .description_content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 40px 0;
        }
        .block {
            width: 250px;
            padding: 25px;
            border-radius: 8px;
            background-color: #f5f5f5;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            margin: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .block:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            background-color: #e8f5e9; /* Светло-зеленый */
        }
        .block h3 {
            color: #388e3c; /* Зеленый */
            margin-top: 0;
        }
        
        /* Тарифы */
        .services {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 30px 0;
        }
        .show_tariff {
            border: 2px solid #a5d6a7; /* Светло-зеленый */
            padding: 25px;
            margin: 15px;
            border-radius: 8px;
            background-color: #fff;
            width: 250px;
            transition: all 0.3s;
        }
        .show_tariff:hover {
            border-color: #388e3c;
            box-shadow: 0 5px 15px rgba(56, 142, 60, 0.2);
        }
        .show_tariff h3 {
            color: #5d4037; /* Коричневый */
            margin-top: 0;
        }
        .tariff_info {
            font-weight: bold;
            color: #388e3c; /* Зеленый */
        }
        .show_tariff ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .show_tariff li {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #c8e6c9; /* Очень светлый зеленый */
        }
        .show_tariff li:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        /* Адаптивность */
        @media (max-width: 768px) {
            .col-md-4 {
                width: 100%;
            }
            .block, .show_tariff {
                width: 100%;
                margin: 10px 0;
            }
            .nav_list {
                flex-direction: column;
                align-items: center;
            }
            .nav_link {
                margin: 5px 0;
            }
        }
</style>
<body>
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
                    <div class="services" id="tariffs">
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
</body>
</html>
<?php include "footer.php"; ?>