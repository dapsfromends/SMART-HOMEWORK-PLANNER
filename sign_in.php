<?php

session_start();


include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM planner WHERE username = ?";

  
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

 
    $result = $stmt->get_result();

 
    if ($result->num_rows > 0) {
      
        $row = $result->fetch_assoc();
      
        if (password_verify($password, $row['password'])) {
           
            $_SESSION['username'] = $username;
            
            header("Location: profile1.html");
            exit;
        } else {
            echo "Error: Wrong password.";
        }
    } else {
        echo "Error: User not found.";
    }

    $stmt->close();
}


$conn->close();
?>
