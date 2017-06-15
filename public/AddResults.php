<?php require(realpath(__DIR__) . '/templates/header.php');
session_start();
if(!isset($_SESSION['username']))
{
    header('Location: index.php');
}?>

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

    <div class="addresults">
        <div class="container">
            <form action="../app/resultshandler.php" method="get">
                <div class="toprow">
                    <?php
                    if (isset($_POST['matchid']))
                    {
                        ?>
                        <label for="matchid"> wedstrijd ID: </label><input type="number" id="matchid" name="matchid" value="<?php echo $_POST['matchid'] ?>" required>
                        <?php
                    }
                    else if (isset($_GET['matchid']))
                    {
                        ?>
                        <label for="matchid"> wedstrijd ID: </label><input type="number" id="matchid" name="matchid" value="<?php echo $_GET['matchid'] ?>" required>
                        <?php
                    }
                    else
                    {
                        ?>
                        <label for="matchid"> wedstrijd ID: </label><input type="number" id="matchid" name="matchid" required>
                        <?php
                    }
                    ?>
                    <input type="submit" value="refresh">
                </div>


            </form>

        </div>
    </div>
    <div class="messages">
        <?php
        require_once ("../app/database.php");
        $noMatch = "Er is geen wedstrijd gevonden. Probeer het opnieuw";
        $inputError = "Foutieve invoer wordt niet geaccepteerd. Probeer het opnieuw.";

        if (isset($_GET['matchid']))
        {
            if ($_GET['matchid'] <= 1000)
            {
                $matchId = $_GET['matchid'];



                $sql = ("SELECT m.id, score_team_a, score_team_b, t1.name AS team_id_a, t2.name AS team_id_b FROM tbl_matches AS m LEFT JOIN tbl_teams t1 ON m.team_id_a = t1.id LEFT JOIN tbl_teams t2 ON m.team_id_b = t2.id WHERE m.id = '$matchId'");
                $games = $database->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                foreach ($games as $game)
                {
                    echo $game['team_id_a'] . "     " . $game['score_team_a'] . '-'  . $game['score_team_b'] . "     " . $game['team_id_b'];

                }

                $stmt = $database->prepare("SELECT * FROM `tbl_matches` WHERE `id` = :matchid ");
                $stmt->execute(array("matchid" => $matchId));

                $result = $stmt->rowCount();
                if ($result == 1)
                {
                    ?>
                    <form action="../app/resultshandler.php" method="post">

                        <input type="hidden" name="matchid" value=" <?php echo $matchId ?>">


                        <div class="middlerow">

                            <div class="playercard">
                                <label for="teamonescore"><?php echo $game['team_id_a']?></label><input type="number" id="teamonescore" name="teamonescore" required>
                            </div>

                            <div class="playercard">
                                <label for="teamtwoscore"><?php echo $game['team_id_b']?></label><input type="number" id="teamtwoscore" name="teamtwoscore" required>

                            </div>

                        </div>
                        <input type="submit" value="invoeren">

                    </form>

                    <?php

                }else
                {
                    header("AddResults.php?matchid=$matchId&message=$noMatch");
                }
            }else
            {
                header("Location: AddResults.php?matchid=$matchId&message=$inputError");
            }
        }
        if (isset($_GET['message']))
        {
            echo '<p>' . $_GET['message'] . '</p>';
        }
        ?>

    </div>
</div>


<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
