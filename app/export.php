<?php

if(isset($_POST["exportmatches"]))
{
    $connect = mysqli_connect("localhost", "root", "", "project_fifa");
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=matches.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'Team 1', 'Team 2', 'Score Team 1', 'Score Team 2', 'Start Time'));
    $query = "SELECT * from tbl_matches ORDER BY id";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}
elseif(isset($_POST["exportteams"]))
{
    $connect = mysqli_connect("localhost", "root", "", "project_fifa");
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=teams.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'Poule ID', 'Name', 'Created at', 'Deleted at'));
    $query = "SELECT * from tbl_teams ORDER BY id";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}
elseif(isset($_POST["exportplayers"]))
{
    $connect = mysqli_connect("localhost", "root", "", "project_fifa");
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=players.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'Student ID', 'Team ID', 'Poule ID', 'First Name', 'Last Name', 'Created at', 'Deleted at'));
    $query = "SELECT * from tbl_players ORDER BY id";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}

?>