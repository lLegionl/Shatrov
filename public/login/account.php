<?php session_start();?>
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
    .input_login {
        position: relative;
        margin: auto;
        width: 500px;
        min-height: 150px;
        background-color: antiquewhite;
        border-radius: 20px;
        display: flex;
        justify-content: center;
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
    .show_users {
        position: relative;
        display: inline-block;
        background-color: antiquewhite;
        min-width: 150px;
        margin: 20px;
        border-radius: 20px;
        
    }
    .users_info {
        padding-left: 10px;
    }
    .edit_btn {
        position: relative;
        background-color: brown;
        margin: 10px;
        min-width: 70px;
        height: 40px;
        border-radius: 30px;
        color: white;
    }
    .edit_btn a {
        text-decoration: none;
        color: white;
        padding: 10px;
    }
    .account_menu {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        padding-inline-start: 0px;
        margin-left: 50px;
        margin-top: 20px;
        padding: 0px;
    }
    .menu_link {
        list-style-type: none;
        font-size: 18px;
        background-color: green;
    }
    .account_menu a {
        display: flex;
        justify-content: center;
        color: white;
        text-decoration: none;
        padding: 10px;
    }
    .account {
        display: flex;
        justify-content: space-between;
        margin-right:150px;
        margin-left:150px;
        background-color: antiquewhite;
        border-radius: 20px;
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

</style>
<body>
        <nav class="nav_bar">
            <ul class="nav_list">
                <li class="nav_link"><a href="main.php">Главная</a></li>
                <li class="nav_link"><a href="tariffs.php">Тарифы</a></li>
                <li class="nav_link"><a href="account.php">Аккаунт</a></li>
                <?php if (1==1) { echo
                '<li class="nav_link"><a href="admin.php">Админ панель</a></li>';}?>
            </ul>
        </nav>
                    <?php var_dump($_SESSION); if (!isset($_SESSION['auth']))  { echo
                '<h1>Авторизация</h1>
        <div class="input_login">
            <form action="auth.php" method="POST">            
                <ul class="input_wrapper">
                Login
                <li><input type="text" class="input_style" name="login"></li>
                password
                <li><input type="text" class="input_style" name="password"></li>
                <li><input type="submit" value="send" class="edit_btn">
                <button class="edit_btn"><a href="edit.php">edit</a></button>
                <button class="edit_btn"><a href="logout.php">exit</a></button></li>
            </ul>
            </form>
        </div>

            <h1>Регистрация</h1>

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
        </div>';
                } else {?>

            <h1>Ваш аккаунт</h1>
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
                            <li><button class="edit_btn"><a href="edit.php">edit</a></button>
                            <button class="edit_btn"><a href="logout.php">exit</a></button></li>
                        </ul>
                        </div>';
                }
                ?>

                </div>

        <?php }?>
</body>
</html>