<?php require (realpath(__DIR__) . '/templates/header.php'); ?>

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
            <li><a href="#">Gebruikers toevoegen</a></li>
            <li><a href="addteams.php">Teams toevoegen</a></li>
        </ul>
    </div>

    <div class="addteams">
        <div class="container">
            <form action="index.php" method="post">
                <div class="addteams-leftcol">
                    <div class="leftcol-team">
                        <label  for="team">Teamnummer: </label><input type="text" id="team">
                    </div>
                </div>
                <div class="addteams-rightcol">
                    <label for="speler">Speler 1 : </label><input type="text" id="speler">
                    <label for="speler">Speler 2 : </label><input type="text" id="speler">
                    <label for="speler">Speler 3 : </label><input type="text" id="speler">
                    <label for="speler">Speler 4 : </label><input type="text" id="speler">
                    <label for="speler">Speler 5 : </label><input type="text" id="speler">
                    <label for="speler">Speler 6 : </label><input type="text" id="speler">
                </div>
                <input id="sendteams" type="submit" value="Registreer">
            </form>
        </div>
    </div>
</div>

<?php require (realpath(__DIR__) . '/templates/footer.php'); ?>
