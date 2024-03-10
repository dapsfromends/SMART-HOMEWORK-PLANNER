<?php

function emptyInputsignup($name, $email, $username,$password) {
    
    if (empty($username) || empty($name) || empty($email) || empty($password)) {
$result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invaliduid ($usersname) {
    
    if (!preg_match("/^[a-zA-Z0-9]*$", $usersname)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
    }
function invalidEmail ($email) {
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
        }
function passwordMatch ($password, $repeat_password) {
    
            if ($password !== $repeat_password) {
                $result = true;
            }
            else {
                $result = false;
            }
            return $result;
            }
function uidExists ($conn, $email, $usersname) {
     $sql = "select * from users where useruid = ? OR userEmail = ?; ";
     $stmt = mysqli_stmt_init($conn);
     if (mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error= usersnameTaken");
            die();
 }
 
 mysqli_stmt_bind_param($stmt,"rt", $usersname, $email);
 mysqli_stmt_execute($stmt);
 }
 $resultdata = mysqli_stmt_get_result();
if (mysqli_fetch_assoc($resultData)){

}
else{
    $result = false;
    return $result;
}