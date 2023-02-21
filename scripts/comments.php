<?php

//This function sets the comment to the database
function setComment($con){
    if (isset($_POST['comment'])){
        $user = $_POST['user_id'];
        $date = $_POST['comment_time'];
        $comment = $_POST['comment_text'];

        $sql = "INSERT INTO comment (user_id, comment_time, comment_text) 
                VALUES ('$user', '$date', '$comment')";

        $result = $con->query($sql);
    }
}

//This function gets the comments from the database
function getComment($con){
    $sql = "SELECT * FROM comment";
    $result = $con->query($sql);
    
    $row = $result->fetch_assoc();
    echo $row['comment_text'];
}