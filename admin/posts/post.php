<?php session_start(); ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Bootstrap WYSIWYG editor | Text Editor Live Preview | Bootstrap Editor Examples | Responsive Text Editor
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style type="text/css">
    .tox-statusbar__branding {
        display: none;
    }

    .tox-notification__body {
        display: none;
    }

    .tox-notifications-container {
        display: none;
    }

    /* Button */
    .btn-primary {
        background-color: #009688;
        border-style: none;
    }

    .btn-primary {
        background-color: #009688;
        border-style: none;
    }
    </style>
</head>

<body>


    <?php include('../admin/messages.php'); ?>

    <div class="container mt-4 mb-4">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-8">
                <h1 class="h2 mb-4">Add Post</h1>


                <form action="../admin/posts/create.php" method="POST">
                    <div class="form-group">
                        <input type="text" id="title" name="title" placeholder="Post title" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" id="slug" name="slug" placeholder="Post slug" required></textarea>
                    </div>

                    <div class="form-group">
                        <textarea id="content" name="content" placeholder="Post Content" ></textarea>
                    </div>


                    <div class="form-group">
                        <input type="text" id="author" name="author" placeholder="Author"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success" name="publish">publish</button>
            </div>
        </div>
    </div>
  </form>






    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea#content',
        menubar: false
    });
    </script>
</body>

</html>