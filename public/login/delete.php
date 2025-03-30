<?php 
session_start();
include "db.php";

switch ($_GET['delete']){
    case 'user':
        if (!empty($_GET['id']))
        {   
            $id=$_GET['id'];
        
            $stm = $connect->query(
            "DELETE FROM `users` WHERE id='$id'"
            );
            $result = $stm->fetch();
            header('location:admin.php?message=user_delete');
            
        }
        else {header('location:admin.php?message=delete_edit_error');}
        
        break;
    case 'tariff':
        if (!empty($_GET['id']))
        {   
            $id=$_GET['id'];

            $stm = $connect->query(
                "DELETE FROM `tariff` WHERE id='$id'"
            );
            $result = $stm->fetch();
            header('location:admin.php?message=tariff_delete');
            
        }
        else {header('location:admin.php?message=delete_tariff_error');}

        break;
    case 'service':
        if (!empty($_GET['id']))
        {   
            $id=$_GET['id'];

            $stm = $connect->query(
                "DELETE FROM `services` WHERE id='$id'"
            );
            $result = $stm->fetch();
            header('location:admin.php?message=service_delete');
            
        }
        else {header('location:admin.php?message=delete_service_error');}

        break;
}
?>