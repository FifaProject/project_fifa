<?php require(realpath(__DIR__) . '/templates/header.php');
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
        <div class="logincontent">
            <img src="assets/img/banner-logo2.png" alt="">
            <div class="loginscreen">
                    <form action="../app/login.php" method="post">
                        <input type="text" id="username" placeholder="Gebruikersnaam*" name="username" autocomplete="off" required>
                        <input type="password" id="password" placeholder="Wachtwoord*" name="password" autocomplete="off" required>
                        <input class="loginbutton" type="submit" value="Login">
                    </form>
            </div>
            <?php
            if(isset($_GET['message']))
            {
                ?>
                <div class="message">
                    <p><?php echo $_GET['message'] ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php');
