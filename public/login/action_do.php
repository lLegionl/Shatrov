<?php 
session_start();
include "db.php";

switch ($_GET['action']){
    case 'edit_user':
        if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['phone']))
        {   
            $id=$_GET['id'];

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
            header('location:admin.php?message=user_edit_ok');
            
        }
        else {header('location:admin.php?message=user_edit_error');}
        
        break;
    case 'edit_tariff':
        if (!empty($_POST['tariff_name']) && !empty($_POST['tariff_speed']) && !empty($_POST['tariff_price']))
        {   
            $id=$_GET['id'];

            $tariff_name = $_POST['tariff_name'];
            $tariff_speed = $_POST['tariff_speed'];
            $tariff_price = $_POST['tariff_price'];
        
            $stm = $connect->query(
            "UPDATE
            tariff
            SET
            tariff_name = '$tariff_name',
            tariff_speed = '$tariff_speed',
            tariff_price = '$tariff_price'
            WHERE
            id='$id'"
            );
            $result = $stm->fetch();
            header('location:admin.php?message=edit_tariff_ok');
            
        }
        else {header('location:admin.php?message=edit_tariff_error');}

        break;
    case 'edit_service':
        if (!empty($_POST['addres']) && !empty($_POST['tariff_start']) && !empty($_POST['tariff_end']) && !empty($_POST['tariff_id']))
        {   
            $id=$_GET['id'];

            $tariff_id = $_POST['tariff_id'];
            $addres = $_POST['addres'];
            $tariff_start = $_POST['tariff_start'];
            $tariff_end = $_POST['tariff_end'];
        
            $stm = $connect->query(
            "UPDATE
            services
            SET
            tariff_id = '$tariff_id',
            addres = '$addres',
            tariff_start = '$tariff_start',
            tariff_end = '$tariff_end'
            WHERE
            id='$id'"
            );
            $result = $stm->fetch();
            header('location:admin.php?message=edit_service_ok');
            
        }
        else {header('location:admin.php?message=edit_service_error');}

        break;
}
?>