<?php
$inputError = "Foutieve invoer wordt niet geaccepteerd. Probeer het opnieuw.";
$empty = "Er zijn velden leeg gelaten.";
$worked = "De uitslagen zijn ingevoerd";
require_once ("../public/DataBase.php");


if  ($_SERVER['REQUEST_METHOD'] == 'GET')
{

    $matchId = $_GET['matchid'];

    if (!empty($_GET['matchid']))
    {
        if (preg_match('/^[0-9]*$/' , $matchId))
        {
            if ($matchId >= 1)
            {
                if ($matchId <= 1000)
                {
                    header("location: ../public/AddResults.php?matchid=$matchId");
                }else
                    {
                        header("Location: ../public/AddResults.php?message=$inputError");
                    }
            }else
                {
                    header("Location: ../public/AddResults.php?message=$inputError");
                }
        }else
            {
                header("Location: ../public/AddResults.php?message=$inputError");
            }
    }else
        {
            header("Location: ../public/AddResults.php?message=$empty");
        }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $scoreTeamOne = $_POST['teamonescore'];
    $scoreTeamTwo = $_POST['teamtwoscore'];
    $matchId = $_POST['matchid'];

    if (!empty($_POST['teamonescore'] && !empty($_POST['teamtwoscore'])))
    {
        if (preg_match('/^[0-9]*$/', $scoreTeamOne) && preg_match('/^[0-9]*$/', $scoreTeamTwo))
        {
            if ($scoreTeamOne >= 0 && $scoreTeamTwo >= 0)
            {
                if ($scoreTeamOne <= 100 && $scoreTeamTwo <= 100)
                {
                    $stmt = $database->prepare(("UPDATE `tbl_matches` SET `score_team_a` = :scoreteama, `score_team_b` = :scoreteamb WHERE `id` = :matchid"));
                    $stmt->execute(array("scoreteama" => $scoreTeamOne, "scoreteamb" => $scoreTeamTwo, "matchid" => $matchId));
                    header("Location: ../public/AddResults.php?matchid=$matchId&message=$worked");
                }else
                    {
                        header("Location: ../public/AddResults.php?message=$inputError");
                    }
            }else
                {
                    header("Location: ../public/AddResults.php?message=$inputError");
                }
        }else
            {
                header("Location: ../public/AddResults.php?message=$inputError");
            }
    }else
        {
            header("Location: ../public/AddResults.php?message=$empty");
        }
}