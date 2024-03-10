<?php
include_once 'db_connection.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO Deadlines (username, email, password) 
        VALUES ('$username','$email','$password')";

if ($conn->query($sql) === TRUE) {
    echo "User registered successfully. ";
} 

else 
{
    echo "Error: Username and/or Email already in use.";    
}

$conn->close();
?>
