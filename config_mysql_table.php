<?php

$servername = "localhost";
$username = "root";
$password = "";

// Creating connection
$connection = mysqli_connect($servername, $username, $password);
// Checking connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "CREATE DATABASE IF NOT EXISTS connect4";
if (mysqli_query($connection, $sql1)) {
    echo " ";
} else {
    echo "Error creating database: " . mysqli_error($connection);
}

// closing connection
mysqli_close($connection);

//Creating connection with database 
$new_Connection = mysqli_connect($servername, $username, $password, "connect4");

// Creating a database named newDB
$sql = "CREATE TABLE IF NOT EXISTS users(
    username VARCHAR(30), 
    password VARCHAR(30), 
    score INT(255), 
    timeplayed TIME NOT NULL,
    gamesplayed INT(255)
)";

if (mysqli_query($new_Connection, $sql)) {
    echo " ";
} else {
    echo "Error Creating Table: " . mysqli_error($new_Connection);
}

// closing connection
mysqli_close($new_Connection);
