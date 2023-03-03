<?php 
$title="Create post";
include "../layout/header.php";
include "../scripts/functions.php";
include "../scripts/messages.php";

if (!empty($_SESSION['admin'])) {
    echo '    
    <div class="container mt-4 mb-4" >
    <div class="row justify-content-md-center">
        <div class="col-md-12 col-lg-8">
            <h1 class="h2 mb-4">Create a new Article</h1>


            <form action="scripts/createpost.serv.php" method="POST" class="mt-3 create-post-form">
                <div class="form-group col-lg-12">
                    <input type="text" id="title" name="title" class="mt-1 col-lg-12" placeholder="Title.." required>
                </div>
                <div class="form-group">
                    <input type="text" id="slug" name="slug" class="my-1 mb-3 pl-5 col-lg-12" placeholder="Slug.." required>
                </div>

                <div class="form-group">
                    <textarea id="content" name="content" class="my-5" placeholder="Post Content" ></textarea>
                </div>
                <div class="form-group mt-3">
                <button type="submit" class="btn btn-success"  class="my-3"  name="publish">Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>

';

} else {
    $_SESSION['message']="<strong>Admin restricted</strong>. You do not have access to this page, Please login ";
    login();
}

?>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea#content',
        menubar: true,
    });
    </script>
<?php include "../layout/footer.php";?>