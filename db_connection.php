<?php
$servername = "localhost:8889";
$username = "stds";
$password = "mg455900";
$dbname = "smarthomework";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>