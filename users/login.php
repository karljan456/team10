<?php
if (isset($_SESSION['loggedin'])) {
  header('Location: userprofile.php');
  exit();
}
include "../layout/header.php"; ?>

<div>
  <?php include "../scripts/messages.php"; ?>

  <form action="../scripts/login.serv.php" method="POST" id="login-form">

    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username or email account">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Login</button>

    <div class="mb-3">
      <hr>
      <a href="signup.php">Register </a>&nbsp;
      <a href="passwordreset.php">Reset Password</a>
    </div>

  </form>

</div>
<!--validation-->

<script>
  const loginForm = document.getElementById('login-form');
  const usernameInput = document.getElementById('username');
  const passwordInput = document.getElementById('password');

  loginForm.addEventListener('submit', function(event) {
    // Trim whitespace from username and password inputs
    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    // Validate that inputs are not empty
    if (username === '' || password === '') {
      event.preventDefault(); // Prevent form submission
      alert('Username and password are required');
      return;
    }

    // Validate that inputs do not contain special characters
    const usernameRegex = /^[a-zA-Z0-9]+$/; // Only allow alphanumeric characters
    if (!usernameRegex.test(username)) {
      event.preventDefault(); // Prevent form submission
      alert('Username must only contain letters and numbers');
      return;
    }

    // Password validation can be added here as well

    // If validation passes, the form will submit normally
  });
</script>



<?php include "../layout/footer.php"; ?>