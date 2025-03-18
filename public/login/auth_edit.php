<?php 
$host = 'MySQL-8.0';
$user = 'root';
$pass = '';
$name = 'Communication_services';

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['phone']))
{   
    session_start();
    $id=$_SESSION['id_user'];
    var_dump($_SESSION);
    $login = $_POST['login'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone'];
    $nameUser = $_POST['name'];
    $surname = $_POST['surname'];

    $link = mysqli_connect($host,$user,$pass,$name) ;

    $quary = "UPDATE
    users
    SET
    login = '$login',
    name = '$nameUser',
    surname = '$surname',
    phone_number = '$phone_number',
    password = '$password'
    WHERE
    id='$id'";

    $result = mysqli_query($link,$quary) or die(mysqli_error($link));


}
header('location:login.php')

?> 
