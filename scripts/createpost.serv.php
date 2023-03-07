<?php
session_start();
if (isset($_POST['publish'])) {

    //get variables from the createPost.php form
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $content = $_POST['content'];
    $excerpt = substr($content, 0, 32);
    $category = $_POST['category'];
    $author = $_SESSION['username'];

    require_once "functions.php";

    $imagePath = saveImage($_FILES['image']);

    /////////////////all is good? let's insert stuff
    require_once "../assets/plugins/connect.php";

    // Insert the post into the database
    $sql = "INSERT INTO posts (title, slug, content, excerpt, category, author, featured_image) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('sssssss', $title, $slug, $content, $excerpt, $category, $author, $imagePath);
    $stmt->execute();

    // Check for errors executing the query
    if ($stmt->errno) {
        die('Error executing the query: ' . $stmt->error);
    }

    // Close the database connection
    $con->close();

    // Redirect to the post page
    header('Location: ../post/post.php?slug=' . $slug);
    exit;
}