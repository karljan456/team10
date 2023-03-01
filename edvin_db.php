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

// $sql = "INSERT INTO `quiz` (question, option_1, option_2, option_3, option_4, correct_answer) VALUES (
//     'When was Liverpool FC founded?', '1914', '1892', 'Last year', '2000', '1892'
// )";

// $conn -> query($sql);

?>