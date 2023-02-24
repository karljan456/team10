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
    
    while($row = $result->fetch_assoc()){
        echo $row['user_id']."<br>";
        echo $row['comment_time']."<br>";
        echo nl2br($row['comment_text'])."<br><br>";

        //Edit and delete buttons
        echo 
            "<form method='POST' action='".deleteComment($con)."'>
            <input type='hidden' name='id' value='".$row['id']."'>
            <button name='commentDelete'>Delete</button>
            </form>
            <form method='POST' action='editcomment.php'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <input type='hidden' name='user_id' value='".$row['user_id']."'>
                <input type='hidden' name='comment_time' value='".$row['comment_time']."'>
                <input type='hidden' name='comment_text' value='".$row['comment_text']."'>
                <button>Edit</button>
            </form>";
    }
}

//Edit function
function editComment($con){
    if (isset($_POST['editSubmit'])){
        $id = $_POST['id'];
        $user = $_POST['user_id'];
        $date = $_POST['comment_time'];
        $comment = $_POST['comment_text'];

        $sql = "UPDATE comment SET comment_text='$comment' WHERE id='$id'";

        $result = $con->query($sql);
        exit(header("location: index.php"));
    }
}

//Delete function
function deleteComment($con){
    if (isset($_POST['commentDelete'])){
        $id = $_POST['id'];

        $sql = "DELETE FROM comment WHERE id='$id'";

        $result = $con->query($sql);
        exit(header("location: index.php"));
    }
}