<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>авторизация</title>
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
    .input_wrapper {
        list-style-type: none; 
        padding: 0px;
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
        width: 50px;
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

            <h1>Редактирование</h1>
        <?php 
                session_start();
                $id=$_SESSION['id_user'];
                $host = 'MySQL-8.0';
                $user = 'root';
                $pass = '';
                $name = 'Communication_services';

                $link = mysqli_connect($host,$user,$pass,$name) ;

                $quary = "SELECT * FROM users WHERE id='$id'";

                $result = mysqli_query($link,$quary) or die(mysqli_error($link));

                $result = mysqli_fetch_assoc($result);


        ?>
        <div class="input_login">
            <form action="auth_edit.php" method="POST">            
            <ul class="input_wrapper">
                Login
                <li><input type="text" class="input_style" name="login" value="<?php echo $result['login'];?>"></li>
                Name
                <li><input type="text" class="input_style" name="name" value="<?php echo $result['name'];?>"></li>
                Surname
                <li><input type="text" class="input_style" name="surname" value="<?php echo $result['surname'];?>"></li>
                phone_number
                <li><input type="text" class="input_style" name="phone" value="<?php echo $result['phone_number'];?>"></li>
                password
                <li><input type="text" class="input_style" name="password" value="<?php echo $result['password'];?>"></li>
                <li><input type="submit" value="send" class="input_style"></li>
                <button class="edit_btn"><a href="delete.php">delete</a></button>
            </ul>
            </ul>
            </form>
        </div>


</body>
</html>