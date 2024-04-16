<?php
include_once 'db_connection.php';


$name= $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO planning ( name, email, subject, message )
        VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Message Submitted!!!'); window.location.href = 'contact.html';</script>";
} 

else 
{
    echo "<script>alert('Error: Please retry'); window.location.href = 'contact.html';</script>";   
}

$conn->close();
?>
