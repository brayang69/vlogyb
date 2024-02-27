<?php
    require "config/app.php";
    require "config/database.php";


if ($_POST){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    //echo var_dump($_POST);

    if (loginUSER($conx, $email, $pass)){
        header("location: dashboard.php");

    } else{
        header("location: index.php");
    }
}