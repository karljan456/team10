<?php include "layout/header.php";?>

<div class="signup-form">
<form action="../scripts/signup.serv.php" method="POST">
<div class="mb-3">
    <label for="firstname" class="form-label" >First name</label>
    <input type="text" class="form-control" id="firstname" name="firstname" required>
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label" >Last name</label>
    <input type="text" class="form-control" id="lastname" name="lastname" required>
  </div>
  <div class="mb-3">
    <label for="username" class="form-label" >Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label" >Email address</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>

  <div class="mb-3">
    <label for="passwordrepeat" class="form-label">Confirm password <small>for verification</small></label>
    <input type="password" class="form-control" id="passwordrepeat" name="passwordrepeat" required>
  </div>

  <div class="mb-3 form-check">
  <label class="form-check-label" for="tos">I hearby accept LFC Fan Club <a href="tos.php" target="_blank">Terms & Conditions </a>.</label>
    <input type="checkbox" class="form-check-input" id="tos" name="tos" required>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Signup</button>
</form>
</div>




<?php include "layout/footer.php";?>