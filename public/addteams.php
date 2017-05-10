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
                        <label for="poulenumber"> Poulenumber: </label><input type="number">
                    </div>
                </div>
                <div class="playercard">
                    <h2>Speler 1</h2>
                    <label for="speler1_id">Studentnummer : </label><input type="text" id="speler1_id">
                    <label for="speler1_fname">Voornaam : </label><input type="text" id="speler1_fname">
                    <label for="speler1_lname">Achternaam : </label><input type="text" id="speler1_lname">
                </div>
                <div class="playercard">
                    <h2>Speler 2</h2>
                    <label for="speler2_id">Studentnummer : </label><input type="text" id="speler2_id">
                    <label for="speler2_fname">Voornaam : </label><input type="text" id="speler2_fname">
                    <label for="speler2_lname">Achternaam : </label><input type="text" id="speler2_lname">
                </div>
                <div class="playercard">
                    <h2>Speler 3</h2>
                    <label for="speler3_id">Studentnummer : </label><input type="text" id="speler3_id">
                    <label for="speler3_fname">Voornaam : </label><input type="text" id="speler3_fname">
                    <label for="speler3_lname">Achternaam : </label><input type="text" id="speler3_lname">
                </div>
                <div class="playercard">
                    <h2>Speler 4</h2>
                    <label for="speler4_id">Studentnummer : </label><input type="text" id="speler4_id">
                    <label for="speler4_fname">Voornaam : </label><input type="text" id="speler4_fname">
                    <label for="speler4_lname">Achternaam : </label><input type="text" id="speler4_lname">
                </div>
                <div class="playercard">
                    <h2>Speler 5</h2>
                    <label for="speler5_id">Studentnummer : </label><input type="text" id="speler5_id">
                    <label for="speler5_fname">Voornaam : </label><input type="text" id="speler5_fname">
                    <label for="speler5_lname">Achternaam : </label><input type="text" id="speler5_lname">
                </div>
                <div class="playercard">
                    <h2>Speler 6</h2>
                    <label for="speler6_id">Studentnummer : </label><input type="text" id="speler6_id">
                    <label for="speler6_fname">Voornaam : </label><input type="text" id="speler6_fname">
                    <label for="speler6_lname">Achternaam : </label><input type="text" id="speler6_lname">
                </div>
                <input id="sendteams" type="submit" value="Registreer">
            </form>
        </div>
    </div>
</div>

<?php require (realpath(__DIR__) . '/templates/footer.php'); ?>
