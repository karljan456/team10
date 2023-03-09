<?php
if (isset($_GET['id'])) {
    // Get the post ID from the URL
    $id = $_GET['id'];

    // Connect to the database
    require_once "functions.php";
    require_once "../assets/plugins/connect.php";

    // Fetch the post from the database
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();
}

if (isset($_POST['publish'])) {
    // Get variables from the editPost.php form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $slug = preg_replace('/[^a-z0-9]+/i', '-', strtolower(trim($_POST['slug'])));
    $content = $_POST['content'];
    $excerpt = substr($content, 0, 32);
    $category = $_POST['category'];
    $author = $_SESSION['username'];

    require_once "functions.php";

    // Update the featured image if a new one was uploaded
    if ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $imagePath = saveImage($_FILES['image']);
        $sql = "UPDATE posts SET title = ?, slug = ?, content = ?, excerpt = ?, category = ?, author = ?, featured_image = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('sssssssi', $title, $slug, $content, $excerpt, $category, $author, $imagePath, $id);
    } else {
        $sql = "UPDATE posts SET title = ?, slug = ?, content = ?, excerpt = ?, category = ?, author = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ssssssi', $title, $slug, $content, $excerpt, $category, $author, $id);
    }

    $stmt->execute();

    // Check for errors executing the query
    if ($stmt->errno) {
        die('Error executing the query: ' . $stmt->error);
    }

    // Close the database connection
    $con->close();

    // Redirect to the post page
    header('Location: ../posts/post.php?slug=' . $slug);
    exit;
}
?>

<?php include_once('../layout/header.php') ?>

<div class="container mt-5">
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="<?php echo $post['title']; ?>">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="<?php echo $post['slug']; ?>">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="
