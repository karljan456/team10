<?php
require_once "connect.php";

// Define variables and initialize with empty values
$title = $slug = $content = $author = "";

if (isset($_POST['publish'])) {

  $title = $_POST['title'];
  $slug = $_POST['slug'];
  $content = $_POST['content'];
  $author=$_POST['author'];

  $query = "INSERT INTO posts (title, slug, content, author) 
            VALUES ('$title', '$slug','$content', '$author')";
  $query_run= mysqli_query($con, $query);

  if ($query_run)
  {
    $_SESSION['message'] = "Post Published Successfully";   
    header('location: post.php');
  } 
  else 
  {
    $_SESSION['message'] = "Error encountered while creating the post. Please try again.";
    header("Location: post.php");
    exit(0);
  }

}

?>