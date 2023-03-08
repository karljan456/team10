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
    echo "<div class='post article-container'>";
    echo "<form method='POST' action='".setComment($con)."' name='comform' onsubmit='return commentlen()'>
        <input type='hidden' name='$username' value='$username'>
        <input type='hidden' name='comment_time' value='".date('Y-m-d H:i:s')."'>
        <div class='form-group'>
            <label for='comment_text'>Comment</label>
            <textarea class='form-control' id='comment_text' name='comment_text' rows='3'></textarea>
        </div>";


	if (isset($_SESSION['username'])) {
		echo "<button type='submit' name='comment' class='btn btn-primary my-3'>Comment</button><br><br>";
	}

		getComment($con);
	echo "</form></div>";


	

	//Scripts for the texteditor
	echo '<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: "textarea#comment_text",
        menubar: true,
    });
    </script>';
}