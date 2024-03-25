
<?php
include("db_connection.php");



// Check if all required fields are filled out
if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirmpassword"])) {
    echo "Username, email, password, and confirm password fields are required.";
} else {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

    // Check if username is not the same as email
    if ($username === $email) {
        echo "Username must not be the same as the email.";
    }
    // Check if username has at least 8 characters
    elseif (strlen($username) < 8) {
        echo "Username must be 8 characters or more.";
    }
    // Check if password meets complexity requirements
    elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
        echo "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.";
    }
    // Check if password and confirm password match
    elseif ($password !== $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        // Check if the username or email already exists
        $stmt = $db->prepare("SELECT * FROM Deadline WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Username or email already exists. Please choose another.";
        } else {
            // Hashing the password for security
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Inserting the new user into the database
            $insertStmt = $db->prepare("INSERT INTO Deadline (username, email, password) VALUES (?, ?, ?)");
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
$db->close();
