
var playerOne = "Red";
var playerTwo = "Yellow";
var gameSize2 = false;

var sec = 0;

var currentPlayer = playerOne;
var gameOver = false;
var board;

var rows;
var columns;
var pieceColor = 1;

var cellTurnCounter = 1;

// window.onload = function() {
//     setGame();
// }


function setGameSize(gameSize) {
    if(gameSize=='small') {

        setSmallCSS();

        columnHeight = [5, 5, 5, 5, 5, 5, 5];
        rows = 6;
        columns = 7;

        board = [];

        //Setting non-dynamic height of 6 (0-5) and width of board to 7 (Length of array)
        //columnHeight = [5, 5, 5, 5, 5, 5, 5];

        for(let i = 0; i < rows; i++) {
            let row = [];
            for (let j = 0; j < columns; j++) {

                row.push(' ');


                //Inserting html of <div id="i-j class="cell"</div>"
                let cell = document.createElement("div");
                cell.id = i.toString() + '-' + j.toString();
                cell.classList.add("cell");
                cell.addEventListener("click", placePiece);
                document.getElementById("board").append(cell);

            }
            board.push(row);
        }
        startTimer();
    }


    if(gameSize=='large') {
        gameSize2 = true;

        setLargeCSS();

        columnHeight = [7, 7, 7, 7, 7, 7, 7, 7, 7];
        rows = 8;
        columns = 9;
        

        board = [];

        //Setting non-dynamic height of 6 (0-5) and width of board to 7 (Length of array)
        //columnHeight = [5, 5, 5, 5, 5, 5, 5];

        for(let i = 0; i < rows; i++) {
            let row = [];
            for (let j = 0; j < columns; j++) {

                row.push(' ');


                //Inserting html of <div id="i-j class="cell"</div>"
                let cell = document.createElement("div");
                cell.id = i.toString() + '-' + j.toString();
                cell.classList.add("cell");
                cell.addEventListener("click", placePiece);
                document.getElementById("board").append(cell);

            }
            board.push(row);
        }
        startTimer();

    }
    else {
        return;
    }
}


function setSmallCSS() {
    document.getElementById('board').style.cssText = `
        height: 540px;
        width: 630px;

        background-color: blue;
        border: 10px solid navy;

        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
    `
    document.getElementById('setBig').style.display = "none";
    document.getElementById('setSmall').style.display = "none";
    document.getElementById('sizeButtons').style.display = "none";

    //display Restart Button
    document.getElementById('restart').style.display = "block";
    document.getElementById('timer').style.display = "block";
    document.getElementById('top-bottom').style.display = "block";
    

}
function setLargeCSS() {
    document.getElementById('board').style.cssText = `
        height: 720px;
        width: 810px;

        background-color: blue;
        border: 10px solid navy;

        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
    `
    //Remove buttons
    document.getElementById('setBig').style.display = "none";
    document.getElementById('setSmall').style.display = "none";
    document.getElementById('sizeButtons').style.display = "none";

    //display Restart Button
    document.getElementById('restart').style.display = "block";
    document.getElementById('timer').style.display = "block";
    document.getElementById('home').style.display = "block"; 
    document.getElementById('top-bottom').style.display = "block";
   

}


//Timer Function
function startTimer() {
        function pad ( val ) { return val > 9 ? val : "0" + val; }
            const myTimer = setInterval( function(){
                document.getElementById("seconds").innerHTML=pad(++sec%60);
                document.getElementById("minutes").innerHTML=pad(parseInt(sec/60,10));
                if(gameOver==true) {
                    
                    clearInterval(myTimer);
                }
        }, 1000); 
}



function placePiece() {
    if(gameOver) {
        return;
    }
    //fetching html id of cell into readable array 0-0 == [0, 0]
    let coordinates = this.id.split("-");
    let row = parseInt(coordinates[0]);
    let column = parseInt(coordinates[1]);


    row = columnHeight[column];
    //Do nothing is column is full
    if(row < 0) {
        return;
    }

    board[row][column] = currentPlayer;
    let cell = document.getElementById(row.toString()+ "-" + column.toString());

    //Coloring Cells based off Player turn
    if( (currentPlayer == playerOne) && (pieceColor === 1) ) {
        cell.classList.add("redPiece");
        //Alternate Players
        currentPlayer = playerTwo;
    }
    else if( (currentPlayer == playerTwo) && (pieceColor === 1) ) {
        cell.classList.add("yellowPiece");
        currentPlayer = playerOne;
    }

    else if( (currentPlayer == playerOne) && (pieceColor === 2) ) {
        cell.classList.add("orangePiece");
        //Alternate Players
        currentPlayer = playerTwo;
    }
    else if( (currentPlayer == playerTwo) && (pieceColor === 2) ) {
        cell.classList.add("greenPiece");
        currentPlayer = playerOne;
    }

    cell.innerHTML = cellTurnCounter;
    cellTurnCounter++;


    //Call check winner function every time piece is placed

    row = row - 1;  //updating row height where piece was placed based on column
    columnHeight[column] = row; //updating the array value for column in [X,X,X,X,X,X,X..]

    checkWinner();

}

