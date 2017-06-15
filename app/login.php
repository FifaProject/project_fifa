<?php
    require('database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = hash('ripemd160', $password);
    $sql = "SELECT * FROM `tbl_users` WHERE `username` = '$username' && `password` = '$password'";

    if($database->query($sql)->rowCount() == 1) {
        session_start();
        $_SESSION['username'] = $username;
        header('location: ../public/index.php');
    }
    else {
        $error = "Invalid username/password";
        header("location: ../public/index.php?message=$error");
    }
}

else{
    unset($_SESSION['username']);
    session_start();
    session_destroy();
    header("location: ../public/index.php");
}

?>