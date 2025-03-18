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
                <li class="nav_link"><a href="login.php">Авторизация</a></li>
                <li class="nav_link"><a href="">Регистрация</a></li>
                <li class="nav_link"><a href=""></a></li>
            </ul>
        </nav>

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
                <li><input type="submit" value="send"></li>
            </ul>
            </form>
        </div>

        <?php
        session_start();
        $connect = new PDO('mysql:host=mysql-8.0;dbname=Communication_services','root','');


        $stm = $connect->query('SELECT * FROM `users`');
        $users = $stm->fetchAll();
        foreach($users as $user)
        {
        echo
        '<div class="show_users">'.
            '<p class="users_info">'."Логин - ".$user['login'].'</p>'.
            '<p class="users_info">'."Логин - ".$user['name'].'</p>'.
            '<p class="users_info">'."Логин - ".$user['surname'].'</p>'.
            '<p class="users_info">'."Логин - ".$user['phone_number'].'</p>'.
            '<button class="edit_btn"><a href="edit.php?'.$_SESSION['user_id']=$user['id'].'">Изменить</a></button>'.
            '<button class="edit_btn"><a href="delete.php?'.$_SESSION['user_id']=$user['id'].'">Удалить</a></button>'.
        '</div>';
        }?>
</body>
</html>