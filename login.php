<?php 
//Start the session 
include "layout/header.php";
?>

<div>
<?php include "scripts/messages.php";?>

<form action="scripts/login.serv.php" method="POST">

<div class="mb-3">
  <label for="username" class="form-label">Username</label>
  <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username or email account">
</div>

<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Password</label>
  <input type="password" class="form-control" id="password" name="password">
</div>

<button type="submit" class="btn btn-primary" name="submit">Login</button>
</form>


</div>




<?php




    //work in progress
    //Call the functions file 
    //include_once "scripts/functions.php"; 
    //Display either the user's name, or the login form 
    //This can be placed on many pages without having 
    //to re-write the form everytime, just use this function 
    //loggedIn();






include "layout/footer.php";
?>