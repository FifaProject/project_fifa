<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!---->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Project fifa</title>-->
<!--    <link rel="stylesheet" type="text/css" href="../public/assets/css/style.css">-->
<!--</head>-->
<!--<body>-->
<!---->
<!--</body>-->
<!--</html>-->
<?php
require_once ("database.php");
$empty = "Er zijn velden leeg gelaten";
$team = "Team:";
$inputError = "Foutieve invoer wordt niet geaccepteerd. Probeer het opnieuw.";
$nothingFound = "Poule niet gevonden. Probeer het opnieuw";
$succes = "Poule gevonden!";

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $pouleid = $_GET['pouleid'];

    if (!empty($pouleid))
    {
        if (preg_match('/^[0-9]*$/', $pouleid))
        {
            if ($pouleid >= 1 && $pouleid <= 100)
            {
                $stmt = $database->prepare(("SELECT * FROM `tbl_teams` WHERE `poule_id` = :pouleid"));
                $stmt->execute(array("pouleid" => $pouleid));

                $result = $stmt->rowCount();
                if ($result > 0)
                {


                    header("Location: ../public/addpoule.php?succes=$succes&pouleid=$pouleid");
//                    $sth = $database->prepare("SELECT `name` FROM `tbl_teams` WHERE `poule_id` = '$pouleid'");
//                    $sth->execute();
//                    /* Fetch all of the remaining rows in the result set */
//                    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
//                    foreach($result as $teams) {
//                        echo "Poule:" . $pouleid;
//                        echo '<ul>';
//                        echo '<div class="teams">';
//                        echo '<li>' . $team . " " . $teams['name'] . '</li>';
//                        echo '</div>';
//
//                        $test = $teams['name'];
//                        $sql = "SELECT `first_name`,`last_name` FROM `tbl_players` WHERE `team_id` = (SELECT `id` FROM `tbl_teams` WHERE `name` = '$test')";
//                        $sth = $database->prepare($sql);
//                        $sth->execute();
//                        $players = $sth->fetchAll(PDO::FETCH_ASSOC);
//                        foreach($players as $player) {
//                            echo '<li>' . $player['first_name'] . " " . $player['last_name'] . '</li>';
//
//                        }
//                        echo '</ul>';
//                    }

                }else
                    {
                        header("Location: ../public/addpoule.php?message=$nothingFound");
                    }
            }else
                {
                    header("Location: ../public/addpoule.php?message=$inputError");
                }
        }else
            {
                header("Location: ../public/addpoule.php?message=$inputError");
            }
    } else
        {
            header("Location: ../public/addpoule.php?message=$empty");
        }