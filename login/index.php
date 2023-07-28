<?php
session_set_cookie_params(0, '/', '.cherryservers.local');
session_start();
if(isset($_SESSION['username'])) {
    header("Location: /dashboard");
    exit;
}
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
    $password = trim($_POST["password"]);

    error_log("I am caught");

    #  $sql = "SELECT * FROM students WHERE username = '$username'";
    if ($stmt = $con->prepare('SELECT id, password FROM students WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();

        if ($stmt->num_rows > 0) 
        {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($_POST['password'], $password)) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                #  $_SESSION['loggedin'] = TRUE;
                #  $_SESSION['name'] = $_POST['username'];
                #  $_SESSION['id'] = $id;
                echo 'Welcome ' . $_SESSION['name'] . '!';
            } 
            else {
                // Incorrect password
                echo 'Incorrect username and/or password!';
            }
        } 
        else {
            // Incorrect username
            echo 'No user Found ';
        }
        $stmt->close();
    }

}
//     $result = $conn->query($sql);

//     if ($result->num_rows == 1) {
//         $result->bind_results($id, $password);
//         echo "Login successful!";
//         $_SESSION['username'] = trim($_POST['username']);
//         header("Location: /dashboard");
//         exit;
//     } else {
//         echo "Invalid credentials. Please try again.";
//     }

// $conn->close();
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
