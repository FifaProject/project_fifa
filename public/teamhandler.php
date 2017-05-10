<?php
require('DataBase.php');

$teamname = $_POST['team'];
$pouleid = $_POST['poulenumber'];



echo $teamname;
echo $pouleid;

$sql = "SELECT id, poule_id, name FROM `tbl_teams` WHERE name = '$teamname' AND poule_id = '$pouleid'";

if($database->query($sql)->rowCount() == 0) {
    for($i = 0; $i < 6; $i++) {
        
    }
} else {
    echo "er bestaat all een team met die naam in de gekozen poule";
}