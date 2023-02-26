<?php 
session_start(); 
$title="Create post";
include "layout/header.php";

?>


    

    <div class="container mt-4 mb-4">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-8">
                <h1 class="h2 mb-4">Create a new Article</h1>


                <form action="scripts/post.serv.php" method="POST">
                    <div class="form-group">
                        <input type="text" id="title" name="title" placeholder="Post title" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="slug" name="slug" placeholder="Post slug" required>
                    </div>

                    <div class="form-group">
                        <textarea id="content" name="content" placeholder="Post Content" ></textarea>
                    </div>

                    <button type="submit" class="btn btn-success" name="publish">Publish</button>
            </div>
        </div>
    </div>
  </form>


  if (isset($_POST['submit'])) {

$username = $_POST['username'];
$password = $_POST['password'];

//connect to db
require_once "../assets/plugins/connect.php";

//load the functions file to validate etc..
include_once "../scripts/functions.php";

// check if any input field is empty
if (emptyLoginInput($username, $password) !== false){

    header ("Location: ../login.php?error=emptyinputfield");
    exit();
}

//use the login function
userLogin($con, $username, $password);

} 
else {
header ("Location: ../login.php");
    exit();
}
  createPost($title, $title, $title);






    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea#content',
        menubar: false
    });
    </script>
<?php include "layout/footer.php";?>