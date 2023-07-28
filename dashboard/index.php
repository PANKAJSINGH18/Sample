<?php
session_set_cookie_params(0, '/', '.cherryservers.local');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /login/");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>This is your dashboard content.</p>
        <p><?php echo session_name() ?></p>
        <a href="/logout">Logout</a>
    </div>
</body>
</html>
