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
echo "<form method='POST' action='".editComment($con)."'>
<input type='hidden' name='id' value='$id'>
    <input type='hidden' name='username' value='$username'>
	<input type='hidden' name='comment_time' value='$date'>
	<textarea name='comment_text'>$comment</textarea><br>
	<button type='submit' name='editSubmit'>Edit</button>
	</form>";

?>	



<?php include "layout/trophies.php" ?>

<?php include "layout/footer.php" ?>