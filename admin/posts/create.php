<?php
require_once "../assets/plugins/connect.php";

// Define variables and initialize with empty values
$title = $slug = $content = $author = "";
$title_err = $slug_err = $content_err = "";


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
    header('location: ../admin/dashboard/articles.php');
  } 
  else 
  {
    $_SESSION['message'] = "Error encountered while creating the post. Please try again.";
    header("Location: ../admin/posts/post.php");
    exit(0);
  }


}

?>