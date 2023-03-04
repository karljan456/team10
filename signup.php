<?php 
session_start();
if (isset($_SESSION['loggedin'])){
  header('Location: userprofile.php');
  exit();
}
include "layout/header.php"; 


?>
<script>
  function validateForm() {
    // Get form inputs
    var firstname = document.forms["signupForm"]["firstname"].value;
    var lastname = document.forms["signupForm"]["lastname"].value;
    var username = document.forms["signupForm"]["username"].value;
    var email = document.forms["signupForm"]["email"].value;
    var password = document.forms["signupForm"]["password"].value;
    var passwordrepeat = document.forms["signupForm"]["passwordrepeat"].value;

    // Check if name is empty
    if (fistname == "" || lastname == "") {
      alert("Please enter your name.");
      return false;
    }
    // Check if name is empty
    if (username == "") {
      alert("Please enter your username.");
      return false;
    }

    // Check if email is empty and valid
    if (email == "") {
      alert("Please enter your email.");
      return false;
    } else {
      // Email validation regex
      var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (!emailRegex.test(email)) {
        alert("Please enter a valid email.");
        return false;
      }
    }


  // Check if password is empty and meets complexity requirements
  if (password == "") {
    alert("Please enter your password.");
    return false;
  } else {
    // Password validation regex: at least 8 characters, 1 uppercase, 1 lowercase, and 1 number
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    if (!passwordRegex.test(password)) {
      alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.");
      return false;
    }
  }
//check if password is smaller than 6 chars
  if (password.length < 6) {
      alert("Password is too short, 6-20 charachters.");
      return false;
    }
  // Check if confirm password matches password
  if (passwordrepeat == "") {
    alert("Please confirm your password.");
    return false;
  } else if (passwordrepeat != password) {
    alert("Passwords do not match.");
    return false;
  }

  // If all fields are valid, submit form
  return true;
  }
</script>
<noscript>Your browser does not support JavaScript! </noscript>
<div class="signup-form">
  <?php include "scripts/messages.php"; ?>

  <form action="scripts/signup.serv.php" method="POST" id="signupForm" name="signupForm" onsubmit="return validateForm()">
    <div class="mb-3">
      <label for="firstname" class="form-label">First name</label>
      <input type="text" class="form-control" id="firstname" name="firstname" required>
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Last name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" required>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
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






<?php include "layout/footer.php"; ?>