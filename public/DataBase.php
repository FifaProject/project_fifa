<?php
$database = new PDO('mysql:host=localhost;dbname=website', 'root', '');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);