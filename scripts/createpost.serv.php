<?php 

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    $author = $_SESSION['username'];


sql = INSERT INTO posts (title, slug, content, author) VALUES
($title, $slug, $content, $author,);