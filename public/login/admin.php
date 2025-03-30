<?php session_start();
include "db.php";
include "header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель - ЛК-Телеком</title>
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
        
        /* Контейнеры блоков */
        .show_block_wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        
        /* Блоки информации */
        .show_block {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin: 15px;
            width: 280px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .show_block:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .show_block ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .show_block li {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #e0e0e0;
        }
        
        .show_block li:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        /* Текст информации */
        .users_info, .tariff_info {
            font-weight: bold;
            color: #5d4037; /* Коричневый */
            margin: 5px 0;
        }
        
        /* Кнопки */
        .edit_btn {
            background-color: #388e3c; /* Зеленый */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
            display: inline-block;
            margin: 5px 0;
            width: 100%;
            text-align: center;
        }
        
        .edit_btn:hover {
            background-color: #2e7d32; /* Темно-зеленый */
        }
        
        .edit_btn a {
            text-decoration: none;
            color: #fff;
            display: block;
        }
        
        /* Адаптивность */
        @media (max-width: 768px) {
            .show_block {
                width: 100%;
                margin: 10px 0;
            }
            
            h1 {
                font-size: 24px;
                margin: 20px 0;
            }
        }
</style>
<body>        
    <h1>Редактирование пользователей</h1>
    
    <div class="show_block_wrapper">
        <?php
        $stm = $connect->query('SELECT * FROM `users`');
        $users = $stm->fetchAll();
        foreach($users as $user) {
            echo '
            <div class="show_block">
                <ul>
                    <li><p class="users_info">Логин: '.$user['login'].'</p></li>
                    <li><p class="users_info">Имя: '.$user['name'].'</p></li>
                    <li><p class="users_info">Фамилия: '.$user['surname'].'</p></li>
                    <li><p class="users_info">Телефон: '.$user['phone_number'].'</p></li>
                    <li><button class="edit_btn"><a href="action_admin.php?action=edit_user&id='.$user['id'].'">Изменить</a></button></li>
                    <li><button class="edit_btn"><a href="delete.php?delete=user&id='.$user['id'].'">Удалить</a></button></li>
                </ul>
            </div>';
        } ?>
    </div>
    
    <h1>Редактирование тарифов</h1>
    
    <div class="show_block_wrapper">
        <?php
        $stm = $connect->query('SELECT * FROM `tariff`');
        $tariffs = $stm->fetchAll();
        foreach($tariffs as $tariff) {
            echo '
            <div class="show_block">
                <ul>
                    <li><p class="tariff_info">Название: '.$tariff['tariff_name'].'</p></li>
                    <li><p class="tariff_info">Скорость: '.$tariff['tariff_speed'].' Мбит/с</p></li>
                    <li><p class="tariff_info">Стоимость: '.$tariff['tariff_price'].' руб.</p></li>
                    <li><button class="edit_btn"><a href="action_admin.php?action=edit_tariff&id='.$tariff['id'].'">Изменить</a></button></li>
                    <li><button class="edit_btn"><a href="delete.php?delete=tariff&id='.$tariff['id'].'">Удалить</a></button></li>
                </ul>
            </div>';
        } ?>
    </div>

    <h1>Редактирование заявок</h1>
    
    <div class="show_block_wrapper">
        <?php
        $stm = $connect->query('SELECT 
        s.*,
        t.tariff_name,
        u.login AS login
        FROM 
        services s
        LEFT JOIN 
        tariff t ON s.tariff_id = t.id
        LEFT JOIN 
        users u ON s.user_id = u.id        
        ');
        $services = $stm->fetchAll();
        foreach($services as $service) {
            echo '
            <div class="show_block">
                <ul>
                    <li><p class="tariff_info">Название: '.$service['tariff_name'].'</p></li>
                    <li><p class="tariff_info">Пользователь: '.$service['login'].'</p></li>
                    <li><p class="tariff_info">Адрес: '.$service['addres'].'</p></li>
                    <li><p class="tariff_info">Дата начало: '.$service['tariff_start'].'.</p></li>
                    <li><p class="tariff_info">Дата окончание: '.$service['tariff_end'].'.</p></li>
                    <li><button class="edit_btn"><a href="action_admin.php?action=edit_service&id='.$service['id'].'">Изменить</a></button></li>
                    <li><button class="edit_btn"><a href="delete.php?delete=service&id='.$service['id'].'">Удалить</a></button></li>
                </ul>
            </div>';
        } ?>
    </div>

</body>
<?php include "footer.php"; ?>
</html>