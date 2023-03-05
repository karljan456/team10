<?php 
require_once "../scripts/functions.php";
$title = ucfirst(get_url_slug());
include "../layout/header.php";
require_once "../scripts/functions.php";

display_posts_by_category();

//display_comments


include "../layout/footer.php";
