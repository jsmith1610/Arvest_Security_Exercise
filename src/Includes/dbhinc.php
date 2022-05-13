<?php

$server = "localhost";
$dbUsername = "zachapma";
$dbPassword = "Eeja3dae";
$dbName = "zachapma";

$conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}