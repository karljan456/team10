<?php

function login()
{
    //Session logged is set if the user is logged in ''''''''''''''''''WORKING ON IT''''''''''''''''''
    //set it to 1 if the user has successfully logged in ''''''''''''''''''WORKING ON IT''''''''''''''''''
    //if it wasn't set create a login form ''''''''''''''''''WORKING ON IT''''''''''''''''''

    if (empty($_SESSION['loggedin'])) {

        echo '
        <form action="../scripts/login.serv.php" method="POST">

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
        <div class="mb-3"><hr>
<a href="/team10/users/signup.php">Register </a>&nbsp;
<a href="/team10/users/passwordreset.php">Reset Password</a>
</div>
        ';
        //if session is equal to 1, display  
        //Welcome, and whaterver their user name is 
    } else {
        echo '<font style=" color:green;">Welcome, ' . $_SESSION['username'] . '</font>';
    }
}

//simple login form e.g for comment section
function mini_login() {
        if (empty($_SESSION['loggedin'])) {
            echo '<div class="my-5 article-container container-fluid"><hr class="w-75 my-4">';
            echo '<form class="form-inline" action="../scripts/login.serv.php" method="POST">';
            echo '<div class="form-row align-items-center">';
            echo '<div class="col-md-4">';
            echo '<input type="text" class="form-control mb-2" name="username" placeholder="Username" required>';
            echo '<input type="password" class="form-control mb-2" name="password" placeholder="Password" required>';
            echo '<button type="submit" class="btn btn-primary mb-2">Login</button>';
            echo '</div>';
            echo '</div>';
            echo '</form>';
            echo '<hr class="w-75 my-4"></div>';
        }
    }
    
    
///////////////////////////////////////////////////////////////////////


/////////////// empty signup form input validator/////////////////
//if any field is empty then it is true.
function emptySignupInput($firstname, $lastname, $username, $email, $password, $passwordrepeat, $tos)
{

    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($passwordrepeat) || empty($tos)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//check if name is longer than varchar 50
function checkNameLength($firstname, $lastname) {
    if (strlen($firstname) > 50 || strlen($firstname) > 50) {
        return true;
    }
    return false;
    }

// check if username is valid 
function invalidUsername($username)
{
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
    $query = " SELECT * FROM users WHERE username = ? OR email = ?;";
    //query db and wait for values after validation to avoid injections per my understanding.

    //initialize or prepare a statement 
    //to check without executing the input before validation
    $stmt = mysqli_stmt_init($con);


    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../users/signup.php?error=queryfail");
        exit();
    }
    //add data after validation success
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $stmtResult = mysqli_stmt_get_result($stmt);

    //check if there is result and assign it to a variable as an array
    if ($row = mysqli_fetch_assoc($stmtResult)) {
        mysqli_stmt_close($stmt);
        return $row;
        
    } else {
        $result = false;
        mysqli_stmt_close($stmt);
        return $result;
    }
    //close the prepared statement
    
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
        header("Location: ../users/signup.php?error=queryfail");
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

    header('Location: ../users/login.php?error=none');
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

        header("Location: ../users/login.php?error=invalidlogin");
        exit();
    }

    $hashedPassword = $userExists['password'];

    $passwordCheck = password_verify($password, $hashedPassword);

    if ($passwordCheck === false) {
        session_start();
        $_SESSION['message'] = "Invalid username or password";

        header("Location: ../users/login.php?error=wronglogininfo");
        exit();

        //if all is good start a logged in session
    } else if ($passwordCheck === true) {

        session_start();
        // get user role
        $_SESSION['role'] = $userExists['role'];

        if ($_SESSION['role'] == 'administrator') {
            // Set the "admin" session variable to true
            $_SESSION['admin'] = true;
        }
        $_SESSION['user_role'] = $userExists['role'];
        $_SESSION['username'] = $userExists['username'];
        $_SESSION['user_id'] = $userExists['user_id'];
        $_SESSION['loggedin'] = true;

        $_SESSION['message'] = "Welcome " . $_SESSION['username'];
        header('Location: ../users/userprofile.php');
        exit();
    }

    /////////////////////////////////////////////////////
    //////////////////////////////////article functions etc
    //////////////////////////////////post creation

    function createPost($title, $slug, $content, $excerpt, $category, $featured_image, $author)
    {
        //connect to db and load the functions
        require_once "../assets/plugins/connect.php";

        //query db and wait for values after validation to avoid injections per my understanding.
        $query = "INSERT INTO posts (title, slug, content, excerpt, category, featured_image, author) VALUES (?, ?, ?, ?, ?, ?, ?)";
        //intialize con 
        $stmt = mysqli_stmt_init($con);

        // check if the query fails and throw an error in the url + a session
        if (!mysqli_stmt_prepare($stmt, $query)) {
            // start a session to carry the error/success message to the header location
            session_start();
            $_SESSION['message'] = "DB Query Error";
            header("Location: ../posts/createpost.php?error=queryfail");
            exit();
        }

        //if it does not fail then we continue to bind the parameters
        mysqli_stmt_bind_param($stmt, "sssssss", $title, $slug, $content, $excerpt, $category, $featured_image, $author);
        mysqli_stmt_execute($stmt);

        //close the prepared statement and direct to the 'All post view'  page
        mysqli_stmt_close($stmt);

        // start a session to carry the error/success message to the header location
        session_start();
        $_SESSION['message'] = "Article is Published Successfully";
        header('Location: ../posts/postview.php?error=none');
        exit();
    }
}

