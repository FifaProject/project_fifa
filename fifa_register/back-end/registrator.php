<?php
require_once ("conn-database.php");
$isEmpty = 'please type in a username and password';
$invalidPassword = 'Invalid password. Use a minimum of 8 numbers and a maximum of 20 characters. Also use at least 1 capitol letter and 1 number';
$error = 'something went wrong... Sorry!';
$noPost = 'The program is broken. Please make contact with the developer...';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];

        if ($_POST['username'] != "" || $_POST['password'] != "")
        {
            if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password))
            {
                try
                {
                    $accountCreated = "Account created";
                    $password = hash('ripemd160', $password);
                    $sql = "INSERT INTO `tbl_add-user` (`ID_user`, `username`, `password`) VALUES (NULL, '$username', '$password')";
                    $database->query($sql);
                    $_SESSION['accountCreated'] = $accountCreated;
                    header("Location: ../register.php");
                }catch (PDOException $e)
                {
                    echo $error . $e->getMessage();
                    $_SESSION['error'] = $error;
                    header("Location: ../register.php");
                }
            }else
            {
                $_SESSION['invalidPassword'] = $invalidPassword;
                header("Location: ../register.php");
            }
        }else
            {
                $_SESSION['isEmpty'] = $isEmpty;
                header("Location: ../register.php");

            }

}else
    {
        $_SESSION['noPost'] = $noPost;
        header("Location: ../register.php");
    }

