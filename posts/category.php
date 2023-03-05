<?php 
$title = ucfirst(get_category_name());
include "../layout/header.php";
require_once "../scripts/functions.php";

display_posts_by_category(get_category_name());

//display_comments


include "../layout/footer.php";
