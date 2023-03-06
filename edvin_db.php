<?php
$server_name = "368398b50e43";
$user_name = "red";
$password = "password";
$db_name = "tables";
// creating connection 

$conn = new mysqli($server_name, $user_name, $password, $db_name);

// check the connection 

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}


?>