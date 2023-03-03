<?php
//page title and
//Welcome message by username
if (!empty($_SESSION['username'])) {
    $title = "Welcome Back, ". $_SESSION['username'];
} else {
    $title = 'Welcome Back';
}

include "layout/header.php";
include "scripts/messages.php";
include_once "scripts/functions.php";
?>

<?php
    
   //display content if logged in
if (!empty($_SESSION['user_role']) == "administrator"):
?>

<div class="col-md-4">

<ul id="side-nav">
<li><a href="">Create Post</a></li>
<li><a href="#">Main Item 2</a></li>
<li><a href="#">Main Item 3</a></li>
<li><a href="#">Main Item 4</a></li>
    </ul>

</ul>
</div> 


<div class="col-md-8 justify-content-end">
<?php include "scripts/profile.serv.php"; ?>
</div> 

<?php 
else :
    $_SESSION['message'] = "Please Login to view your profile";
    login();
    endif;
?>



<?php include "layout/footer.php"; ?>

