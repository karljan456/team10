<?php 
include "header.php";
require_once "../scripts/functions.php";
display_post("get_url_slug()");

display_comments(get_post_id(get_url_slug()));

include "footer.php";
