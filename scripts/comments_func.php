<?php

//This function sets the comment to the database
function setComment($con){
    $result = "";
    if (isset($_POST['comment'])){
        $username = $_SESSION['username'];
        $date = $_POST['comment_time'];
        $comment = $_POST['comment_text'];
        //Trim whitespace at the end of the comment
        $trim_comment = rtrim($comment);

        $sql = "INSERT INTO comment (comment_author, comment_time, comment_text) 
                VALUES ('$username', '$date', '$trim_comment')";

        $result = $con->query($sql);

        echo "<script>window.location.href</script>";
    }
}

//This function gets the comments from the database
function getComment($con){
    $sql = "SELECT * FROM comment ORDER BY comment_time DESC";
    $result = $con->query($sql);
    
    while($row = $result->fetch_assoc()){
        echo "<hr><br><strong>".$row['comment_author']."</strong><br>";
        echo $row['comment_time']."<br>";
        echo nl2br($row['comment_text'])."<br>";

        //Edit and delete buttons
        echo 
            "<div style='display: inline;'>
            <form style='display: inline;'  method='POST' action='".deleteComment($con)."'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <button name='commentDelete' class='btn btn-primary my-3'>Delete</button>
            </form>

            <form style='display: inline;'  method='POST' action='".editform_display($row)."'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <input type='hidden' name='user_id' value='".$row['comment_author']."'>
                <input type='hidden' name='comment_time' value='".$row['comment_time']."'>
                <input type='hidden' name='comment_text' value='".$row['comment_text']."'>
                <button name='edit' class='btn btn-primary my-3'>Edit</button><br><br>
            </form></div>";
    }
}


function editform_display($row){
    if (isset($_POST['edit']) && $_POST['id'] == $row['id']) {
        include "../assets/plugins/connect.php";
        $id = $row['id'];
        $username = $_SESSION['username'];
        $date = $_POST['comment_time'];
        $comment = $_POST['comment_text'];

        $sql = "SELECT * FROM comment WHERE id=$id";

        $result = $con->query($sql);

        echo "<form method='POST' action='".editComment($con)."' name='comform' anchor='edit-form'>
            <input type='hidden' name='id' value='$id'>
            <input type='hidden' name='comment_author' value='$username'>
            <input type='hidden' name='comment_time' value='$date'>
            
            <div class='form-group'>
                <label for='comment_text'>Comment</label>
                <textarea class='form-control' id='editedcomment_text' name='comment_text' rows='3' >$comment</textarea>
            </div>
            <button type='submit' name='editSubmit' class='btn btn-primary my-3' onClick='return commentlen()'>Edit</button>
        </form>";

    }
    
}

function editComment($con){
    if (isset($_POST['editSubmit'])){
        $id = $_POST['id'];
        $username = $_POST['comment_author'];
        $date = $_POST['comment_time'];
        $comment = $_POST['comment_text'];
        //Trim whitespace at the end of the comment
        $trim_comment = rtrim($comment);
        
        $sql = "UPDATE comment SET comment_text='$trim_comment' WHERE id=$id";

        $result = $con->query($sql);
        if (!$result) {
            die("Error updating comment: " . $con->error);
        } else {
            session_start();
            $_SESSION['message'] = "Comment updated successfully!";
            header('Location: '.$_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}


//Delete function
function deleteComment($con){
    if (isset($_POST['commentDelete'])){
        $id = $_POST['id'];

        $sql = "DELETE FROM comment WHERE id='$id'";

        if($result = $con->query($sql)){
        session_start();
        $_SESSION['message'] = "Comment deleted successfully!";
        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit();

        //$result = $con->query($sql);
        //echo "<script>window.location.href</script>";
        }
        
    }
}