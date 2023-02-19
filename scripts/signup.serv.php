<?php
// intitalize variables
$firstname =  $lastname =  $email =  $username =  $password =  $passwordrepeat =  $tos = "";

if (isset($_POST['submit'])) {

    //assign the variables on submission
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordrepeat = $_POST['passwordrepeat'];
    $tos = $_POST['tos'];

    //connect to db and include the functions file for validation purposes and insertion after that
    require_once "../assets/plugins/connect.php";
    require_once "functions.php";

    ////////////////validate all possible input///////////////////////

    //check if any field is empty using the pre definded function
    if (emptySignupInput($firstname, $lastname, $email, $password, $passwordrepeat, $tos) !== false) {
        header('Location: ../signup.php?error=emptyinputfield');
        exit();
    }

    ////check if invalid username
    if (invalidUsername($username) !== false) {
        header('Location ../signup.php?error=invalidusername');
        exit();
    }

    //check if invalid email using the pre made function
    if (invalidEmail($email) !== false) {
        header('Location ../signup.php?error=invalidemail');
        exit();
    }

    //check if password and password confirmation match
    if (passwordMatch($password, $passwordrepeat) !== false) {
        header('Location ../signup.php?error=passwordconfirmation');
        exit();
    }

    //password legnth more than 7
    if (strlen($password) < 7) {
        header('Location ../signup.php?error=passwordstooshort');
        exit();
    }

    //check if username exists in the db already
    if (usernameExists($con, $username, $email) !== false) {
        header('Location ../signup.php?error=usernamealreadytaken');
        exit();
    }

    //check if terms of services "TOS" is selected
    if (empty($tos) !== false) {
        header('Location ../signup.php?error=tosagreement');
        exit();
    }

////////if all validation pass then inject the data and signup////
//use the createuser() function
createUser($con, $firstname, $lastname, $email, $username, $password);



} else {
    header('Location: ../signup.php');
}
