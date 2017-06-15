<?php
require(realpath(__DIR__) . '/templates/header.php');
session_start();
$connect = mysqli_connect("localhost", "root", "", "project_fifa");
$query ="SELECT * FROM tbl_matches ORDER BY id";
$result = mysqli_query($connect, $query);
$querytwo ="SELECT * FROM tbl_teams ORDER BY id";
$resulttwo = mysqli_query($connect, $querytwo);
$querythree ="SELECT * FROM tbl_players ORDER BY id";
$resultthree = mysqli_query($connect, $querythree);
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
                    <!--                    Create View Matches-->
                    <li><a href="#">Wedstrijden bekijken</a></li>
                    <!--                    Create View Poules-->
                    <li><a href="#">Poules bekijken</a></li>

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
        <div class="exportcontent">
            <h1 align="center">Export Matches, Teams & Players</h1>
            <p>This page is used to created .csv files. These files are used to transfer data to the standalone Csharp application associated with this website. When you press one of the buttons below, the corresponding file will be downloaded to your device.</p>
            <form method="post" action="../app/export.php" align="center">
                <h2 align="center">Matches</h2>
                <input type="submit" name="exportmatches" value="CSV Export Matches" class="btn" />
            </form>

            <div class="table" id="matches">
                <table class="table table-bordered">
                    <tr>
                        <th width="15%">ID</th>
                        <th width="15%">Team 1</th>
                        <th width="15%">Team 2</th>
                        <th width="25%">Score Team 1</th>
                        <th width="25%">Score Team 2</th>
                        <th width="35%">Start Time</th>
                    </tr>
                    <?php
                    while($row = mysqli_fetch_array($result))
                    {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["team_id_a"]; ?></td>
                            <td><?php echo $row["team_id_b"]; ?></td>
                            <td><?php
                                if($row["score_team_a"] != NULL)
                                {
                                    echo $row["score_team_a"];
                                }
                                else
                                {
                                    echo "To Be Added";
                                }
                                 ?></td>
                            <td><?php
                                if($row["score_team_b"] != NULL)
                                {
                                    echo $row["score_team_b"];
                                }
                                else
                                {
                                    echo 'To Be Added';
                                }
                                 ?></td>
                            <td><?php echo $row["start_time"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <form method="post" action="../app/export.php" align="center">
                <h2 align="center">Teams</h2>
                <input type="submit" name="exportteams" value="CSV Export Teams" class="btn" />
            </form>
            <div class="table" id="teams">
                <table class="table table-bordered">
                    <tr>
                        <th width="15%">ID</th>
                        <th width="15%">Poule ID</th>
                        <th width="30%">Name</th>
                        <th width="35%">Created at</th>
                        <th width="35%">Deleted at</th>
                    </tr>
                    <?php
                    while($rowtwo = mysqli_fetch_array($resulttwo))
                    {
                        ?>
                        <tr>
                            <td><?php echo $rowtwo["id"]; ?></td>
                            <td><?php echo $rowtwo["poule_id"]; ?></td>
                            <td><?php echo $rowtwo["name"]; ?></td>
                            <td><?php echo $rowtwo["created_at"]; ?></td>
                            <td><?php
                                if($rowtwo["deleted_at"] != NULL)
                                {
                                    echo $rowtwo["deleted_at"];
                                }
                                else
                                {
                                    echo 'Not Deleted';
                                }
                                ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <form method="post" action="../app/export.php" align="center">
                <h2 align="center">Players</h2>
                <input type="submit" name="exportplayers" value="CSV Export Players" class="btn" />
            </form>
            <div class="table" id="players">
                <table class="table table-bordered">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="5%">Student ID</th>
                        <th width="5%">Team ID</th>
                        <th width="5%">Poule ID</th>
                        <th width="5%">First Name</th>
                        <th width="5%">Last Name</th>
                        <th width="10%">Created at</th>
                        <th width="10%">Deleted at</th>
                    </tr>
                    <?php
                    while($rowthree = mysqli_fetch_array($resultthree))
                    {
                        ?>
                        <tr>
                            <td><?php echo $rowthree["id"]; ?></td>
                            <td><?php echo $rowthree["student_id"]; ?></td>
                            <td><?php echo $rowthree["team_id"]; ?></td>
                            <td><?php echo $rowthree["poule_id"]; ?></td>
                            <td><?php echo $rowthree["first_name"]; ?></td>
                            <td><?php echo $rowthree["last_name"]; ?></td>
                            <td><?php echo $rowthree["created_at"]; ?></td>
                            <td><?php
                                if($rowthree["deleted_at"] != NULL)
                                {
                                    echo $rowthree["deleted_at"];
                                }
                                else
                                {
                                    echo 'Not Deleted';
                                }
                                ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php');
