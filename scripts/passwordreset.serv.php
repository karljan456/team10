<?php
session_start();



// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the user's email address
  $email = $_POST['email'];

  // Generate a new password
  $new_password = generate_password();

  // Hash the password
  $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Include the database connection file
include "../assets/plugins/connect.php";

  // Update the user's password in the database
  $update_query = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
  $result = mysqli_query($conn, $update_query);

  if ($result) {
    // Password reset successful
    $_SESSION['message'] = "Your password has been reset. Check your email for the new password.";
    send_email($email, $new_password);
  } else {
    // Password reset failed
    $_SESSION['error'] = "Password reset failed. Please try again.";
  }

  // Redirect to the login page
  header("Location: ../login.php");
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
In this example, we first start the session using session_start(), and then include a file that contains the database connection details.

When the form is submitted, we retrieve the user's email address from the form and generate a new password using the generate_password() function. We then hash the new password using the password_hash() function and update the user's password in the database using an SQL UPDATE statement.

If the password update is successful, we send an email to the user with the new password using the send_email() function and display a success message to the user. If the password update fails, we display an error message to the user.

The generate_password() function generates a new password of length 10 with both uppercase and lowercase letters and digits.

The send_email() function sends an email to the user with the new password using the PHP mail() function. The email contains the new password and is sent from the email address "admin@example.com".

Note that this is just an example and it's important to ensure that you implement proper security measures to prevent unauthorized access to the password reset functionality.





