<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="leaderboard.css">
    <link rel="icon" href="./images/bulldog.png">
</head>

<body>
    <a href="welcome_mysql.php">
        <button id="home" class="btn btn-primary btn-lg">Home</button>
    </a>
    <a href="display_leaderboard.php">
        <button id="back" class="btn btn-primary btn-lg">Back</button>
    </a>
    <h3>Leaderboard </h3>

    <h5> Sort By: Score - Descending </h5>

    <?php
    // Initialize the session
    session_start();
    // If session variable is not set it will redirect to login page
    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        header("location: login_mysql.php");
        exit;
    }


    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'connect4');

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $temp = '<table id="statsTable">';
    $temp .= "<th>Username</th>";
    $temp .= "<th>Score</th>";
    $temp .= "<th>Games Played</th>";
    $temp .= "<th>Time Played</th>";

    $sql = "SELECT username, score, timeplayed, gamesplayed FROM users ORDER BY score DESC";
    $entries = $link->query($sql);

    $count = 0;
    while (($row = mysqli_fetch_array($entries)) && ($count < 10)) {
        ++$count;
        $temp .= "<tr>";
        $temp .= "<td>" . $row['username'] . "</td>";
        $temp .= "<td>" . $row['score'] . "</td>";
        $temp .= "<td>" . $row['gamesplayed'] . "</td>";
        $temp .= "<td>" . $row['timeplayed'] . "</td>";
        $temp .= "</tr>";
    }

    $temp .= "</table>";

    echo $temp;
    $link->close();

    ?>

</body>

</html>