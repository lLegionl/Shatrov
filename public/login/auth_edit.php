<?php 
include "db.php";
if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['name']) 
&& !empty($_POST['surname']) && !empty($_POST['phone']))
{   
    session_start();
    $id=$_GET['id'];
    var_dump($_SESSION);
    $login = $_POST['login'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone'];
    $nameUser = $_POST['name'];
    $surname = $_POST['surname'];

    $stm = $connect->query(
    "UPDATE
    users
    SET
    login = '$login',
    name = '$nameUser',
    surname = '$surname',
    phone_number = '$phone_number',
    password = '$password'
    WHERE
    id='$id'"
    );
    $result = $stm->fetch();
    header('location:auth.php?make=update');
    
}
else {header('location:account.php?slide=1&error');}

?> 
