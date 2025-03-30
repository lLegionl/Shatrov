<?php session_start();
include "db.php";
include "header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подключение тарифа - ЛК-Телеком</title>
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
        h1 {
            text-align: center;
            margin: 30px 0;
            color: #2e7d32; /* Темно-зеленый */
            font-size: 32px;
        }
        
        /* Форма выбора тарифа */
        .tariff-selection {
            max-width: 500px;
            margin: 30px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            border: 1px solid #e0e0e0;
        }
        
        .tariff-selection label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #5d4037; /* Коричневый */
            font-size: 16px;
        }
        
        .tariff-selection input[type="text"],
        .tariff-selection select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        
        .tariff-selection input[type="text"]:focus,
        .tariff-selection select:focus {
            border-color: #388e3c;
            outline: none;
        }
        
        .tariff-selection input[type="text"]::placeholder {
            color: #bdbdbd;
        }
        
        .tariff-selection button {
            background-color: #388e3c; /* Зеленый */
            border: none;
            color: white;
            padding: 12px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 15px 0 0;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        
        .tariff-selection button:hover {
            background-color: #2e7d32; /* Темно-зеленый */
        }
        
        /* Адаптивность */
        @media (max-width: 600px) {
            .tariff-selection {
                margin: 20px 15px;
                padding: 20px;
            }
            
            h1 {
                font-size: 24px;
                margin: 20px 0;
            }
        }
</style>
<body>
    <h1>Подключение тарифа</h1>
    <form action="tariff_claim.php" method="POST">
        <div class="tariff-selection">
            <label for="tariff-type">Выберите тариф:</label>
            <select id="tariff-type" name="tariff_select" required>
            <?php
            $stm = $connect->query('SELECT * FROM `tariff`');
            $tariffs = $stm->fetchAll();                    
            foreach ($tariffs as $tarif) {
                $selected = ($tarif['id'] == $_GET['tariff_select']) ? 'selected' : '';
                echo '<option value="'.$tarif['id'].'" '.$selected.'>'.$tarif['tariff_name'].' - '.$tarif['tariff_speed'].' Мбит/с ('.$tarif['tariff_price'].' руб./мес)</option>';
            }
            ?>
        </select>            
            <label for="tariff-address">Адрес подключения:</label>
            <input type="text" id="tariff-address" name="addres" placeholder="Введите ваш адрес" required>
            
            <button type="submit">Подключить тариф</button>
        </div>
    </form>
</body>
</html>
<?php include "footer.php"; ?>