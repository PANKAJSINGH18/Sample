<?php
session_set_cookie_params(0, '/', '.cherryservers.local');
session_start();
$servername = "localhost";
$username = "php_user";
$password = "stcuriosity";
$dbname = "empire";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])){
    $username = trim($_POST["username"]);
    $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);

    // Perform basic input validation
    if (empty($username) || empty($password)) {
        $error = "All fields are required";
    } else {
        // Check if the username already exists in the database
        $checkUsernameQuery = "SELECT id FROM students WHERE username = '$username'";
        $checkResult = $conn->query($checkUsernameQuery);

        if ($checkResult->num_rows > 0) {
            $error = "Username already exists. Please choose a different one.";
        } else {
            // Insert new student data into the database
            $insertQuery = "INSERT INTO students (username, password) VALUES ('$username', '$password')";
            if ($conn->query($insertQuery) === TRUE) {
                $successMessage = "Registration successful!";
                $_SESSION = $username;
                header("Location: /dashboard");
                exit;
            } else {
                $error = "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <div class="container">
        <h1>Student Login</h1>
        <form id="loginForm" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <div id="error-message"></div>
    </div>

    <script>
        // Display error messages from PHP script
        const errorMessage = document.getElementById('error-message');
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');

        if (error) {
            errorMessage.innerText = error;
        }
    </script>
</body>
</html>
