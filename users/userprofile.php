<?php
//page title and
//Welcome message by username
if (!empty($_SESSION['username'])) {
    $title = "Welcome Back, ". $_SESSION['username'];
} else {
    $title = 'Welcome Back';
}

include "../layout/header.php";
include "../scripts/messages.php";
include_once "../scripts/functions.php";

// Display content based on the "admin" session variable
if (isset($_SESSION['admin'])) {
    // Display content for administrators
    echo ' <div class="col-md-4">

<ul id="side-nav">
<li><a href="">something for admin users</a></li>
<li><a href="/team10/posts/createpost.php">Create An Article</a></li>
<li><a href="#">Main Item 3</a></li>
<li><a href="#">Main Item 4</a></li>
    </ul>

</ul>
</div> ';

  } else {
    // Display content for non-administrators
    echo '<div class="col-md-4">

    <ul id="side-nav">
    <li><a href="">something for normal users</a></li>
    <li><a href="#">Main Item 2</a></li>
    <li><a href="#">Main Item 3</a></li>
    <li><a href="#">Main Item 4</a></li>
        </ul>
    
    </ul>
    </div> ';
  }


    
   //display content if logged in
if (!empty($_SESSION['loggedin'])):
?>




<div class="col-md-8 justify-content-end">
<?php include "../scripts/profile.serv.php"; ?>
</div> 

<?php 
elseif (!empty($_SESSION['user_role'] == "administrator")):
        
?>




<?php 
else:
    $_SESSION['message'] = "Please Login to view your profile";
    login();
    endif;
?>

<?php include "../layout/footer.php"; ?>