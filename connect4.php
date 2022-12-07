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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connect 4</title>
    <link rel="stylesheet" href="connect4.css">
    <link rel="stylesheet" href="changestyle.css">
    <link rel="icon" href="./images/bulldog.png">

    <script src="./connect4.js"></script>
    <script src="./stylebuttons.js"></script>

</head>


<body>

    <!-- Buttons to Restart Game, And go back to main page -->
    <div class="top">
        <button id="restart" onClick="restart()">Restart</button>
        <a href="welcome_mysql.php">
            <button id="home" class="btn btn-primary btn-lg">Home</button>
        </a>
    </div>


    
     <!-- Buttons for changing piece and board Color -->
     <div style = "display: none" id="top-bottom">
            <button id="boardColor" onClick="changeBoardColor()">Board Dark Mode</button> 
            <button id="pieceColor" onClick="changePieceColor()">Piece Color</button>
            </a>
        </div>
    </div>

    
    <div style="padding-bottom:4px">
        <h1 id="winner"></h1>
        <div id="timer">
            <img style="width:12px; height:12px" src="https://cdn-icons-png.flaticon.com/512/3564/3564808.png" alt="Play Time:">
            <label id="minutes"> 00</label> :
            <label id="seconds"> 00</label>
        </div>
    </div>
    <div id="sizeButtons">
        <p id="text1">Please Choose a Board Size</p>

        <div id="smallBoardSelect">
            <img src="images\connect4_sm.PNG" alt="6x7" id="setSmall" name="small" onClick="setGameSize('small')"></img>
            <p>6x7</p>
        </div>
        <div id="bigBoardSelect">
            <img src="images\connect4_lg.PNG" alt="8x9" id="setBig" name="large" onClick="setGameSize('large')"></img>
            <p>8x9</p>
        </div>
    </div>
    <div id="board">

    </div>

</body>

</html>