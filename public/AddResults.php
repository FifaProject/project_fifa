<?php require(realpath(__DIR__) . '/templates/header.php'); ?>

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
    <div class="addresults">
        <div class="container">
            <form action="resultshandler" method="post">
                <div class="toprow">
                    <label for="poulid"> Poul ID: </label><input type="number" id="poulid" name="poulid">
                </div>
                <div class="middlerow">
                    <div class="playercard">
                        <label for="teamonename">Name Team one:</label><input type="text" id="teamonename" name="teamonename">
                        <label for="teamonescore">Score Team one:</label><input type="text" id="teamonescore" name="teamonescore">
                    </div>
                    <div class="playercard">
                        <label for="teamtwoname">Name Team two:</label><input type="text" id="teamtwoname" name="teamtwoname">
                        <label for="teamtwoscore">Score Team two:</label><input type="text" id="teamtwwoscore" name="teamtwoscore">
                    </div>
                </div>
                <input type="submit" value="submit">
            </form>
        </div>
    </div>
</div>

<?php require(realpath(__DIR__) . '/templates/footer.php'); ?>
