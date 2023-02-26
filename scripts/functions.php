<?php

function login()
{
    //Session logged is set if the user is logged in ''''''''''''''''''WORKING ON IT''''''''''''''''''
    //set it to 1 if the user has successfully logged in ''''''''''''''''''WORKING ON IT''''''''''''''''''
    //if it wasn't set create a login form ''''''''''''''''''WORKING ON IT''''''''''''''''''
  
    if (empty($_SESSION['loggedin'])) {

        echo '
        <form action="scripts/login.serv.php" method="POST">

        <div class="mb-3">
          <label for="userid" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username or email account">
        </div>
        
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
        </form>
        ';
        //if session is equal to 1, display  
        //Welcome, and whaterver their user name is 
    } else {
        echo '<font style=" color:green;">Welcome, ' . $_SESSION['username'] . '</font>';
    }
}
///////////////////////////////////////////////////////////////////////


/////////////// empty signup form input validator/////////////////
//if any field is empty then it is true.
function emptySignupInput($firstname, $lastname, $username, $email, $password, $passwordrepeat, $tos)
{
    $result="";

    if (empty($firstname) || empty($lastname)|| empty($username)|| empty($email)|| empty($password) || empty($passwordrepeat)|| empty($tos)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// check if username is valid 
function invalidUsername($username){
    $result="";
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

// check if email is valid 
function invalidEmail($email){
    $result="";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

// check if passwords are matching password and passwordrepeat 
function passwordMatch($password, $passwordrepeat){
    $result="";
    if ($password !==  $passwordrepeat) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}


//////////////////////////////////user exists
function usernameExists($con, $username, $email){
$query = " SELECT * FROM users WHERE username = ? OR email = ?;"; //query db and wait for values after validation to avoid injections per my understanding.

//initialize or prepare a statement 
//to check without executing the input before validation
$stmt = mysqli_stmt_init($con); 


if (!mysqli_stmt_prepare($stmt, $query)) {
header('Location: ../signup.php?error=queryfail');
exit();

}
//add data after validation success
mysqli_stmt_bind_param($stmt, "ss", $username, $email);
mysqli_stmt_execute($stmt);

$stmtResult = mysqli_stmt_get_result($stmt);

//check if there is result and assign it to a variable as an array
if ($row= mysqli_fetch_assoc($stmtResult)){
    return $row;
}else {
    $result = false;
    return $result;

}
//close the prepared statement
mysqli_stmt_close($stmt);

}


//////////////////////////////////user creation
function createUser($con, $firstname, $lastname, $username, $email, $password){

    //query db and wait for values after validation to avoid injections per my understanding.
    $query = " INSERT INTO users (fname, lname, username, email, password) 
    VALUES (?, ?, ?, ?, ?)"; 
    //initialize or prepare a statement 
    //to check without executing the input before validation
    $stmt = mysqli_stmt_init($con); 
    
    // check if the query fails and throw an error in the url
    if (!mysqli_stmt_prepare($stmt, $query)) {
    header("Location: ../signup.php?error=queryfail");
    exit();
    }
    //let's encrypt the password before inserting the data
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //if it does not fail then we continue to bind the parameters
    //add data after validation success and add the hashed version of the pwd
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);

    //close the prepared statement and direct to login page
    mysqli_stmt_close($stmt);

   // start a session to carry the error/success message to the header location
    session_start();
    $_SESSION['message'] = "Thank you and welcome to LFC Fan Club <br> Please login!";

    header('Location: ../login.php?error=none');
    exit();
    
    }


//////////////////////login functions

// empty login form input validator
function emptyLoginInput($username, $password)
{
    $result="";

    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

////////////////////////////////////////////////// user login

function userLogin($con, $username, $password){
    $userExists = usernameExists($con, $username, $username);

    if ($userExists === false){
        session_start(); 
        $_SESSION['message'] = "No such user exists"; 

        header("Location: ../login.php?error=invalidlogin");
        exit();

    }

    $hashedPassword = $userExists['password'];

    $passwordCheck = password_verify($password, $hashedPassword);

    if ($passwordCheck === false){
        session_start(); 
        $_SESSION['message'] = "Invalid username or password"; 
        
        header("Location: ../login.php?error=wronglogininfo");
        exit();

        //if all is good start a logged in session
    } else if ($passwordCheck === true){
        session_start(); 
        $_SESSION['username'] = $userExists['username']; 
        $_SESSION['loggedin'] = true; 
        $_SESSION['message'] = "Welcome ". $_SESSION['username'];  

        header('Location: ../userprofile.php');
        exit();
    }  



}


//////////////////////////////////user creation
function createPost($con, $title, $slug, $content, $author){

    //query db and wait for values after validation to avoid injections per my understanding.
    $query = " INSERT INTO posts (title, slug, content, author) VALUES (?, ?, ?, ?, ?)"; 
    //intialize con 
    $stmt = mysqli_stmt_init($con); 
    
    // check if the query fails and throw an error in the url
    if (!mysqli_stmt_prepare($stmt, $query)) {
    header("Location: ../signup.php?error=queryfail");
    exit();
    }
    //let's encrypt the password before inserting the data
    $author = $_SESSION(['role']);

    //if it does not fail then we continue to bind the parameters
    //add data after validation success and add the hashed version of the pwd
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);

    //close the prepared statement and direct to login page
    mysqli_stmt_close($stmt);

   // start a session to carry the error/success message to the header location
    session_start();
    $_SESSION['message'] = "Thank you and welcome to LFC Fan Club <br> Please login!";

    header('Location: ../login.php?error=none');
    exit();
    
    }