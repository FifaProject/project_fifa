<?php
require_once ("conn-database.php");
$isEmpty = 'Er zijn velden leeg gelaten. Vul alle velden in AUB!';
$invalidPassword = 'Wachtwoord niet geldig. Gebruik min 8 en max 20 karakters, gebruik ook minimaal 1 cijfer en hoofdletter';
$inUse = 'De ingevoerde gebruikersnaam bestaat al. Probeer het opnieuw';
$fatalError = 'er is iets fout gegaan! Probeer het opnieuw';
$checkPw = 'het bevestigings wachtwoord komt niet overeen met uw wachtwoord. Probeer het opnieuw.';
$accountCreated = "Account aangemaakt";





if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordCheck = $_POST['password-confirm'];

    $select = ("SELECT * FROM `tbl_user` WHERE `username` = '$username'");
    $result = $database->query($select)->rowCount();
        if (($_POST['username'] != "") && ($_POST['password'] != ""))
        {
            if ($result != 1)
            {
                    if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password))
                    {
                        if ($password == $passwordCheck)
                        {
                            $password = hash('ripemd160', $password);
                            $sql = "INSERT INTO `tbl_user` (`user_id`, `username`, `password`) VALUES (NULL, '$username', '$password')";
                            $database->query($sql);
                            header("Location: ../register.php?message=$accountCreated");
                        }else
                            {
                                header("Location: ../register.php?message=$checkPw");
                            }
                    } else
                        {
                            header("Location: ../register.php?message=$invalidPassword");
                        }
            }else
                {
                    header("Location: ../register.php?message=$inUse");
                }
        }else
            {
                header("Location: ../register.php?message=$isEmpty");

            }
}else
    {
        $_GET['fatalError'] = $fatalError;
        //header("Location: ../register.php?message=$fatalError");
    }

