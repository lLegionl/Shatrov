<?php 
    include "db.php";

if (!empty($_POST['login']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['phone']) && !empty($_POST['password']))
{
    $quary = $connect->prepare('INSERT INTO `users`(`id`, `login`, `name`, `surname`, `phone_number`, `password`, `role`) VALUES (null,?,?,?,?,?,0)');

    $user = $quary->execute([
        $_POST['login'],
        $_POST['name'],
        $_POST['surname'],
        $_POST['phone'],
        $_POST['password']
    ]);
    if ($user) {
        header('Location:main.php?message=success');
    } else {
        header('Location:main.php?message=error');
    }
}else header('Location:main.php?message=null');
?>