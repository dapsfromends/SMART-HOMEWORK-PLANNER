
<?php
include("db_connection.php");




if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirmpassword"])) {
    echo "Username, email, password, and confirm password fields are required.";
} else {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    

    
    if ($username === $email) {
        echo "Username must not be the same as the email.";
    }
    
    elseif (strlen($username) < 8) {
        echo "Username must be 8 characters or more.";
    }
    
    elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
        echo "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit and no special character.";
    }
    
    elseif ($password !== $confirmpassword) {
        echo "Passwords do not match.";
    } else {
        
        $stmt = $conn->prepare("SELECT * FROM planner WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Username or email already exists. Please choose another.";
        } else {
           
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            
            $insertStmt = $conn->prepare("INSERT INTO planner (username, email, password) VALUES (?, ?, ?)");
            $insertStmt->bind_param("sss", $username, $email, $hashedPassword);
            if ($insertStmt->execute()) {
                echo "Registration successful. You can now login.";
            } else {
                echo "An error occurred during registration. Please try again later.";
            }
            $insertStmt->close();
        }
        $stmt->close();
    }
}

// Closing the database connection
$conn->close();