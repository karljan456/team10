<?php

//This function sets the comment to the database
function setComment($con){
    if (isset($_POST['comment'])){
        $username = $_SESSION['username'];
        $date = $_POST['comment_time'];
        $comment = $_POST['comment_text'];

        $sql = "INSERT INTO comment (comment_author, comment_time, comment_text) 
                VALUES ('$username', '$date', '$comment')";

        $result = $con->query($sql);
    }
}

//This function gets the comments from the database
function getComment($con){
    $sql = "SELECT * FROM comment";
    $result = $con->query($sql);
    
    while($row = $result->fetch_assoc()){
        echo "<div class='text-center'>";
        echo $row['comment_author']."<br>";
        echo $row['comment_time']."<br>";
        echo nl2br($row['comment_text'])."<br><br>";
        echo "</div>";

        //Edit and delete buttons
        echo 
            "
            <div class='d-grid gap-2 d-md-block'>
            <form class='text-center' method='POST' action='".deleteComment($con)."'>
            <input type='hidden' name='id' value='".$row['id']."'>
            <button class='btn btn-primary' type='button' name='commentDelete'>Delete</button>
            </form>
            <form class='text-center' method='POST' action='editcomment.php'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <input type='hidden' name='user_id' value='".$row['comment_author']."'>
                <input type='hidden' name='comment_time' value='".$row['comment_time']."'>
                <input type='hidden' name='comment_text' value='".$row['comment_text']."'>
                <button class='btn btn-primary' type='button'>Edit</button>
            </form>
            </div>";
    }
}

//Edit function
function editComment($con){
    if (isset($_POST['editSubmit'])){
        $id = $_POST['id'];
        $user = $_POST['comment_author'];
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