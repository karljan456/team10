<?php

function loggedIn()
{
    //Session logged is set if the user is logged in 
    //set it to 1 if the user has successfully logged in 
    //if it wasn't set create a login form 
    if (!$_SESSION['loggd']) {

        echo '
        <form>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username or Email</label>
          <input type="email" class="form-control" id="email" name="userid">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        ';
        //if session is equal to 1, display  
        //Welcome, and whaterver their user name is 
    } else {
        echo '<font style=" color:green;">Welcome, ' . $_SESSION['username'];
    }
}



// empty input validator
function emptyLoginInput($username, $password)
{
    $result;

    if (empty($username) || empty($password)) {
        $result = true;
    } else {
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
header("Location: ../signup.php?error=queryfail");
exit();

}
//add data after validation success
mysqli_stmt_bind_param($stmt, "ss", $username, $email);
mysqli_stmt_execute($stmt);

$stmtResult = mysqli_stmt_get_result($stmt);

//check if there is result and assign it to a vriable as an array

if ($row= mysqli_fetch_assoc($stmtResult)){
    return $row;
}else {
    $result = false;
    return $result;

}

//close the prepared statement
mysqli_stmt_close($stmt);

}




////////////////////////////////////////////////// user login
function userLogin($con, $username, $password){
    $userExists = usernameExists($con, $username, $username);

    if ($userExists === false){
        header("Location: ../login.php?error=invalidlogin");
        exit();

    }

    $hashedPassword = $userExists['password'];

    $passwordCheck = password_verify($password, $hashedPassword);

    if ($passwordCheck === false){
        header("Location: ../login.php?error=wronglogininfo");
        exit();

        //if all is good start a logged in session
    } else if ($passwordCheck === true){
        session_start(); 
        $_SESSION['id'] = $userExists['id']; 
        $_SESSION['username'] = $userExists['username']; 

        header("Location: ../index.php");
        exit();
        

    }

}
