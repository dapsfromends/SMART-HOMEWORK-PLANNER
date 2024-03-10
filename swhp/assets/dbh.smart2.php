<?php


$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "SmartHP";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);
if (!$conn) {
    die("Error in Connecting to Database". mysqli_connect_error());
}