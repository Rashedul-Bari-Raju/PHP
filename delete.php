<?php
    $id = $_GET['id'];
    session_start();
    require_once './db_connect.php';
    $delete_sql = "DELETE FROM `information` WHERE id = '$id'";
    $execute_delete = $conn->query($delete_sql);
    if($execute_delete){
        $_SESSION['delete'] = 'Delete successful !';
        header("location:data-list.php");
    }