//////////////////////////////////////////////
////////image upload function
function saveImage($fileInput) {
    // Check if file input is set
    if (!isset($fileInput)) {
        return 'No file input received.';
    }

    // Check for errors in file input
    if ($fileInput['error'] !== UPLOAD_ERR_OK) {
        return 'File input error: ' . $fileInput['error'];
    }

    // Check if uploaded file is an image
    $fileType = exif_imagetype($fileInput['tmp_name']);
    $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
    if (!in_array($fileType, $allowedTypes)) {
        return 'Uploaded file is not an image.';
    }

    // Generate unique filename for the image
    $fileName = uniqid() . '.' . pathinfo($fileInput['name'], PATHINFO_EXTENSION);

    // Set path for image
    $imagePath = '../assets/images/' . $fileName;

    // Move uploaded file to image path
    if (!move_uploaded_file($fileInput['tmp_name'], $imagePath)) {
        return 'Error moving uploaded file.';
    }

    // Return image path
    return $imagePath;
}

/////////////////////////////

// function to display posts
function display_posts()
{
    // connect to database
    require "../assets/plugins/connect.php";

    // select posts from database
    $sql = "SELECT * FROM posts";
    $result = $con->query($sql);

    // loop through each post
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // display post content within Bootstrap HTML card 
            echo '<div class="card mb-3 col-md-6 text-center"><a href="/team10/posts/post.php?slug=' . $row["slug"] . '">';
            echo '<a href="/team10/posts/post.php?slug=' . $row["slug"] . '"><img class="card-img-top" src="' . $row["featured_image"] . '")" alt="Card image" width="auto" height="auto"></a>';
            echo '<div class="card-body">';
            echo '<h1 class="card-title">' . $row["title"] . '</h1>';
            echo '<p class="card-text text-dark mb-3">' . $row["excerpt"] . '</p>';
            echo '<a href="/team10/posts/post.php?slug=' . $row["slug"] . '">Read more..</a>';
            echo '</div>';
            echo '</div></a>';
        }
    } else {
        echo "0 results";
    }

    // close connection
    $con->close();
}
/////////////////////////////////////////////////////
// function to display single post using the slug in url
function display_single_post($slug)
{
    // connect to database

    include "../assets/plugins/connect.php";

    $slug = get_url_slug();
    // Retrieve the post from the database
    $sql = "SELECT * FROM posts WHERE slug = '$slug'";
    $result = $con->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $post_title = $row['title'];
        $post_content = $row['content'];
        $post_author = $row['author'];
        $featured_image = $row['featured_image'];
        $post_category = $row['category'];
        $category_slug = strtolower($post_category);


        // Display the post
        echo "<div class='post article-container'>";
        echo "<div class='featured-image mb-1'><img src='$featured_image' alt='$post_title' width='auto' height='auto'></div>";
        echo "<div class='title mt-1'><h2><a href='/post/$slug'>$post_title</a></h2></div>";
        echo "<div class='content'>$post_content</div>";
        echo "<div class='author-box'>Written by $post_author</div>";
        echo "<div class='category'><a href='/team10/posts/category.php?category=$category_slug'>$post_category</a></div>";
        echo "</div>";
    } else {
        echo "Post not found";
    }

    // Close the database connection
    $con->close();
}

