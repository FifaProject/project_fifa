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
            <form action="teamhandler.php" method="post">
                <div class="addteams-leftcol">
                    <div class="leftcol-team">
                        <label  for="team">Teamnaam: </label><input type="text" id="team" name="team" required>
                        <label for="poulenummer"> Poulenumber: </label><input type="number" id="poulenumber" name="poulenumber" required>
                    </div>
                </div>
                <div class="playercards-toprow">
                    <div class="playercard">
                        <h2>Speler 1</h2>
                        <label for="speler1_id">Studentnummer : </label><input type="text" id="speler1_id" name="speler1_id">
                        <label for="speler1_fname">Voornaam : </label><input type="text" id="speler1_fname" name="speler1_fname">
                        <label for="speler1_lname">Achternaam : </label><input type="text" id="speler1_lname" name="speler1_lname">
                    </div>
                    <div class="playercard">
                        <h2>Speler 2</h2>
                        <label for="speler2_id">Studentnummer : </label><input type="text" id="speler2_id" name="speler2_id">
                        <label for="speler2_fname">Voornaam : </label><input type="text" id="speler2_fname" name="speler2_fname">
                        <label for="speler2_lname">Achternaam : </label><input type="text" id="speler2_lname" name="speler2_lname">
                    </div>
                    <div class="playercard">
                        <h2>Speler 3</h2>
                        <label for="speler3_id">Studentnummer : </label><input type="text" id="speler3_id" name="speler3_id">
                        <label for="speler3_fname">Voornaam : </label><input type="text" id="speler3_fname" name="speler4_fname">
                        <label for="speler3_lname">Achternaam : </label><input type="text" id="speler3_lname" name="speler3_lname">
                    </div>
                    <div class="playercard">
                        <h2>Speler 4</h2>
                        <label for="speler4_id">Studentnummer : </label><input type="text" id="speler4_id" name="speler4_id">
                        <label for="speler4_fname">Voornaam : </label><input type="text" id="speler4_fname" name="speler4_fname">
                        <label for="speler4_lname">Achternaam : </label><input type="text" id="speler4_lname" name="speler4_lname">
                    </div>
                </div>
                <div class="playercards-bottomrow">
                    <div class="playercard">
                        <h2>Speler 5</h2>
                        <label for="speler5_id">Studentnummer : </label><input type="text" id="speler5_id" name="speler5_id">
                        <label for="speler5_fname">Voornaam : </label><input type="text" id="speler5_fname" name="speler5_fname">
                        <label for="speler5_lname">Achternaam : </label><input type="text" id="speler5_lname" name="speler5_lname">
                    </div>
                    <div class="playercard">
                        <h2>Speler 6</h2>
                        <label for="speler6_id">Studentnummer : </label><input type="text" id="speler6_id" name="speler6_id">
                        <label for="speler6_fname">Voornaam : </label><input type="text" id="speler6_fname" name="speler6_fname">
                        <label for="speler6_lname">Achternaam : </label><input type="text" id="speler6_lname" name="speler6_lname">
                    </div>
                    <div class="playercard">
                        <h2>Speler 7</h2>
                        <label for="speler7_id">Studentnummer : </label><input type="text" id="speler7_id" name="speler7_id">
                        <label for="speler7_fname">Voornaam : </label><input type="text" id="speler7_fname" name="speler7_fname">
                        <label for="speler7_lname">Achternaam : </label><input type="text" id="speler7_lname" name="speler7_lname">
                    </div>
                    <div class="playercard">
                        <h2>Speler 8</h2>
                        <label for="speler8_id">Studentnummer : </label><input type="text" id="speler8_id" name="speler8_id">
                        <label for="speler8_fname">Voornaam : </label><input type="text" id="speler8_fname" name="speler8_fname">
                        <label for="speler8_lname">Achternaam : </label><input type="text" id="speler8_lname" name="speler8_lname">
                    </div>
                </div>
                <input id="sendteams" type="submit" value="Registreer">
            </form>
        </div>
    </div>
</div>

<?php require (realpath(__DIR__) . '/templates/footer.php'); ?>
