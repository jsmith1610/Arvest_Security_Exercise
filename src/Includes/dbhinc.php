<?php

$server = "localhost";
$dbUsername = "zachapma";
$dbPassword = " ";
$dbName = "zachapma";

$conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}