<?php 

if (isset($_POST['publish'])) {

    //get variables from the createPost.php form
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    $excerpt = substr($content, 0, 32);
    session_start();
    $author = $_SESSION['username'];
        //connect to db and load the functions
        require_once "../assets/plugins/connect.php";
        require_once "functions.php";
    
        createPost($con, $title, $slug, $content, $excerpt, $author);


    } 