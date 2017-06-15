<?php
$database = new PDO('mysql:host=localhost;dbname=project_fifa', 'root', '');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);