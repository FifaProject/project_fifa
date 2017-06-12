
<?php require 'templates/header.php';

?>


<div class="wrapper">
    <div class="pagetitle">
        <div class="container">
            <img src="assets/img/logo2.png" alt="">
        </div>
    </div>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Homepagina</a></li>
            <li><a href="#">Teams bekijken</a></li>
            <li><a href="register.php">Gebruikers toevoegen</a></li>
            <li><a href="addteams.php">Teams toevoegen</a></li>
            <li><a href="AddResults.php">Resultaten invoegen</a></li>
        </ul>
    </div>
</div>


<div class="wrapper">
    <div class="">
        <form action="../app/fifa_register/back-end/register-handler.php" method="post">

             <div class="item">
                 <label id="naam" for="username"><h3>Gebru. naam:</label></h3>
                 <div class="box">
                <input type="text" name="username" id="username">
                 </div>
             </div>
             <div class="item">
                 <label id="naam" for="password"><h3>Wachtwoord:</label></h3>
                 <div class="box">
                <input type="password" name="password" id="password">
                 </div>
             </div>
            <div class="item">
                <label id="naam" for="password-confirm"><h3>Wachtwoord bevestigen:</label></h3>
                <div class="box">
                    <input type="password" name="password-confirm" id="password-confirm">
                </div>
            </div>

             <div class="item">
                <input type="submit" name="send" value="versturen">
             </div>
            <div class="message">
                <?php
                if(isset($_GET['message']))
                {
                    echo '<p>' . $_GET['message'] . '<p>';
                }
                ?>
        </form>

        </div>
    </div>

</div>


<?php require(realpath(__DIR__) . '/templates/footer.php');

?>


