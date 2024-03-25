<?php

session_start();


include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM Deadline WHERE username = ?";

  
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

 
    $result = $stmt->get_result();

 
    if ($result->num_rows > 0) {
      
        $row = $result->fetch_assoc();
      
        if (password_verify($password, $row['password'])) {
           
            $_SESSION['username'] = $username;
            
            header("Location: http://localhost:8888/swhp/profile1.php");
            exit;
        } else {
            echo "Error: Wrong password.";
        }
    } else {
        echo "Error: User not found.";
    }

    $stmt->close();
}


$db->close();
?>
