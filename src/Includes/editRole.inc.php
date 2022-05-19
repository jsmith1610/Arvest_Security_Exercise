<?php

if(isset($_POST['submit'])){
    $item1 = $_POST['username'];
    $item2 = $_POST['role'];
    

    require_once 'dbhinc.php';
    require_once 'functions.inc.php'; #has all the functions for the login and updating users

    #checks the box for an empty input
    if(empInput($item1, $item2) != false){
        header("location: ../updateRole.php?error=emptyinput");
        exit();
    }
    updateRole($conn, $item1, $item2);
}   
else {
    header("location: ../updateRole.php");
}