function changePieceColor() {

    pieceColor = 2;

    console.log('test');
    console.log(pieceColor);

    const newPiece = document.querySelectorAll('.redPiece');

    newPiece.forEach(newPiece => {
        newPiece.classList.add('orangePiece');
        newPiece.classList.remove('redPiece');
    }) 

    const newPiece2 = document.querySelectorAll('.yellowPiece');

    newPiece2.forEach(newPiece2 => {
        newPiece2.classList.add('greenPiece');
        newPiece2.classList.remove('yellowPiece');
    }) 

}


function checkWinner() {

    //vertical check
    for(let c = 0; c < columns; c++) {
        for(let r = 0; r < rows - 3; r++) {
            if(board[r][c] != ' ') {
                if(board[r][c] == board[r+1][c] && board[r+1][c] == board[r+2][c] && board[r+2][c] == board[r+3][c]) {
                    winner(r,c);
                    return;
                }
            }
        }
    }
    //horizonal checks
    for(let r = 0; r < rows; r++) {
        for(let c = 0; c < columns - 3; c++) {
            if(board[r][c] != ' ') {
                if(board[r][c] == board[r][c+1] && board[r][c+1] == board[r][c+2] && board[r][c+2] == board[r][c+3]) {
                    winner(r,c);
                    return;
                }
            }
        }
    }
    //"Back Slash" diagonal checks
    for(let r = 0; r < rows - 3; r++) {
        for(let c = 0; c < columns - 3; c++) {
            if(board[r][c] != ' ') {
                if(board[r][c] == board[r+1][c+1] && board[r+1][c+1] == board[r+2][c+2] && board[r+2][c+2] == board[r+3][c+3]) {
                    winner(r,c);
                    return;
                }
            }
        }
    }
    //"Forward Slash" diagonal checks
    for(let r = 3; r < rows; r++) {
        for(let c = 0; c < columns - 3; c++) {
            if(board[r][c] != ' ') {
                if(board[r][c] == board[r-1][c+1] && board[r-1][c+1] == board[r-2][c+2] && board[r-2][c+2] == board[r-3][c+3]) {
                    winner(r,c);
                    return;
                }
            }
        }
    }
}

function winner(r, c) {
    let winner = document.getElementById("winner");
    if(board[r][c] == playerOne) {
        winner.innerText = "Player One Wins";
        updateHostWins(); 
    }
    else {
        winner.innerText = "Player Two Wins";
        updateHostGames();
    }
    gameOver = true;
}

function restart() {
    window.location.reload();
}

function updateHostWins(){
    var req = new XMLHttpRequest(); 
    var newTime_min = document.getElementById("minutes").innerHTML;
    var newTime_sec = document.getElementById("seconds").innerHTML;

    var update_min = parseInt(newTime_min);
    var update_sec = parseInt(newTime_sec);
    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            alert("Updating Host's Games"); 
            var response = req.responseText; 
            alert(response); 
        }
    }
    req.open("POST", "updateStats.php");
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("callGameWin=true" + "&updateTime=" + update_min + update_sec);
}

function updateHostGames(){
    var req = new XMLHttpRequest(); 
    var newTime_min = document.getElementById("minutes").innerHTML;
    var newTime_sec = document.getElementById("seconds").innerHTML;

    var update_min = parseInt(newTime_min);
    var update_sec = parseInt(newTime_sec);

    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            alert("Updating Host's Games"); 
            var response = req.responseText; 
            alert(response); 
        }
    }
    req.open("POST", "updateStats.php");
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("callGameLoss=true" + "&updateTime=" + update_min + update_sec);
}




//Change Board Color

function changeBoardColor() {
    if(gameSize2 == false) {
        document.getElementById('board').style.cssText = `
            height: 540px;
            width: 630px;

            background-color: black;
            border: 10px solid gray;

            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
        `

    }
    
    if(gameSize2 == true) {
        document.getElementById('board').style.cssText = `
            height: 720px;
            width: 810px;

            background-color: black;
            border: 10px solid gray;

            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
        `
    }
}