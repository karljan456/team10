<?php
// initialize variables
$firstname = $lastname = $email = $username = $password = $passwordrepeat = $tos = "";

if (isset($_POST['submit'])) {

    // connect to db and include the functions file for validation purposes and insertion after that
    require_once "../assets/plugins/connect.php";
    require_once "functions.php";

    // assign the variables on submission
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];
    $passwordrepeat = $_POST['passwordrepeat'];
    $tos = $_POST['tos'];


    // /////////// //// validate all possible input

    //if empty 
    if (emptySignupInput($firstname, $lastname, $username, $email, $password, $passwordrepeat, $tos)) {
        header('Location: ../users/signup.php?error=emptyinputfield');
        exit();
    }
     // validate if name is longer than varchar 50
     if (checkNameLength($firstname, $lastname)) {
        header('Location: ../users/signup.php?error=longname');
        exit();
    }

    // check if invalid username
    if (invalidUsername($username)) {
        header('Location: ../users/signup.php?error=invalidusername');
        exit();
    }

    // check if invalid email using the pre made function
    if (invalidEmail($email)) {
        header('Location: ../users/signup.php?error=invalidemail');
        exit();
    }

    // check if password and password confirmation match
    if (passwordMatch($password, $passwordrepeat)) {
        header('Location: ../users/signup.php?error=passwordconfirmation');
        exit();
    }

    // password length more than 7
    if (strlen($password) < 5) {
        header('Location: ../users/signup.php?error=passwordstooshort');
        exit();
    }

    // check if username exists in the db already
    if (usernameExists($con, $username, $email)) {
        header('Location: ../users/signup.php?error=usernamealreadytaken');
        exit();
    }

    // check if terms of services "TOS" is selected
    if (empty($tos)) {
        header('Location: ../users/signup.php?error=tosagreement');
        exit();
    }


////////if all validation pass then inject the data and signup////
//use the createuser() function
createUser($con, $firstname, $lastname, $username, $email, $password);


} else {
    header('Location: ../users/signup.php');
}
