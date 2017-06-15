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
    <div class="wrapper">
        <div class="input">
            <form action="../app/registerhandler.php" method="post">

                 <div class="item">
                     <label id="naam" for="username"><h3>Gebru. naam:</label></h3>
                     <div class="box">
                    <input type="text" name="username" id="username" autocomplete="off" required>
                     </div>
                 </div>
                 <div class="item">
                     <label id="naam" for="password"><h3>Wachtwoord:</label></h3>
                     <div class="box">
                    <input type="password" name="password" id="password" autocomplete="off" required>
                     </div>
                 </div>
                <div class="item">
                    <label id="naam" for="password-confirm"><h3>Wachtwoord bevestigen:</label></h3>
                    <div class="box">
                        <input type="password" name="password-confirm" id="password-confirm" autocomplete="off" required>
                    </div>
                </div>

                 <div class="item">
                    <input type="submit" name="send" value="versturen">
                 </div>
            </form>
        </div>
        <div class="message">
            <?php

            if(isset($_GET['message']))
            {
                echo '<p>' . $_GET['message'] . '<p>';
            }
            ?>
        </div>
    </div>
</div>
<?php require(realpath(__DIR__) . '/templates/footer.php');
