<?php

$server = "localhost";
$dbUsername = "";
$dbPassword = " ";
$dbName = "";

$conn = mysqli_connect($server, $dbUsername, $dbPassword, $dbName);
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}