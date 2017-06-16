<?php
require '../app/database.php';

$pouleid = $_GET['poule_id'];

$sqlteamid = "SELECT id FROM tbl_teams WHERE poule_id = '$pouleid'";

$stmt = $database->query($sqlteamid);
$stmt->execute();
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($teams as $team) {
    $id = $team['id'];
    $sqlcheckida = "SELECT team_id_a FROM tbl_matches WHERE team_id_a =  '$id'";
    $sqlcheckidb = "SELECT team_id_b FROM tbl_matches WHERE team_id_b = '$id'";
    for($i = 0; $i < 1; $i++) {
        if($i = 0) {
            $stmt = $database->query($sqlcheckida);
            $stmt->execute();
            if($stmt->rowCount() == 0) {
                foreach ($teams as $team2) {
                    if($team['id'] != $team2['id']) {
                        for($i = 0; $i < 1; $i++) {
                            if ($i = 0) {
                                $stmt = $database->query($sqlcheckida);
                                $stmt->execute();
                            } else {
                                $stmt = $database->query($sqlcheckidb);
                                $stmt->execute();
                            }
                            if($stmt->rowCount() == 0) {
                                $id2 = $team2['id'];
                                //insert
                                $sqlmake = "INSERT INTO `tbl_matches` (`id`, `team_id_a`, `team_id_b`, `score_team_a`, `score_team_b`, `start_time`) VALUES (NULL, '$id', '$id2', '0', '0', CURRENT_TIMESTAMP )";
                                $stmt = $database->query($sqlmake);
                                $stmt->execute();
                            }
                        }
                    }
                }
            }
            break;
        }
        else {
            $stmt = $database->query($sqlcheckidb);
            $stmt->execute();
            if($stmt->rowCount() == 0) {
                foreach ($teams as $team2) {
                    if($team['id'] != $team2['id']) {
                        for($i = 0; $i < 1; $i++) {
                            if ($i = 0) {
                                $stmt = $database->query($sqlcheckida);
                                $stmt->execute();
                            } else {
                                $stmt = $database->query($sqlcheckidb);
                                $stmt->execute();
                            }
                            if($stmt->rowCount() == 0) {
                                $id2 = $team2['id'];
                                //insert
                                $sqlmake = "INSERT INTO `tbl_matches` (`id`, `team_id_a`, `team_id_b`, `score_team_a`, `score_team_b`, `start_time`) VALUES (NULL, '$id', '$id2', '0', '0', CURRENT_TIMESTAMP )";
                                $stmt = $database->query($sqlmake);
                                $stmt->execute();
                            }
                        }
                    }
                    break;
                }
            }
        }
    }
    header("Location: viewteams.php");
}