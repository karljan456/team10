<?php 
require_once "../scripts/functions.php";
$title =  display_post_title(get_url_slug());

include "../layout/header.php";

display_single_post(get_url_slug());

//display_comments


 include "../layout/footer.php";
