<?php 
session_start();
include "db.php";

    // Получаем текущую дату
if (!empty($_POST['addres']) && !empty($_POST['tariff_select']) && !empty($_SESSION['id_user']))
{

    $currentDate = date('Y-m-d');

    $futureDate = date('Y-m-d', strtotime('+30 days'));

    $quary = $connect->prepare('INSERT INTO `services`(`id`, `user_id`, `tariff_id`, `addres`, `tariff_start`, `tariff_end`) VALUES (null,?,?,?,?,?)');

    $user = $quary->execute([
        $_SESSION['id_user'],
        $_POST['tariff_select'],
        $_POST['addres'],
        $currentDate,
        $futureDate
    ]);
    if ($user) {
        header('Location:main.php?message=success');
    } else {
        header('Location:main.php?message=error');
    }
}else header('Location:main.php?message=null');
?>