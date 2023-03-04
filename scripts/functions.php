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
function emptySignupInput($firstname, $lastname, $email, $password, $passwordrepeat, $tos)
{
    $result = "";

    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($passwordrepeat) || empty($tos)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// check if username is valid 
function invalidUsername($username)
{
    $result = "";
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// check if email is valid 
function invalidEmail($email)
{
    $result = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// check if passwords are matching password and passwordrepeat 
function passwordMatch($password, $passwordrepeat)
{
    $result = "";
    if ($password !== $passwordrepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


//////////////////////////////////user exists
function usernameExists($con, $username, $email)
{
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

    //check if there is result and assign it to a variable as an array
    if ($row = mysqli_fetch_assoc($stmtResult)) {
        return $row;
    } else {
        $result = false;
        return $result;

    }
    //close the prepared statement
    mysqli_stmt_close($stmt);

}


//////////////////////////////////user creation
function createUser($con, $firstname, $lastname, $username, $email, $password)
{

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
    $result = "";

    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

////////////////////////////////////////////////// user login

function userLogin($con, $username, $password)
{
    $userExists = usernameExists($con, $username, $username);

    if ($userExists === false) {
        session_start();
        $_SESSION['message'] = "No such user exists";

        header("Location: ../login.php?error=invalidlogin");
        exit();

    }

    $hashedPassword = $userExists['password'];

    $passwordCheck = password_verify($password, $hashedPassword);

    if ($passwordCheck === false) {
        session_start();
        $_SESSION['message'] = "Invalid username or password";

        header("Location: ../login.php?error=wronglogininfo");
        exit();

        //if all is good start a logged in session
    } else if ($passwordCheck === true) {
        session_start();
        $_SESSION['username'] = $userExists['username'];
        $_SESSION['loggedin'] = true;
        $_SESSION['message'] = "Welcome " . $_SESSION['username'];

        header('Location: ../index.php');
        exit();
    }



}



/////////////////////////////// league table 

// Showing data for the current season 
function printLiveTable($url, $table)
{
    echo "<table class=\"table\">
    <tr>
   <th>POSTION</th>
   <th>TEAM</th>
   <th>PLAYED</th>
   <th>WON</th>
   <th>DRAWN</th>
   <th>LOST</th>
   <th>GF</th>
   <th>GA</th>
   <th>GD</th>
   <th>Pts</th>
  </tr>";
    $data = getData($url);
    $i = 0;
    // Going through the array with data 
    for ($i = 1; $i < count($data); $i++) {

        list($Pos, $Team, $Pld, $W, $D, $L, $GF, $GA, $GD, $Pts) = $data[$i];

        include 'edvin_db.php';

        // Putting the data into the database
        $insert = "INSERT INTO `" . $table . "` (`Pos`, `Team`, `Pld`, `W`, `D`, `L`, `GF`, `GA`, `GD`, `Pts`) VALUES ('$Pos', '$Team',
         '$Pld', '$W', '$D', '$L', '$GF', '$GA', '$GD', '$Pts')";


        $conn->query($insert);
    }

    printData($table, $conn);

    // Deleting data so it will be renewed with the newer one when it is available
    $delete = "DELETE FROM tables." . $table . "";

    mysqli_query($conn, $delete);

    $conn->close();
}

// reading online CSV file from the server
function getData($url)
{
    $array = [];
    if (($handle = fopen($url, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {

            $array[] = $data;

        }
        fclose($handle);
        return $array;
    } else
        die("Problem reading csv");
}

// Printing the data for the previous competitons 
function printTable($table)
{

    include 'edvin_db.php';
    echo "<table class=\"table\">
            <tr>
           <th>POSTION</th>
           <th>TEAM</th>
           <th>PLAYED</th>
           <th>WON</th>
           <th>DRAWN</th>
           <th>LOST</th>
           <th>GF</th>
           <th>GA</th>
           <th>GD</th>
           <th>Pts</th>
          </tr>";
    printData($table, $conn);

    $conn->close();
}

// Printing the data from database 
function printData($table, $conn)
{
    // Getting data from the database and printing it out  
    $read = "SELECT * FROM `" . $table . "`";
    $result = $conn->query($read);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Conditions to check if the team is Liverpool then the name will be bold and 
            // also checking if the table does not contain unwanted characters
            if (strcmp($row['Team'], "Liverpool") === 0 and str_contains($row['Pts'], '[')) {
                $points = substr($row['Pts'], 0, -3);
                echo "<tr>
                        <td><b>$row[Pos]</b></td>
                        <td><b>$row[Team]</b></td>
                        <td><b>$row[Pld]</b></td>
                        <td><b>$row[W]</b></td>
                        <td><b>$row[D]</b></td>
                        <td><b>$row[L]</b></td>
                        <td><b>$row[GF]</b></td>
                        <td><b>$row[GA]</b></td>
                        <td><b>$row[GD]</b></td>
                        <td><b>$points</b></td>
                    </tr>
                </tbody>";
            } else if (str_contains($row['Team'], '(')) {
                $team = substr($row['Team'], 0, -3);
                echo "<tr>
                    <td>$row[Pos]</td>
                    <td>$team</td>
                    <td>$row[Pld]</td>
                    <td>$row[W]</td>
                    <td>$row[D]</td>
                    <td>$row[L]</td>
                    <td>$row[GF]</td>
                    <td>$row[GA]</td>
                    <td>$row[GD]</td>
                    <td>$row[Pts]</td>
                   </tr>";
            } else if (str_contains($row['Pts'], '[')) {

                $points = substr($row['Pts'], 0, -3);
                echo "<tr>
                    <td>$row[Pos]</td>
                    <td>$row[Team]</td>
                    <td>$row[Pld]</td>
                    <td>$row[W]</td>
                    <td>$row[D]</td>
                    <td>$row[L]</td>
                    <td>$row[GF]</td>
                    <td>$row[GA]</td>
                    <td>$row[GD]</td>
                    <td>$points</td>
                   </tr>";

            } else if (strcmp($row['Team'], "Liverpool") === 0) {
                echo "<tr>
                <td><b>$row[Pos]</b></td>
                <td><b>$row[Team]</b></td>
                <td><b>$row[Pld]</b></td>
                <td><b>$row[W]</b></td>
                <td><b>$row[D]</b></td>
                <td><b>$row[L]</b></td>
                <td><b>$row[GF]</b></td>
                <td><b>$row[GA]</b></td>
                <td><b>$row[GD]</b></td>
                <td><b>$row[Pts]</b></td>
            </tr>
        </tbody>";
            } else {
                echo "<tr>
                <td>$row[Pos]</td>
                <td>$row[Team]</td>
                <td>$row[Pld]</td>
                <td>$row[W]</td>
                <td>$row[D]</td>
                <td>$row[L]</td>
                <td>$row[GF]</td>
                <td>$row[GA]</td>
                <td>$row[GD]</td>
                <td>$row[Pts]</td>
               </tr>";

            }
        }

        echo "</table>";

    } else {

        echo "No data to display";

    }
}


function printEplLogo()
{

    echo '<img src="assets\images\epl_logo.png" alt="epl logo" class="competition-logo-container">';

}

function printUclLogo()
{
    echo '<img src="assets\images\ucl_logo.png" alt="epl logo" class="competition-logo-container">';
}

function printEpl($season)
{

    switch ($season) {

        case "s23":
            echo "<h1>English Premier League Season 2022/23</h1>";
            break;
        case "s22":
            echo "<h1>English Premier League Season 2021/22</h1>";
            break;

        default:
        echo "Error";

    }

}

function printUcl($season)
{

    switch ($season) {

        case "s23":
            echo "<h1>UEFA Champions League Season 2022/23</h1>";
            break;
        case "s22":
            echo "<h1>UEFA Champions League Season 2021/22</h1>";
            break;

        default:
        echo "Error";

    }

}