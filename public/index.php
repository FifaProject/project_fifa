<?php require(realpath(__DIR__) . '/templates/header.php'); ?>

    <div class="main-content">

        <div class="pagetitle">
            <div class="container">
                <img src="assets/img/logo2.png" alt="">
            </div>
        </div>
        <div class="banner">
            <div class="navbar">
                <ul>
                    <li><a href="index.php">Homepagina</a></li>
                    <li><a href="#">Teams bekijken</a></li>
                    <li><a href="#">Gebruikers toevoegen</a></li>
                    <li><a href="addteams.php">Teams toevoegen</a></li>
                </ul>
            </div>
            <div class="container">
                <img src="assets/img/banner-logo2.png" alt="">
                <div class="loginscreen">
                        <form action="Login.php">
                            <input type="text" id="username" placeholder="Gebruikersnaam*" name="username"required>
                            <input type="password" id="password" placeholder="Wachtwoord*" name="password"required>
                            <input class="loginbutton" type="submit" value="Login">
                        </form>
                </div>
            </div>
        </div>
    </div>
<?php require(realpath(__DIR__) . '/templates/footer.php');
