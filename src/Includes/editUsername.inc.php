<?php

if(isset($_POST['submit'])){
    $item1 = $_POST['oldUsername'];
    $item2 = $_POST['newUsername'];
    

    require_once 'dbhinc.php';
    require_once 'functions.inc.php';
    
    if(empInput($item1, $item2) != false){
        header("location: ../UpdateUsername.php?error=emptyinput");
        exit();
    }
    updateUser($conn, $item1, $item2);
}   
else {
    header("location: ../UpdateUsername.php");
}