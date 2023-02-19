<?php 


if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    //connect to db
    require_once "../assets/plugins/connect.php";

    //load the functions file to validate etc..
    include_once "../scripts/functions.php";

    // check if any input field is empty
    if (emptyLoginInput($username, $password) !== false){

        header ("Location: ../login.php?error=emptyinputfield");
        exit();
    }

    //use the login function
    userLogin($con, $username, $password);

} 
else {
    header ("Location: ../login.php");
        exit();
}