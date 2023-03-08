<?php
//This includes the functions from comments.php
include "../scripts/comments_func.php";
require_once "../scripts/functions.php";
 
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ../layout/blog.php');
    exit;
}
 
$title = display_post_title(get_url_slug());
require_once "../commenting.php";
include "../layout/header.php";

display_single_post(get_url_slug());
display_comments();
include "../layout/footer.php";