<?php 
$host = 'MySQL-8.0';
$user = 'root';
$pass = '';
$name = 'Communication_services';
session_start();
if (!empty($_POST['login']) && !empty($_POST['password']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    $link = mysqli_connect($host,$user,$pass,$name) ;

    $quary = "SELECT * FROM users WHERE login='$login'";

    $result = mysqli_query($link,$quary) or die(mysqli_error($link));

    $result = mysqli_fetch_assoc($result);

    if ($result['password']==$password)
    {

        $_SESSION['id_user']=$result['id'];
        $_SESSION['role']=$result['role'];
        $_SESSION['auth']=1;
        $_SESSION['user_data']=$result;
    }
}
header('location:account.php');
?> 
