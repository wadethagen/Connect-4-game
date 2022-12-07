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
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Leaderboard</title>
     <link rel="stylesheet" href="display_leaderboard.css">
     <link rel="icon" href="./images/bulldog.png">
 </head>

 <body>
     <a href="welcome_mysql.php">
         <button id="home" class="btn btn-primary btn-lg">Home</button>
     </a>

     <h3> Leaderboard </h3>

     <div id="sorting">
         <a href="score_ascending.php"> Score - Ascending </a>
         <a href="score_descending.php"> Score - Descending </a>
         <a href="timeplayed_ascending.php"> Time Played - Ascending </a>
         <a href="timeplayed_descending.php"> Time Played - Descending </a>
         <a href="gameplayed_ascending.php"> Game Played - Ascending </a>
         <a href="gameplayed_descending.php"> Game Played = Descending </a>
     </div>



 </body>

 </html>