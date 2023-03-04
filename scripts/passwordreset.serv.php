<?php

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the user's email address
  $email = $_POST['email'];

  require_once "functions.php";
  require_once "../assets/plugins/connect.php";
  $userExists = usernameExists($con, $email, $email);

  if ($userExists === false) {
    session_start();
      $_SESSION['message'] = 'No such user exists, Please type your email correctly or <a href="../users/signup.php">Register here</a>';

      header("Location: ../users/passwordreset.php?error=invalidlogin");
      exit();
  }
  // Generate a new password
  $new_password = generate_password();

  // Hash the password
  $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Include the database connection file
include "../assets/plugins/connect.php";

  // Update the user's password in the database
  $update_query = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
  $result = mysqli_query($con, $update_query);

  if ($result) {
    session_start();
    // Password reset successful
    $_SESSION['message'] = "Your password has been reset. Check your email for the new password.";
    send_email($email, $new_password);
  } else {
    session_start();
    // Password reset failed
    $_SESSION['message'] = "Password reset failed. Please try again.";
  }

  // Redirect to the login page
  header("Location: ../users/login.php");
  exit();
}

// Function to generate a new password
function generate_password() {
  $length = 10;
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $characters_length = strlen($characters);
  $password = '';
  for ($i = 0; $i < $length; $i++) {
    $password .= $characters[rand(0, $characters_length - 1)];
  }
  return $password;
}

// Function to send an email with the new password
function send_email($email, $password) {
  $to = $email;
  $subject = "Password Reset";
  $message = "Your new password is: $password";
  $headers = "From: admin@example.com\r\n";
  $headers .= "Reply-To: admin@example.com\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  mail($to, $subject, $message, $headers);
}