<?php session_start();
include "db.php";
include "header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЛК-Телеком - Редактирование пользователя</title>
</head>
<style>
        /* Общие стили */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            margin: 20px 0;
            color: #2e7d32;
            font-size: 32px;
        }
        
        /* Центральный контейнер */
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 20px;
        }
        
        /* блок редактирование */
        .edit_block {
            min-height: 400px;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
        }
        
        .edit_block:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            border-color: #388e3c;
        }
        
        .edit_block ul {
            list-style: none;
            padding: 0;
            margin: 0;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .edit_block li {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px dashed #e0e0e0;
        }
        
        .edit_block li:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
            margin-top: auto;
        }
        
        .edit_input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
            background-color: #f9f9f9;
        }
        
        .edit_input:focus {
            border-color: #388e3c;
            outline: none;
            background-color: #fff;
        }
        
        /* Кнопка */
        .confirm_btn {
            background-color: #388e3c;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
            text-align: center;
        }
        
        .confirm_btn:hover {
            background-color: #2e7d32;
        }
        
        .confirm_btn a {
            text-decoration: none;
            color: #fff;
            display: block;
        }
        .tariff_select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        
        /* Адаптивность */
        @media (max-width: 992px) {
            .user_edit_block {
                width: 70%;
                height: 60vh;
            }
        }
        
        @media (max-width: 768px) {
            .user_edit_block {
                width: 90%;
                height: 70vh;
                min-height: 300px;
            }
            
            h1 {
                font-size: 24px;
            }
            
            .edit_input {
                padding: 10px 12px;
            }
        }
</style>
<body>
    <main>
        <?php switch ($_GET['action']) {
        case 'edit_user':
        $id = $_GET['id'] ?? 0;
        $stm = $connect->prepare('SELECT * FROM `users` WHERE id = ?');
        $stm->execute([$id]);
        $user = $stm->fetch();
        echo
        '<h1>Редактирование пользователя</h1>       
        <div class="center-container">
            <div class="edit_block" >
                <ul>';
                    if ($user) {
                        echo '
                        <form action="action_do.php?action=edit_user&id='.$user['id'].'" method="post">
                        <li>
                            <label>Логин:</label>
                            <input type="text" class="edit_input" value="'.$user['login'].'" name="login">
                        </li>
                        <li>
                            <label>Имя:</label>
                            <input type="text" class="edit_input" value="'.$user['name'].'" name="name">
                        </li>
                        <li>
                            <label>Фамилия:</label>
                            <input type="text" class="edit_input" value="'.$user['surname'].'" name="surname">
                        </li>
                        <li>
                            <label>Телефон:</label>
                            <input type="text" class="edit_input" value="'.$user['phone_number'].'" name="phone">
                        </li>
                        <li>
                            <label>Пароль:</label>
                            <input type="text" class="edit_input" value="'.$user['password'].'" name="password">
                        </li>
                        <li>
                            <input type="submit" class="confirm_btn" value="Подтвердить изменения"></input>
                        </li>
                        </form>
                </ul>
            </div>';
                    } else {
                        echo '<li><p>Пользователь не найден</p></li>';
                    }
                    break;
        case 'edit_tariff':
            $id = $_GET['id'] ?? 0;
            $stm = $connect->prepare('SELECT * FROM `tariff` WHERE id = ?');
            $stm->execute([$id]);
            $tariff = $stm->fetch();    
            echo
            '<h1>Редактирование тарифа</h1>       
            <div class="center-container">
                <div class="edit_block" >
                    <ul>';
                        if ($tariff) {
                            echo '
                            <form action="action_do.php?action=edit_tariff&id='.$tariff['id'].'" method="post">
                            <li>
                                <label>Название:</label>
                                <input type="text" class="edit_input" value="'.$tariff['tariff_name'].'" name="tariff_name">
                            </li>
                            <li>
                                <label>Скорость:</label>
                                <input type="text" class="edit_input" value="'.$tariff['tariff_speed'].'" name="tariff_speed">
                            </li>
                            <li>
                                <label>Стоимость:</label>
                                <input type="text" class="edit_input" value="'.$tariff['tariff_price'].'" name="tariff_price">
                            </li>
                            <li>
                                <input type="submit" class="confirm_btn" value="Подтвердить изменения"></input>
                            </li>
                            </form>
                    </ul>
                </div>';
                        } else {
                            echo '<li><p>тариф не найден</p></li>';
                        }
                        break;
        case 'edit_service':
            $id = $_GET['id'] ?? 0;
            $stm = $connect->prepare('SELECT 
            s.*,
            t.tariff_name,
            u.login AS login
            FROM 
            services s
            LEFT JOIN 
            tariff t ON s.tariff_id = t.id
            LEFT JOIN 
            users u ON s.user_id = u.id
            WHERE s.id = ?        
            ');
            $stm->execute([$id]);
            $service = $stm->fetch();    
            echo
            '<h1>Редактирование тарифа</h1>       
            <div class="center-container">
                <div class="edit_block" >
                    <ul>';
                        if ($service) {
                            echo '
                            <form action="action_do.php?action=edit_service&id='.$service['id'].'" method="post">
                            <li>
                                <h3>Заявка от '.$service['login'].'</h3>
                            </li>
                            <li>
                                <label>Адрес:</label>
                                <input type="text" class="edit_input" value="'.$service['addres'].'" name="addres">
                            </li>
                            <li>
                            <label>Тариф:</label>
                            <select id="tariff-type" class="tariff_select" name="tariff_id" required>'; 
                            $stm = $connect->query('SELECT * FROM `tariff`');
                            $tariffs = $stm->fetchAll();                    
                            foreach ($tariffs as $tarif) {
                            $selected = ($tarif['id'] == $service['tariff_id']) ? 'selected' : '';
                            echo '<option value="'.$tarif['id'].'" '.$selected.'>'.$tarif['tariff_name'].' - '.$tarif['tariff_speed'].' Мбит/с ('.$tarif['tariff_price'].' руб./мес)</option>';
                            }
                            echo
                            '
                            </select>
                            </li>
                            <li>
                                <label>Начало:</label>
                                <input type="text" class="edit_input" value="'.$service['tariff_start'].'" name="tariff_start">
                            </li>
                            <li>
                                <label>Окончание:</label>
                                <input type="text" class="edit_input" value="'.$service['tariff_end'].'" name="tariff_end">
                            </li>
                            <li>
                                <input type="submit" class="confirm_btn" value="Подтвердить изменения"></input>
                            </li>
                            </form>
                    </ul>
                </div>';
                        } else {
                            echo '<li><p>услуга не найдена</p></li>';
                        }
                        break;    
                }?>
        </div>
    </main>
</body>
</html>
<?php include "footer.php"; ?> 