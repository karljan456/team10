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
    $featured_image = $_POST['featured_image'];

        require_once "./functions.php";
    
        createPost($title, $slug, $content, $excerpt, $category, $featured_image, $author);


    } 



    function createPost() {
//connect to db
        require_once "../assets/plugins/connect.php";

        // Upload the featured image file to the server
        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($_FILES[$featured_image]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES[$featured_image]["tmp_name"]);

        if($check !== false) {
            // Check if file already exists
            if (file_exists($target_file)) {
                return "Sorry, file already exists.";
            }
            // Check file size
            if ($_FILES[$featured_image]["size"] > 500000) {
                return "Sorry, your file is too large.";
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
            // Upload file to the server
            if (move_uploaded_file($_FILES[$featured_image]["tmp_name"], $target_file)) {
                $imagePath = $target_file;
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        } else {
            return "File is not an image.";
        }
      
        // Save the post data to the database
      }
      