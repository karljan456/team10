<?php 

require_once "../scripts/functions.php";
$title =  display_post_title(get_url_slug());
include "../layout/header.php";

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ../layout/blog.php');
    exit;
} else {
display_single_post(get_url_slug());
mini_login();
//display_comments

}
 include "../layout/footer.php";
