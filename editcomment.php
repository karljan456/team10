<?php
	//This sets the default timezone for the comment_time datetime
	date_default_timezone_set('Europe/Helsinki');
	//This makes the connection to the database
	include "assets/plugins/connect.php";
	//This includes the functions from comments.php
	include "scripts/comments_func.php";
	if (isset($_POST['editSubmit'])){
		editComment($con);
		session_start();
		$_SESSION['message'] = "Comment was updated successfuly";
		header('Location: '.$_SERVER['HTTP_REFERER'].'#editing-form');
		exit();
	}
