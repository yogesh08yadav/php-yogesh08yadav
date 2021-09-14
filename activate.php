<?php

session_start();
include('dbcon.php');

if(isset($_GET['token'])){

    $token = $_GET['token'];

    $update_query = "UPDATE registration SET status='active' WHERE token='$token'";

    $query = mysqli_query($con,$update_query);

    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Account updated successfully";
            header('location:login.php');
        }
    }else{
        $_SESSION['msg'] = "Account not updated successfully";
        header('location:registration.php');

    }


}
?>