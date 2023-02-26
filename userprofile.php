<?php
//page title and
//Welcome message by username
if (!empty($_SESSION['username'])) {
    $title = 'Welcome, ' . $_SESSION['username'];
} else {
    $title = 'Welcome Back';
}

include "layout/header.php";
include "scripts/messages.php";
include_once "scripts/functions.php";



//display content if logged in
if (!empty($_SESSION['loggedin']) && !empty($_SESSION['admin'])) {
    echo '
    
<div class="container">
  <div class="col-md-4">

  <ul id="nav">
  <li><a href="">Create Post</a></li>
  <li><a href="#">Main Item 2</a>
      <ul>
          <li><a href="#">Sub Item</a></li>
          <li><a href="#">Sub Item</a></li>
          <li><a href="#">SUB SUB LIST »</a>

              </li>
      </ul>
      </li>
      <li><a href="#">Main Item 3</a></li>
</ul>



  <div class="col-md-4">
  </div>

  <div class="col-md-4">
  </div>
  
  
  
  
</div>




';
} else {
    $_SESSION['message'] = "Please Login to view your profile";
    login();
}

include "layout/footer.php";
