<?php require(realpath(__DIR__) . '/templates/header.php');
session_start();

?>

    <div class="wrapper">
        <div class="banner">
            <div class="container">
                <img src="assets/img/banner-logo2.png">
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
