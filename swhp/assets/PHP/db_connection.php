<?php
$servername = "localhost:8889";
$username = "why";
$password = "mg455900";
$dbname = "restructure1";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
