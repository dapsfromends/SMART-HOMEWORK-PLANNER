<?php

if (isset ($_POST["submit"])) {
    header ("location: ../<a href= signup-success.html>");

$Name = $_POST["username"];
$Email = $_POST["email"];
$Password = $_POST["password"];
$password = $_POST["repeat_password"];

require_once"dbh.smart.php";
require_once"functions.smart.php";

if (emptyinputsignup($Name, $email, $username, $password) !== false) {
    header("Location: ../signup.php?error=yourinputisempty");
    die();
}
if (invaliduid($username) !== false) {
    header("Location: ../signup.php?error=invalidusername");
    die();

}
if (invalidEmail($email) !== false) {
    header("Location: ../signup.php?error=invalidemailaddress");
    die();

}
if (passwordMatch($password, $usersname) !== false) {
    header("Location: ../signup.php?error= incorrectpassword");
    die();
}
if (uidExists($conn, $usersname, $email) !== false) {
    header("Location: ../signup.php?error= usernameExist");
    die();
}
createUser($conn, $name, $email, $usersname, $password);
   
}
else {
    header ("location: ../signup2.php");
    die();
}
