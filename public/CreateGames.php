<?php

$pouleid = $_GET['poule_id'];

$sqlteamid = "SELECT id FROM tbl_teams WHERE poule_id = '$pouleid'";

$stmt = $database->query($sqlteamid);
$stmt->execute();
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($teams as $team) {
    $id = team['id'];
    $sqlcheckida = "SELECT team_id_a, FROM tbl_matches1 WHERE = $id";
    $sqlcheckidb = "SELECT team_id_b FROM tbl_matches1 WHERE = $id";
    $stmt = $database->query($sqlteamid);
    $stmt->execute();
    if() { }
    foreach ($teams as $team2) {

    }

}