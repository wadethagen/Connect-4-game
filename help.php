<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: welcome_mysql.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/bulldog.png">
    <title>Help</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap");

        * {
            background-color: #13284c;
            font-family: "Montserrat", sans-serif;
        }

        h3 {
            margin-top: 100px;
            color: #f6f4e6;
            font-size: 30px;
            text-align: center;
        }

        h2 {
            margin-top: 50px;
            color: #f6f4e6;
            text-align: center;
        }

        a button {
            width: 10em;
            height: 2em;
            font-size: 12pt;
            cursor: pointer;
            border: none;
            color: #f6f4e6;
            background-color: #13284c;
        }

        a button:hover {
            color: #b1102b;
        }
    </style>

</head>

<body>
    <a href="welcome_mysql.php">
        <button id="home" class="btn btn-primary btn-lg">Home</button>
    </a>
    <h3>How to play? </h3>
    <h2>
        This is a two players game where one of the players needs to have to place 4 pieces in a row horizontally,
        vertically, diagonally to win the game.
    </h2>

    <br>

    <h2>
        Player One (Red) goes first, traditionally this is the player who is logged into the website as their game stats
        are the only ones who gets stored.
    </h2>

</body>

</html>