//////////////////////////////////////
// Function to get categories from the database and display them as a select list
function get_categories_select() {
    // Connect to the database
    require_once "../assets/plugins/connect.php";

    // Fetch the categories from the database
    $sql = "SELECT id, title FROM post_categories";
    $result = $con->query($sql);

    // declare variable
    $checkboxes = '';

    // Display each category as an option in the select element
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $checkboxes .= '<div class="form-check form-check-inline">';
            $checkboxes .= '<input class="form-check-input" type="checkbox" name="categories[]" id="category-' . $row['id'] . '" value="' . $row['id'] . '">';
            $checkboxes .= '<label class="form-check-label" for="category-' . $row['id'] . '">' . $row['title'] . '</label>';
            $checkboxes .= '</div>';
        }
    }

    // Close the database connection
    $con->close();

    // Return the options string
    return $checkboxes;
}


////////////////////////////////////////
// get post slug from the current url
function get_url_slug()
{
    // Get query string from URL
    $queryString = $_SERVER['QUERY_STRING'];

    // Parse query string and get slug
    parse_str($queryString, $queryParams);
    //ternary if else in oneline lol we are going places
    $slug = isset($queryParams['slug']) ? $queryParams['slug'] : '';

    // Return slug
    return $slug;
}

function get_url_category_slug()
{
    // Get query string from URL
    $queryString = $_SERVER['QUERY_STRING'];

    // Parse query string and get slug
    parse_str($queryString, $queryParams);
    //ternary if else in oneline lol we are going places
    $slug = isset($queryParams['category']) ? $queryParams['category'] : '';

    // Return slug
    return $slug;
}



// get post title 
//used this function to display a dynamic page title
function display_post_title($slug)
{
    require_once "../assets/plugins/connect.php";

    // Retrieve post title by ID
    $slug = isset($queryParams['category']) ? $queryParams['category'] : '';

    $slug = get_url_slug();
    $result = $con->query("SELECT title FROM posts WHERE slug = '$slug'");
    $post = $result->fetch_assoc();
    $title = $post['title'];

    // Display post title
    return $title;
}
////////////////////////////////////////////////
//////display post categories
function displayCategories() {
    // Include the database connection file
    include "../assets/plugins/connect.php";

    // Build the SQL query to retrieve the categories
    $sql = "SELECT * FROM post_categories";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if there are any categories
    if (mysqli_num_rows($result) > 0) {
        // Initialize a counter for the cards
        $card_counter = 0;

        // Start a row
        echo '<div class="row">';

        // Loop through the categories and display each one as a card
        while ($row = mysqli_fetch_assoc($result)) {
            // Increment the card counter
            $card_counter++;

            // Extract the slug, featured image, title, and description
            $slug = $row['slug'];
            $featured_image = $row['featured_image'];
            $title = $row['title'];
            $description = $row['description'];

            // Limit the description to 32 words
            $description_excerpt = substr($description, 0, strpos($description, ' ', 52));

            // Build the card HTML with a link to the category's post page
            $card_html = '<div class="col-md-4">';
            $card_html .= '<div class="card">';
            $card_html .= '<a href="/team10/posts/category.php?category=' . $slug . '">';
            $card_html .= '<img class="card-img-top" src="' . $featured_image . '" alt="' . $title . '">';
            $card_html .= '</a>';
            $card_html .= '<div class="card-body">';
            $card_html .= '<h5 class="card-title">';
            $card_html .= '<a href="/team10/posts/post.php?slug=' . $slug . '">' . $title . '</a>';
            $card_html .= '</h5>';
            $card_html .= '<p class="card-text">' . $description_excerpt . '</p>';
            $card_html .= '</div>';
            $card_html .= '<div class="card-footer">';
            $card_html .= '<a href="/team10/posts/category.php?category=' . $slug . '">Read More</a>';
            $card_html .= '</div>';
            $card_html .= '</div>';
            $card_html .= '</div>';

            // Display the card HTML
            echo $card_html;

            // Check if the card counter is a multiple of 3
            if ($card_counter % 3 == 0) {
                // End the row and start a new one
                echo '</div>';
                echo '<div class="row">';
            }
        }

        // End the last row
        echo '</div>';
    } else {
        // Display a message if there are no categories
        echo "No categories found.";
    }

    // Close the MySQLi connection
    mysqli_close($con);
}



