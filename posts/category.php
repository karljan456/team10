<?php 
require_once "../scripts/functions.php";
$title = ucfirst(get_url_slug());
include "../layout/header.php";
require_once "../scripts/functions.php";
//if the page is accessed directly then display categories from db
if (!isset($_SERVER['HTTP_REFERER'])) {
//display all categories
displayCategories();
} else {

display_posts_by_category();
//display_comments

}
include "../layout/footer.php";
