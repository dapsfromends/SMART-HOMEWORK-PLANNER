<?php


// Start session
session_start();


// Include the database connection file
include_once 'db_connection.php';



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check if the username and password exist in the database
    $sql = "SELECT * FROM planner WHERE username = '$username' AND password = '$password'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0)
    {
        // Authentication successful
        // Store username in session for future use
        $_SESSION['username'] = $username;
        header("Location: profile1.html");
        exit;    
        
    }
    else
    {
        echo "Error: wrong details";    
    }
}

// Close the database connection
$conn->close();
