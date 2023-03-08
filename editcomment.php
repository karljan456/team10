<?php include "layout/header.php" ?>
<?php
	//This sets the default timezone for the comment_time datetime
	date_default_timezone_set('Europe/Helsinki');
	//This makes the connection to the database
	include "assets/plugins/connect.php";
	//This includes the functions from comments.php
	include "scripts/comments.php";
?>



<?php
$id = $_POST['id'];
$username = $_SESSION['username'];
$date = $_POST['comment_time'];
$comment = $_POST['comment_text'];

//This is the form for editing a comment
echo "<form method='POST' action='".editComment($con)."' name='comform'>
<input type='hidden' name='id' value='$id'>
    <input type='hidden' name='username' value='$username'>
	<input type='hidden' name='comment_time' value='$date'>
	
	<div class='form-group'>
            <label for='comment_text'>Comment</label>
            <textarea class='form-control' id='comment_text' name='comment_text' rows='3'>$comment</textarea>
        </div>
	<button type='submit' name='editSubmit' class='btn btn-primary my-3' onClick='return commentlen()'>Edit</button>
	</form>";

?>	



<?php include "layout/trophies.php" ?>

<?php include "layout/footer.php" ?>