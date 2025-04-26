<?php 
include "db.php";
session_start();
if (!empty($_POST['login']) && !empty($_POST['password']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    $stm = $connect->query("SELECT * FROM users WHERE login='$login'");
    $result = $stm->fetch();

    if ($result['password']==$password)
    {

        $_SESSION['id_user']=$result['id'];
        $_SESSION['role']=$result['role'];
        $_SESSION['auth']=1;
        $_SESSION['user_data']=$result;
    }
}
if (!empty($_GET['make']))
{
    $id = $_SESSION['user_data']['id'];
    $stm = $connect->query("SELECT * FROM users WHERE id='$id'");
    $result = $stm->fetch();
    $_SESSION['user_data']=$result;
}
header('location:account.php?slide=1');
?> 