// Function to retrieve and display posts by category
function display_posts_by_category()
{
    $category = get_url_category_slug();
    // connect to database
    require "../assets/plugins/connect.php";

    // select posts from database
    $sql = "SELECT * FROM posts where category = '$category'";
    $result = $con->query($sql);

    // loop through each post
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // display post content within Bootstrap HTML card 
            echo '<div class="card mb-3 col-md-4 text-center"><a href="/team10/posts/post.php?slug=' . $row["slug"] . '">';
            echo '<a href="/team10/posts/post.php?slug=' . $row["slug"] . '"><img class="card-img-top" src="' . $row["featured_image"] . '")" alt="Card image" width="auto" height="auto"></a>';
            echo '<div class="card-body">';
            echo '<h1 class="card-title">' . $row["title"] . '</h1>';
            echo '<p class="card-text text-dark mb-3">' . $row["excerpt"] . '</p>';
            echo '<a href="/team10/posts/post.php?slug=' . $row["slug"] . '">Read more..</a>';
            echo '</div>';
            echo '</div></a>';
        }
    } else {
        echo "There is no posts in this category yet. $category";
    }

    // close connection
    $con->close();
}





/////////////////////////////////////////////////////
//display comments by post
/////////////////////////////// league table 

// Showing data for the current season 
function printLiveTable($url, $table)
{
    echo "<table class=\"tables\">
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

        include 'assets/plugins/connect.php';

        // Putting the data into the database
        $insert = "INSERT INTO `" . $table . "` (`Pos`, `Team`, `Pld`, `W`, `D`, `L`, `GF`, `GA`, `GD`, `Pts`) VALUES ('$Pos', '$Team',
         '$Pld', '$W', '$D', '$L', '$GF', '$GA', '$GD', '$Pts')";


        $con->query($insert);
    }

    printData($table, $con);

    // Deleting data so it will be renewed with the newer one when it is available
    $delete = "DELETE FROM team10_lfc." . $table . "";

    $con->query($delete);

    $con->close();
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

    include 'assets/plugins/connect.php';

    echo "<table class=\"tables\">
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
           <th>PTS</th>
          </tr> <tbody class=\"\">";
    printData($table, $con);

    $con->close();
}

// Printing the data from database 
function printData($table, $con)
{
    // Getting data from the database and printing it out  
    $read = "SELECT * FROM `" . $table . "`";
    $result = $con->query($read);
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
                    </tr>";
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
            </tr>";
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

        echo " </tbody>
        </table>";

    } else {

        echo "No data to display";

    }
}




// Functions to print the logo of the compettions
function printEplLogo()
{

    echo '<img src="assets\images\epl_logo.png" alt="epl logo" class="competition-logo-container">';

}

function printUclLogo()
{
    echo '<img src="assets\images\ucl_logo.png" alt="epl logo" class="competition-logo-container">';
}





// Functions to print out the names of the competitons
function printEpl($season)
{

    switch ($season) {

        case "s23":
            echo '<h1 id="league-title">English Premier League Season 2022/23</h1>';
            break;
        case "s22":
            echo '<h1 id="league-title">English Premier League Season 2021/22</h1>';
            break;

        default:
            echo "Error";

    }

}

function printUcl($season)
{

    switch ($season) {

        case "s23":
            echo '<h1 id="league-title">UEFA Champions League Season 2022/23</h1>';
            break;
        case "s22":
            echo '<h1 id="league-title">UEFA Champions League Season 2021/22</h1>';
            break;

        default:
            echo "Error";

    }

}