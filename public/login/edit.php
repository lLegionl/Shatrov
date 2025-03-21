<?php
include "db.php";
session_start();
?>
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
        min-width: 70px;
        height: 40px;
        border-radius: 30px;
        color: white;
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
                <li class="nav_link"><a href="tariffs.php">Тарифы</a></li>
                <li class="nav_link"><a href="<?php if (isset($_SESSION['auth'])) {echo 'account.php?slide=1';} else echo 'account.php'; ?>">Аккаунт</a></li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role']==1) { echo
                '<li class="nav_link"><a href="admin.php">Админ панель</a></li>';}?>
            </ul>
        </nav>

            <h1>Редактирование</h1>
        <?php 
                session_start();
                $id=$_GET['id'];
                $stm = $connect->query("SELECT * FROM users WHERE id='$id'");
                $result = $stm->fetch();
            

        ?>
        <div class="input_login">
            <form action="auth_edit.php?id=<?=$_GET['id']?>" method="POST">            
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