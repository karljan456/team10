<?php include "layout/header.php" ?>
<?php
	date_default_timezone_set('Europe/Helsinki');
	include "assets/plugins/connect.php";
	include "scripts/comments.php";
?>

<?php
echo "<form method='POST' action='".setComment($con)."'>
	<input type='hidden' name='user_id' value='Anonymous'>
	<input type='hidden' name='comment_time' value='".date('Y-m-d H:i:s')."'>
	<textarea name='comment_text'></textarea><br>
	<button type='submit' name='comment'>Comment</button>
	</form>";
?>	



<?php include "layout/trophies.php" ?>

<?php include "layout/footer.php" ?>