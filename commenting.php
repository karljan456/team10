<?php
function display_comments()
{
	//This sets the default timezone for the comment_time datetime
	date_default_timezone_set('Europe/Helsinki');
	//This makes the connection to the database
	include "assets/plugins/connect.php";
	//This includes the functions from comments.php
	include "scripts/comments.php";

	// Check if there is a session with username/user is logged in. If not ask the user to login.
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	} else {
		$username = "Anonymous";
		while ($username = "Anonymous") {
			echo "Please login to leave a comment";
			login();
			getComment($con);
			exit();
		}

	}


	//This is the form for leaving a comment
	echo "<div class='content-wrapper wd-75'>
            <div class='container post-container'>
                <div class='container article-container'>";
	echo "<form method='POST' action='" . setComment($con) . "'>
						<input type='hidden' name='$username' value='$username'>
						<input type='hidden' name='comment_time' value='" . date('Y-m-d H:i:s') . "'>
						<textarea name='comment_text'></textarea><br>";

	if (isset($_SESSION['username'])) {
		echo "<button type='submit' name='comment'>Comment</button><br><br>";
	}
		echo "<div>";
		getComment($con);
		echo "</div>";
	echo "</form></div></div></div>";
	
}