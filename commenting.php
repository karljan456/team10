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
//This is the form for leaving a comment
echo "<form method='POST' action='".setComment($con)."'>
	<input type='hidden' name='user_id' value='Anonymous'>
	<input type='hidden' name='comment_time' value='".date('Y-m-d H:i:s')."'>
	<textarea name='comment_text'></textarea><br>
	<button type='submit' name='comment'>Comment</button>
	</form>";

	getComment($con);
?>	



<?php include "layout/trophies.php" ?>

<?php include "layout/footer.php" ?>