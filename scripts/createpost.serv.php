<?php 

if (isset($_POST['submit'])) {

    //get variables from the createPost.php form
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    $excerpt = substr($content, 0, 32);
    
    //get the author if session username found-----not reliable so working on it
    if (!empty($_SESSION['username']) ){
    $author = $_SESSION['username'];
        //connect to db and load the functions
        require_once "../assets/plugins/connect.php";
        include_once "../scripts/functions.php";
    
    
        createPost($con, $title, $slug, $content, $excerpt, $author);

    }   else {
        $_SESSION['message'] = "<strong>Access Restricted content.</strong> You must be an admin";
        header("Location: login.php");
        exit();
    }
}