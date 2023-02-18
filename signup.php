<?php include "layout/header.php";?>

<div class="signup-form">
<form action="scripts/signup.serv.php" method="post">
<div class="mb-3">
    <label for="firstname" class="form-label" >First name</label>
    <input type="text" class="form-control" id="firstname" name="firstname">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label" >Last name</label>
    <input type="text" class="form-control" id="lastname" name="lastname">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label" >Email address</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <div class="mb-3">
    <label for="repassword" class="form-label">Retype password <small>for verification</small></label>
    <input type="password" class="form-control" id="repassword" name="repassword">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">I hearby accept LFC Fan Club <a href="tos.php" target="_blank">Terms & Conditions </a>.</label>
  </div>

  <button type="submit" class="btn btn-primary">Signup</button>
</form>
</div>




<?php include "layout/footer.php";?>