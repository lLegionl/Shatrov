<?php   session_start();
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
        .block_wrapper {
            display: flex;
            flex-wrap: wrap; /* Разрешаем перенос элементов на новую строку */
            justify-content: center; /* Распределяем элементы равномерно */
            max-width: 1600px; /* Максимальная ширина контейнера 1200 пикселей */
            margin: auto; /* Центрирование по горизонтали */
            padding: 20px; /* Отступ 20 пикселей со всех сторон */
        }
    .input_login {
        margin: auto;
        width: 500px;
        min-height: 150px;
        background-color: antiquewhite;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin: 10px; /* Добавляем отступ */
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;

    }
    .input_reg {
        margin: auto;
        width: 500px;
        min-height: 350px;
        background-color: antiquewhite;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin: 10px; /* Добавляем отступ */
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
    }

    .input_wrapper {
        list-style-type: none; 
    }
    .input_style {
        width: 240px;
        height: 20px;
        margin: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }
    h1 {
        display: flex;
        justify-content: center;
    }
    .users_info {
        padding-left: 10px;
    }
        /* Кнопки */
        .edit_btn {
        background-color: green; /* Синий цвет */
        color: #fff;
        border: none;
        padding: 10px 20px;
        margin: 10px;
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
        .li_btn
        {
            display: flex;
            justify-content: center;
        }
    .account_menu {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex; /* Используем flexbox для выравнивания элементов */
        flex-direction: column;
        justify-content: space-around; /* Распределяем элементы равномерно */
        background-color: green; /* Светло-серый фон */
        padding: 10px; /* Отступ 10 пикселей */
        border-radius: 5px; /* Скругленные углы */
        }

    .menu_link {
        margin: 0 10px; /* Отступ между элементами */
        }

    .menu_link a {
        text-decoration: none;
        color: white; /* Темно-серый цвет текста */
        font-weight: bold; /* Жирный шрифт */
        font-size: 20px;
        }

    .menu_link a:hover {
        text-decoration: underline; /* Подчеркивание при наведении */
        }
    .account {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-right:150px;
        margin-left:150px;
        background-color: antiquewhite;
        border-radius: 20px;
        
        min-height: 150px;
        border-radius: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin: 10px; /* Добавляем отступ */
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;

    }
    .slide1 {
        display: inline-block;   
    }
    .slide1 li {
        margin: 10px;
        display: flex;
    }
    .slide1 ul {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        padding-inline-start: 0px;
        max-width: 500px;
        margin-right: 50px;
        margin-top: 20px;
    }
    .slide1 h4 {
        display: flex;
        justify-content: center;
        margin: auto;
        margin-left: 10px;
        }
        .btn_select {
            border-radius: 10px;
            border-color: green;
        }
        .btn_select a {
            color: green;
            text-decoration: none;
            font-size: 16px;
            margin: 5px;
        }
        .tariff_block {
            display: flex;
            flex-direction: column;
            margin-left: 20px;
        }
        .tariff_wrapper {
            position: relative;
            display: flex;
            
            margin-right: 50px;

        }
        .info-container {
            display: flex;
            flex-direction: column; /* Выравниваем поля по вертикали */
            width: 300px; /* Ширина контейнера */
            margin: 20px; /* Центрирование по горизонтали */
            padding: 20px;
            border-radius: 5px;
            background-color: #f5f5f5; /* Светло-серый фон */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Тень */
        }
        .info-field {
            margin-bottom: 10px; /* Отступ между полями */
        }
        .info-label {
            font-weight: bold;
            margin-bottom: 5px; /* Отступ перед значением */
        }
        .info-value {
            color: #333; /* Темно-серый цвет значения */
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
                    <?php var_dump($_SESSION); if (!isset($_SESSION['auth']))  { echo
                '<h1>Авторизация</h1>
    <div class="block_wrapper">            
        <div class="input_login">
            <form action="auth.php" method="POST">            
                <ul class="input_wrapper">
                Login
                <li><input type="text" class="input_style" name="login"></li>
                password
                <li><input type="text" class="input_style" name="password"></li>
                <li class="li_btn"><input type="submit" value="send" class="edit_btn">
                <button class="edit_btn"><a href="edit.php">edit</a></button>
                </li>
            </ul>
            </form>
        </div>
    </div>

            <h1>Регистрация</h1>
    <div class="block_wrapper">            
        <div class="input_reg">
            <form action="registration.php" method="POST">            
                <ul class="input_wrapper">
                Login
                <li><input type="text" class="input_style" name="login"></li>
                Name
                <li><input type="text" class="input_style" name="name"></li>
                Surname
                <li><input type="text" class="input_style" name="surname"></li>
                phone_number
                <li><input type="text" class="input_style" name="phone"></li>
                password
                <li><input type="text" class="input_style" name="password"></li>
                <li><input class="edit_btn" type="submit" value="send"></li>
            </ul>
            </form>
        </div>
    </div>';
    
                } else {?>

            <h1>Ваш аккаунт</h1>
            <div class="block_wrapper"></div>
                <div class="account">
                    

                <ul class="account_menu">
                    <li class="menu_link"><a href="account.php?slide=<?=1?>">личные данные</a></li>
                    <li class="menu_link"><a href="account.php?slide=<?=2?>">услуги</a></li>
                    <li class="menu_link"><a href="account.php?slide=<?=3?>">Подключенные услуги</a></li>
                </ul>

                <?php 
                switch ($_GET['slide']) {
                    case 1:
                        
                        echo  
                        '<div class="slide1">
                        <ul class="slide1_ul">
                            <li><input type="text" class="input_style" value="'.$_SESSION['user_data']['login'].'"><h4>Логин</h4></li>
                            <li><input type="text" class="input_style" value="'.$_SESSION['user_data']['name'].'"><h4>Имя</h4></li>
                            <li><input type="text" class="input_style" value="'.$_SESSION['user_data']['surname'].'"><h4>Фамилия</h4></li>
                            <li><input type="text" class="input_style" value="'.$_SESSION['user_data']['phone_number'].'"><h4>Номер телефона</h4></li>
                            <li><button class="edit_btn"><a href="edit.php?id='.$_SESSION['user_data']['id'].'">edit</a></button>
                            <button class="edit_btn"><a href="logout.php">exit</a></button></li>
                        </ul>
                        </div>';
                        break;
                        case 2: 
                            
                            $stm = $connect->query('SELECT * FROM `tariff`');
                            $tariffs = $stm->fetchAll();
                            echo '<div class="tariff_wrapper">'  ;                  
                            foreach ($tariffs as $tarif)
                            {   echo
                                '
                                <div class="tariff_block">
                                <h2>'.$tarif['tariff_name'].'</h2>
                                <h3>'.$tarif['tariff_speed'].'mb/s</h3>
                                <h3>'.$tarif['tariff_price'].'.руб</h3>
                                <button class="btn_select"><a href="choose_tariff.php?tariff='.$tarif['id'].'">Выбрать</a></button>
                                </div>';
                            } echo '</div>';
                            break;
                        case 3:
                            $id_of_user=$_SESSION['id_user'];
                            $stm = $connect->query("SELECT services.*, tariff.tariff_name
                            FROM services
                            JOIN tariff ON services.tariff_id = tariff.id
                            WHERE services.user_id = $id_of_user");
                            $result = $stm->fetch();
 
                                echo '<div class="info-container">
                                <div class="info-field">
                                    <span class="info-label">Тариф:</span>
                                    <span class="info-value">'.$result['tariff_name'].'</span>
                                </div>
                                <div class="info-field">
                                    <span class="info-label">Аддрес:</span>
                                    <span class="info-value">'.$result['addres'].'</span>
                                </div>
                                <div class="info-field">
                                    <span class="info-label">Начало:</span>
                                    <span class="info-value">'.$result['tariff_start'].'</span>
                                </div>
                                <div class="info-field">
                                    <span class="info-label">Окончание:</span>
                                    <span class="info-value">'.$result['tariff_end'].'</span>
                                </div>
                            </div>';
                            
                            echo '<a href="choose_tariff.php">у вас нету подключенных тарифов</a>' ;

                        break;
                        
                }
                ?>

                </div>
                </div>

        <?php }?>
</body>
</html>