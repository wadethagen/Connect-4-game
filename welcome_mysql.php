<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: login_mysql.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connect 4</title>
    <link rel="stylesheet" href="welcome_mysql.css">
    <link rel="icon" href="./images/bulldog.png">
</head>

<body>
    <div>
        <h3>Hello, <?php echo $_SESSION['username']; ?></h3> <br>
        <h3> Welcome to Connect 4 </h3>
    </div>

    <nav class="navMenu">
        <a href="connect4.php">Start</a>
        <a href="help.php">Help</a>
        <a href="display_leaderboard.php">Leaderboard</a>
        <a href="contact.php">Contact</a>
    </nav>

    <div class="footer">
        <p id="sign_out"><a href="logout_mysql.php">Sign Out</a></p>
    </div>
</body>

</html>