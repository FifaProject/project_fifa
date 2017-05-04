<?php
    require('DataBase.php');

    $username = $_GET['username'];
    $password = $_GET['password'];

    $sql = "SELECT * FROM `tbl_users` WHERE `username` = '$username' && `password` = '$password'";

    if($database->query($sql)->rowCount() == 1) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header('location: HomePage');
    }
    else {
    header('location: index');
    }
?>