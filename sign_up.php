
<?php
include("db_connection.php");




if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirmpassword"])) {
    echo "<script>alert('Username, email, password, and confirm password fields are required.'); window.location.href = 'signup.html';</script>";
} else {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    

    
    if ($username === $email) {
        echo "<script>alert('Username must not be the same as the email.'); window.location.href = 'signup.html';</script>";
    }
    
    elseif (strlen($username) < 8) {
        echo "<script>alert('Username must be 8 characters or more.'); window.location.href = 'signup.html';</script>";
    }
    
    elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
        echo "<script>alert('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit and no special character.'); window.location.href = 'signup.html';</script>";
    }
    
    elseif ($password !== $confirmpassword) {
        echo "<script>alert('Passwords do not match.'); window.location.href = 'signup.html';</script>";
    } else {
        
        $stmt = $conn->prepare("SELECT * FROM planner WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Username or email already exists. Please choose another.'); window.location.href = 'index.html';</script>";
            
        } else {
           
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            
            $insertStmt = $conn->prepare("INSERT INTO planner (username, email, password) VALUES (?, ?, ?)");
            $insertStmt->bind_param("sss", $username, $email, $hashedPassword);
            if ($insertStmt->execute()) {
                echo "<script>alert('Registration successful. You can now login.'); window.location.href = 'signin.html';</script>";
            } else {
                echo "<script>alert('An error occurred during registration. Please try again later.'); window.location.href = 'signup.html';</script>";
            }
            $insertStmt->close();
        }
        $stmt->close();
    }
}

// Closing the database connection
$conn->close();