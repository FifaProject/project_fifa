<?php require 'templates/header.php';
require_once ("../app/database.php");
session_start();
?>

<div class="container">
    <div class="head">
        <div class="title">
            <a href="index.php">
                <img src="assets/img/logo2.png" alt="">
            </a>
        </div>
        <div class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="viewteams.php">Teams bekijken</a></li>
                <li><a href="viewmatches.php">Wedstrijden bekijken</a></li>
                <?php
                if (isset($_SESSION['username']))
                {
                    ?>

                    <li><a href="addteams.php">Team toevoegen</a></li>
                    <li><a href="addpoule.php">Poule toevoegen</a></li>
                    <li><a href="addresults.php">Resultaten toevoegen</a></li>
                    <li><a href="register.php">Gebruiker toevoegen</a></li>
                    <li><a href="exportview.php">Export</a></li>

                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
        if(isset($_SESSION['username']))
        {
            ?>
            <div class="userbar">
                <ul>
                    <li><h3><?php echo $_SESSION['username'] ?></h3></li>
                    <li><a href="../app/login.php">Logout</a></li>
                </ul>
            </div>
            <?php
        }
        ?>
    </div>
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
</div>


