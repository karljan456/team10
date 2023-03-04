<?php
session_start();
if (isset($_SESSION['loggedin'])){
  header('Location: userprofile.php');
  exit();
} 
include "../layout/header.php";?>

<div>
<?php include "../scripts/messages.php";?>

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

<div class="mb-3"><hr>
<a href="signup.php">Register </a>&nbsp;
<a href="passwordreset.php">Reset Password</a>
</div>

</form>

</div>




<?php include "../layout/footer.php";?>