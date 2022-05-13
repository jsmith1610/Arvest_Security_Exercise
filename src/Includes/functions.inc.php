<?php
$result = null;
function empInputSignUp($name, $email, $password, $password_repeat){
    if(empty($name) || empty($email) || empty($password) || empty($password_repeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUsername($name){
    if(!preg_match('/^[a-zA-Z0-9]*$/', $name)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function lengthCheck($password){
    $len = strlen($password);
    if($len < 8){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $password_repeat){
    if($password !== $password_repeat) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $name, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR usersEmail = ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signupPage.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row =  mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function uidExistsUpdate($conn, $name){
    if(!filter_var($name, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE username = ?;"; 
    }
    else{
        $sql = "SELECT * FROM users WHERE usersEmail = ?;"; 
    }
        
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signupPage.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row =  mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $password, $email){
    $sql = "INSERT INTO users (username, enc_pass, UsersEmail) VALUES (?, ?, ?);"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signupPage.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $hashedPassword, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signupPage.php?error=none");
    exit();
}

function empInputLogin($name, $password){
    if(empty($name) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function elevatedUserCheck($conn, $name, $email){
    if(!filter_var($name, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE (username = ? AND userRole = 'admin') OR (username = ? AND userRole = 'Manager');"; 
    }
    else{
        $sql = "SELECT * FROM users WHERE usersEmail = ? AND userRole = 'admin' OR usersEmail = ? AND userRole = 'Manager';";  
    }
        
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signupPage.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row =  mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function loginUser($conn, $name, $password){
    $usernameExists = uidExists($conn, $name, $name);
    $statusCheck = elevatedUserCheck($conn, $name, $name);
    
    if($usernameExists == false){
        header("location: ../login.php?error=invalidUsername");
        exit();
    }
    $passwordHashed = $usernameExists["enc_pass"];
    $checkPassword = password_verify($password, $passwordHashed);

    if($checkPassword == false){
        header("location: ../login.php?error=invalidPassword");
        exit();
    }
    else if ($checkPassword == true){
    
        //header("location: ../TestAuthentication/Homepage.php");
        //header("location: ../login.php?error=none");
        if($statusCheck != false){
            header("location: ../login.php?error=elevatedUser");
            exit();
        }
        else if ($statusCheck == false){
            header("location: ../login.php?error=notElevatedUser");
            exit();
        }

    }
    
}

function empInput($name, $oldName){
    if(empty($name) || empty($oldName)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function updateUser($conn, $name, $newUsername){
    $usernameExists = uidExistsUpdate($conn, $newUsername);
    $checkCurrentName = uidExistsUpdate($conn, $name);
    if($checkCurrentName == false){
        header("location: ../UpdateUsername.php?error=usernameIncorrect");
        exit();
    }

    else if($usernameExists == true){
        header("location: ../UpdateUsername.php?error=nameAlreadyExists");
        exit();
    }

    else{
        if(!filter_var($name, FILTER_VALIDATE_EMAIL)) {
            $sql = "UPDATE users SET username = (?) WHERE username = (?);"; 
        }
        else{
            $sql = "UPDATE users SET usersEmail = (?) WHERE usersEmail = (?);";
        }
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UpdateUsername.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $newUsername, $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../UpdateUsername.php?error=none");
    exit();
    }

}

function updateRole($conn, $name, $role){
    $checkCurrentName = uidExistsUpdate($conn, $name);
    if($checkCurrentName == false){
        header("location: ../updateRole.php?error=usernameIncorrect");
        exit();
    }

    if ($role == "Manager" || $role == "Employee"){

        if(!filter_var($name, FILTER_VALIDATE_EMAIL)) {
            $sql = "UPDATE users SET userRole = (?) WHERE username = (?);"; 
        }
        else{
            $sql = "UPDATE users SET userRole = (?) WHERE usersEmail = (?);";
        }
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../updateRole.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $role, $name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../updateRole.php?error=none");
        exit();
    }
    else{
        header("location: ../updateRole.php?error=notValidRole");
            exit();
    }
}
 


