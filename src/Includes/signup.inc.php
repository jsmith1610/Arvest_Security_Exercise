<?php
    if(isset($_POST['submit'])){
        $name = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_repeat = $_POST["password_repeat"];
        
        require_once 'dbhinc.php';
        require_once 'functions.inc.php';

        if(empInputSignUp($name, $email, $password, $password_repeat) != false){
            header("location: ../signupPage.php?error=emptyinput");
            exit();
        }

        if(invalidUsername($name) != false){
            header("location: ../signupPage.php?error=invalidusername");
            exit();
        }
        if(lengthCheck($password) != false){
            header("location: ../signupPage.php?error=invalidLength");
            exit();
        }
        if(invalidEmail($email) != false){
            header("location: ../signupPage.php?error=invalidemail");
            exit();
        }

        if(passwordMatch($password, $password_repeat) != false){
            header("location: ../signupPage.php?error=passwordsdontmatch");
            exit();
        }

        if(uidExists($conn, $name, $email) != false){
            header("location: ../signupPage.php?error=usernametaken");
            exit();
        }

        createUser($conn, $name, $password, $email);

    }
    else {
        header("location: ../signupPage.php");
    }
?>    