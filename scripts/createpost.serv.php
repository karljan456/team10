<?php 

if (isset($_POST['submit'])) {

    //get variables from the createPost.php form
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    
    //get the author if session username found-----not reliable so working on it
    if (!empty($_SESSION['username'])){
    $author = $_SESSION['username'];
    }   

sql = INSERT INTO posts (title, slug, content, author) VALUES
($title, $slug, $content, $author,);