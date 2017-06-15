
<?php
require_once ("database.php");
$empty = "Er zijn velden leeg gelaten";
$team = "Team:";
$inputError = "Foutieve invoer wordt niet geaccepteerd. Probeer het opnieuw.";
$nothingFound = "Poule niet gevonden. Probeer het opnieuw";
$succes = "Poule gevonden!";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $pouleid = $_GET['pouleid'];

    if (!empty($pouleid)) {
        if (preg_match('/^[0-9]*$/', $pouleid)) {
            if ($pouleid >= 1 && $pouleid <= 100) {
                $stmt = $database->prepare(("SELECT * FROM `tbl_teams` WHERE `poule_id` = :pouleid"));
                $stmt->execute(array("pouleid" => $pouleid));

                $result = $stmt->rowCount();
                if ($result > 0) {
                    header("Location: ../public/addpoule.php?succes=$succes&pouleid=$pouleid");
                } else {
                    header("Location: ../public/addpoule.php?message=$nothingFound");
                }
            } else {
                header("Location: ../public/addpoule.php?message=$inputError");
            }
        } else {
            header("Location: ../public/addpoule.php?message=$inputError");
        }
    } else {
        header("Location: ../public/addpoule.php?message=$empty");
    }
}