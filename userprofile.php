<?php
//page title and
//Welcome message by username
if (!empty($_SESSION['username'])) {
    $title = 'Welcome, ' . $_SESSION['username'];
} else {
    $title = 'Welcome Back';
}
include "layout/header.php";
include "scripts/messages.php";
include_once "scripts/functions.php";



//display content if logged in
if (!empty($_SESSION['loggedin'])) {
    echo '
    

<div class="col w-75 py-5">

    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu pellentesque orci. Curabitur vel luctus
        dolor. Duis eu nisl sed mi pharetra iaculis. Maecenas nec lorem ac felis congue lobortis. Suspendisse
        imperdiet non ligula in hendrerit. Fusce bibendum mollis leo ut laoreet. Proin iaculis dolor commodo mi
        interdum auctor. Nam vehicula posuere elementum. Mauris ex lacus, sollicitudin et varius quis, dignissim ut
        velit.
        </p>

</div>



';
} else {
    $_SESSION['message'] = "Please Login to view your profile";
    login();
}

include "layout/footer.php";
