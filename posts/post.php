<?php 

require_once "../scripts/functions.php";
$title =  display_post_title(get_url_slug());



if (!isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ../layout/blog.php');
    exit;
} else {
    include "../layout/header.php";
    
    require_once "../commenting.php";
display_single_post(get_url_slug());

//display_comments
display_comments();

}
 include "../layout/footer.php";
