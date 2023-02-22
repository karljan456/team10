<?php
$servername = "db"; // gotten from the Docker. This is the working server that we are working on. In this case today local host 82
$username = "capp1"; // Database username that we logged in with.
$password = "password"; //The password that we used to create the database
$dbname = "capp1"; 
// creating connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if($conn->connect_error){
    die("Connection Failed:" . $conn->connect_error);
}
?>