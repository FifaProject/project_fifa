<?php require 'templates/header.php';
require_once ("database.php");
session_start();
?>

<div class="wrapper">
    <div class="addpoule">
        <div class="container">
            <form action="../app/matchhandler.php" method="get">
                <div class="toprow">

                    <label  for="pouleid">Poule id:</label><input id="pouleid" type="number" name="pouleid" placeholder="Poule id" required>
                    <input  type="submit" value="refresh">
                    <?php if (isset($_GET['succes']))
                    {
                        echo '<p>' . $_GET['succes'] . '</p>';
                    } ?>

                    <?php
                    if (isset($_GET['pouleid']))
                    {
                        $team = "Team:";
                        $pouleid = $_GET['pouleid'];
                        $sth = $database->prepare("SELECT `name` FROM `tbl_teams` WHERE `poule_id` = '$pouleid'");
                        $sth->execute();
                        /* Fetch all of the remaining rows in the result set */
                        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                        echo "Poule:" . $pouleid;
                        foreach($result as $teams) {

                            echo '<ul>';
                            echo '<div class="teams">';
                            echo '<li>' . $team . " " . $teams['name'] . '</li>';
                            echo '</div>';

                            $test = $teams['name'];
                            $sql = "SELECT `first_name`,`last_name` FROM `tbl_players` WHERE `team_id` = (SELECT `id` FROM `tbl_teams` WHERE `name` = '$test')";
                            $sth = $database->prepare($sql);
                            $sth->execute();
                            $players = $sth->fetchAll(PDO::FETCH_ASSOC);
                            foreach($players as $player) {
                                echo '<div class="players">';
                                echo '<li>' . $player['first_name'] . " " . $player['last_name'] . '</li>';
                                echo '<div>';

                            }
                            echo '</ul>';
                        }
                    }
                    ?>


                    <?php if (isset($_GET['message']))
                    {
                        echo '<p>' . $_GET['message'] . '</p>';
                    } ?>
                </div>
            </form>
        </div>
    </div>
</div>

