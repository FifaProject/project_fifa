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


    $stmt = $database->prepare("SELECT * FROM `tbl_user` WHERE `username` = :username");
    $stmt->execute(array("username" => $username));
    $result = $stmt->rowCount();
        if (!empty($_POST['username']) && !empty($_POST['password']))
        {
            if ($result != 1)
            {
                    if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password))
                    {
                        if ($password == $passwordCheck)
                        {
                            $password = hash('ripemd160', $password);
                            $stmt = $database->prepare(("INSERT INTO `tbl_user` (`username`, `password`) VALUES (:username, :password)"));
                            $stmt ->execute(array("username" => $username, "password" => $password));

                            header("Location: ../../../public/register.php?message=$accountCreated");
                        }else
                            {

                                header("Location: ../../../public/register.php?message=$checkPw");
                            }
                    }else
                        {

                            header("Location: ../../../public/register.php?message=$invalidPassword");
                        }
            }else
                {

                    header("Location: ../../../public/register.php?message=$inUse");
                }
        }else
            {

                header("Location: ../../../public/register.php?message=$isEmpty");

            }
}else
    {

        header("Location: ../../../public/register.php?message=$fatalError");
    }

