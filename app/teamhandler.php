<?php
require('database.php');

//zet alle huidigen student'id in a array en zorg dat er geen duplicates zijn voordat alles in de database wordt gestuurd

$teamname = $_POST['team'];
$pouleid = $_POST['poulenumber'];

$filledinplayers = 0;

if($teamname != "" && $pouleid != "") {
    $sql = "SELECT id, poule_id, name FROM `tbl_teams` WHERE name = '$teamname' AND poule_id = '$pouleid'";
    for ($i = 1; 7 > $i; $i++) {
        for ($x = 1; 7 > $x; $x++) {
            echo $x;
            if ($_POST['speler' . $x . '_id'] != "" && $i != $x) {
                $player1 = $_POST['speler' . $x . '_id'];
                $player2 = $_POST['speler' . $i . '_id'];
                echo "$x";
                if ($player1 == $player2) {
                    header("Location: ../public/addteams.php?Error=There are 2 people with that id");
                }
            }
        }
    }
    if($database->query($sql)->rowCount() == 0) {
        //check duplicates in fields
        for($i = 1; $i < 8; $i++) {
            //check eerste 4
            if($i < 4) {
                if($_POST['speler' . $i . '_id'] != "" && $_POST['speler' . $i . '_fname'] != "" && $_POST['speler' . $i . '_lname'] != "") {
                    $filledinplayers++;
                    $playerid = $_POST['speler' . $i . '_id'];
                    $playerfname = $_POST['speler' . $i . '_fname'];
                    $playerlname = $_POST['speler' . $i . '_lname'];
                    $sql = "SELECT student_id from tbl_players where student_id = '$playerid'";
                    if($database->query($sql)->rowCount() != 0) {
                        header("Location: ../public/addteams.php?Error=There is already a user with the student_id " . $playerid);
                        //cancel making team
                    }
                } else {
                    header("Location: ../public/addteams.php?Error=ERROR! in the first 4 players there seem to be some empty fields");
                    //cancel making team
                }
            }
            //voor de andere speler velden
            else if($_POST['speler' . $i . '_id'] != "" && $_POST['speler' . $i . '_fname'] != "" && $_POST['speler' . $i . '_lname'] != "") {
                $filledinplayers++;
                $playerid = $_POST['speler' . $i . '_id'];
                $playerfname = $_POST['speler' . $i . '_fname'];
                $playerlname = $_POST['speler' . $i . '_lname'];
                $sql = "SELECT student_id from tbl_players where student_id = '$playerid'";
                if($database->query($sql)->rowCount() != 0) {
                    header("Location: ../public/addteams.php?Error=There is already a user with the student_id " . $playerid);
                    //cancel making team
                }
            } else {
                break;
            }
        }
        if($filledinplayers < 4) {
            header("Location: ../public/addteams.php?Error=You need atleast 4 teammembers " . $filledinplayers);
        } else {
            $sql = "INSERT INTO `tbl_teams` (`id`, `poule_id`, `name`, `created_at`, `deleted_at`) VALUES (NULL, '$pouleid', '$teamname', CURRENT_TIMESTAMP, NULL);";
            $database->query($sql);
            $sql = "SELECT id FROM `tbl_teams` WHERE name = '$teamname' AND poule_id = '$pouleid'";
            $query = $database->prepare($sql);
            $query->execute();
            $teamid = $query->fetch(PDO::FETCH_COLUMN);
            for($i = 1; $i < ($filledinplayers + 1); $i++) {
                $playerid = $_POST['speler' . $i . '_id'];
                $playerfname = $_POST['speler' . $i . '_fname'];
                $playerlname = $_POST['speler' . $i . '_lname'];
                $sql = "INSERT INTO `tbl_players` (`id`, `student_id`, `team_id`, `poule_id`, `first_name`, `last_name`, `created_at`, `deleted_at`) VALUES (NULL, '$playerid', '$teamid', '0', '$playerfname', '$playerlname', CURRENT_TIMESTAMP, NULL)";
                $database->query($sql);
            }
            header("Location: ../public/addteams.php?Error=Team has been created!" . $filledinplayers);
            //stop looking for more filled in players
        }

    } else {
        header("Location: ../public/addteams.php?Error=er bestaat all een team met die naam in de gekozen poule");
        //cancel making team
    }}
    else {
    header("Location: ../public/addteams.php?Error=je hebt of teams of poule id  niet ingevuld");
    //cancel making team
}