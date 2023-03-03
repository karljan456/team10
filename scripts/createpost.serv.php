<?php 

if (isset($_POST['submit'])) {

    //get variables from the createPost.php form
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    $excerpt = substr($content, 0, 32);
    
    //get the author if session username found-----not reliable so working on it
    if (!empty($_SESSION['username'])){
    $author = $_SESSION['username'];
    }   

$query = "INSERT INTO posts (title, slug, content, excerpt, author) VALUES
($title, $slug, $content, $excerpt, $author,);";