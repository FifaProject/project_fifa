<?php require(realpath(__DIR__) . '/templates/header.php');
require '../app/database.php';
session_start(); ?>

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
    <div class="content">
        <?php

        $sql = "SELECT * FROM tbl_players INNER JOIN tbl_teams ON tbl_players.team_id = tbl_teams.id";
        $stmt = $database->query($sql);
        $stmt->execute();
        ?>
        <div class="view">
            <table>
                <tr>
                    <th>Team</th>
                    <th>Last name</th>
                    <th>First name</th>
                </tr>
            <?php
            while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo $rows['first_name'] ?></td>
                    <td><?php echo $rows['last_name'] ?></td>
                </tr>
                <?php
            }
            ?>
            </table>
        </div>
    </div>
</div>

<?php require(realpath(__DIR__) . '/templates/footer.php');