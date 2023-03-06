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


    //uploaded file variables
    $filename = uniqid() . '_' . $_FILES['featured_image']['name'];
    $featured_image_url = '../assets/images/' . $filename;
    $featured_image = $_FILES['featured_image'];
    $target_dir = '../assets/images/';

 // Validate the form data
    if (move_uploaded_file($featured_image['tmp_name'], $filename)) {
        echo 'The file ' . basename($featured_image['name']) . ' has been uploaded.';
    } else {
        echo 'Sorry, there was an error uploading your file.';
    }

    // Validate the form data
    $errors = array();

    if (empty($title)) {
        $errors[] = 'Title is required';
    }

    if (empty($slug)) {
        $errors[] = 'Slug is required';
    } elseif (!preg_match('/^[a-z0-9-]+$/', $slug)) {
        $errors[] = 'Slug can only contain lowercase letters, numbers, and hyphens';
    }

    if (empty($content)) {
        $errors[] = 'Content is required';
    }

    if ($featured_image['error'] !== UPLOAD_ERR_NO_FILE && !in_array($featured_image['type'], array('image/jpeg', 'image/png'))) {
        $errors[] = 'Featured image must be a JPEG or PNG file';
    }

    // If there are any errors, display them and stop processing the form
    if (!empty($errors)) {
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        exit;
        session_start();
        $_SESSION['message'] = $error;
        exit();
    }


    /////////////////all is good? let's insert stuff
    require_once "../assets/plugins/connect.php";

    // Insert the post into the database
    $sql = "INSERT INTO posts (title, slug, content, excerpt, category, author, featured_image) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss', $title, $slug, $content, $category, $author, $featured_image_url);
    $featured_image_data = file_get_contents($featured_image['tmp_name']);
    $stmt->execute();

    // Check for errors executing the query
    if ($stmt->errno) {
        die('Error executing the query: ' . $stmt->error);
    }

    // Close the database connection
    $con->close();

    // Redirect to the post page
    header('Location: post.php?slug=' . $slug);
    exit;
}