<?php
if(isset($_POST['submit'])){
    $name = $_POST['username']; #Username can be in the form of either the email or username of the account signing in
    $password = $_POST['password'];

    # used as the login information for the database connection
    require_once 'dbhinc.php';  
    #These are the various functions used for the authentication and updating of the login pages
    require_once 'functions.inc.php';         
    # When it returns not false then you know that the boxes were filled in and not left blank
    if(empInputLogin($name, $password) != false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $name, $password);
}
else {
    header("location: ../login.php");
}
