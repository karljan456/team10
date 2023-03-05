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
    if ($password !==  $passwordrepeat) {
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
        $_SESSION['loggedin'] = true;

        $_SESSION['message'] = "Welcome " . $_SESSION['username'];
        header('Location: ../users/userprofile.php');
        exit();
    }

/////////////////////////////////////////////////////
    //////////////////////////////////article functions etc
    //////////////////////////////////post creation
    function createPost($con, $title, $slug, $content, $excerpt, $author)
    {

        //query db and wait for values after validation to avoid injections per my understanding.
        $query = "INSERT INTO posts (title, slug, content, excerpt, author) VALUES (?, ?, ?, ?, ?)";
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
        mysqli_stmt_bind_param($stmt, "sssss", $title, $slug, $content, $excerpt, $author);
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
/////////////////////////////

// function to display posts
function display_posts() {
    // connect to database
  require_once "../assets/plugins/connect.php";

    // select posts from database
    $sql = "SELECT * FROM posts";
    $result = $con->query($sql);

    // loop through each post
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // display post content within Bootstrap HTML card 
            echo '<div class="card mb-3 col-md-4">';
            echo '<a href="/team10/posts/post.php?slug='. $row["slug"] .'"><img class="card-img-top" src="'. $row["featured_image"] .'")" alt="Card image" width="auto" height="auto"></a>';
            echo '<div class="card-body">';
            echo '<h1 class="card-title">' . $row["title"] . '</h1>';
            echo '<p class="card-text">' . $row["excerpt"] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }

    // close connection
    $con->close();
}
/////////////////////////////////////////////////////
// function to display single post using the slug in url
function display_single_post($slug) {
        // connect to database
        $slug = get_url_slug();
  require_once "../assets/plugins/connect.php";

 
    // Retrieve the post from the database
    $sql = "SELECT * FROM posts WHERE slug = '$slug'";
    $result = mysqli_query($con, $sql);

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
        echo "<div class='featured-image'><img src='$featured_image' alt='$post_title' width='auto' height='400px'></div>";
        echo "<div class='title'><h2><a href='/post/$slug'>$post_title</a></h2></div>";
        echo "<div class='content'>$post_content</div>";
        echo "<div class='author-box'>Written by $post_author</div>";
        echo "<div class='category'><a href='/posts/category/$category_slug'>$post_category</a></div>";
        echo "</div>";
    } else {
        echo "Post not found";
    }

    // Close the database connection
    $con->close();
}


////////////////////////////////////////
// get post slug from the current url
function get_url_slug() {

       // Get query string from URL
       $queryString = $_SERVER['QUERY_STRING'];

       // Parse query string and get slug
       parse_str($queryString, $queryParams);
       //ternary if else in oneline lol we are going places
       $slug = isset($queryParams['slug']) ? $queryParams['slug'] : '';
   
       // Return slug
       return $slug;
   }

//get the last part of a url aka category name for example
   function get_category_name() {
    $url = $_SERVER['REQUEST_URI'];
    $path = parse_url($url, PHP_URL_PATH);
    $segments = explode('/', trim($path, '/'));
    return end($segments);
}


// get post title
function display_post_title($slug) {
    require_once "../assets/plugins/connect.php";

    // Retrieve post title by ID
    $slug= get_url_slug();
    $result = $con->query("SELECT title FROM posts WHERE slug = '$slug'");
    $post = $result->fetch_assoc();
    $title = '<h1>' . $post['title'] . '</h1>';

    // Display post title
    return $title;
}
 ////////////////////////////////////////////////
   // Function to retrieve and display posts by category

   function display_posts_by_category($category) {
    require_once "../assets/plugins/connect.php";

    $category = get_category_name();

    // Get category slug from URL
    $category_slug = basename($_SERVER['REQUEST_URI']);

    // Display category name
    echo '<h1>' . $category['name'] . '</h1>';

    $posts_result = $con->query("SELECT * FROM posts WHERE category_id = '$category_id'");

    // Display posts
    while ($post = $posts_result->fetch_assoc()) {
        echo '<h2>' . $post['title'] . '</h2>';
        echo '<p>' . $post['content'] . '</p>';
    }
}


/////////////////////////////////////////////////////
//display comments by post
