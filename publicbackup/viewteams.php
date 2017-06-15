<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teams bekijken</title>
</head>
<body>

</body>
</html>
<?php
    include("DataBase.php");
    require(realpath(__DIR__) . '/templates/header.php');
?>

<div class="pagetitle">
    <div class="container">
        <img src="assets/img/logo2.png" alt="">
    </div>
</div>
<div class="navbar">
    <ul>
        <li><a href="index.php">Homepagina</a></li>
        <li><a href="viewteams.php">Teams bekijken</a></li>
        <li><a href="register.php">Gebruikers toevoegen</a></li>
        <li><a href="addteams.php">Teams toevoegen</a></li>
        <li><a href="AddResults.php">Resultaten invoegen</a></li>
    </ul>
</div>

<?php

    $sql = "SELECT * FROM tbl_players INNER JOIN tbl_teams ON tbl_players.team_id = tbl_teams.id";
$stmt = $database->query($sql);
$stmt->execute();

echo "<div class='players'>";
while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<p>" . $rows["first_name"]  . " " . $rows['last_name'] . "</p>";
    echo"</div>";



    echo '<ul class="list-group">';
    echo '<li class="list-group-item">' . "Team: " . $rows['name'] . '</li>';
    echo '</ul>';

}
?>

