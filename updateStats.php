<?php

session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'connect4');

// If session variable is not set it will redirect to login page
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("location: login_mysql.php");
    exit;
}

$host = $_SESSION['username']; //Username of current account 
$time = (isset($_POST['updateTime'])) ? $_POST['updateTime'] : "00:00:00";

function updateWins($time)
{
    global $host;
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "UPDATE users SET gamesplayed = gamesplayed+1, score = score+1, timeplayed = (ADDTIME(timeplayed," . $time . ")) WHERE username ='" . $host . "'";

    if ($link->query($sql) === TRUE) {
        $response = "Record Updated Successfully";
    } else {
        $response = "Error Updating Record: " . $link->error;
    }
    echo $response;
    $link->close();
}

function updateGames($time)
{
    global $host;
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $sql = "UPDATE users SET gamesplayed = gamesplayed+1, timeplayed = (ADDTIME(timeplayed,'" . $time . "')) WHERE username ='" . $host . "'";

    if ($link->query($sql) === TRUE) {
        $response = "Record updated successfully";
    } else {
        $response = "Error updating record: " . $link->error;
    }

    echo $response;
    $link->close();
}

if (isset($_POST['callGameWin']) && $_POST['callGameWin'] == 'true') {
    updateWins($time);
} elseif (isset($_POST['callGameLoss']) && $_POST['callGameLoss'] == 'true') {
    updateGames($time);
} else {
    echo $time;
}
