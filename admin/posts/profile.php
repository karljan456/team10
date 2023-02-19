<?php 

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome to the member's area, " . htmlspecialchars($_SESSION['username']) . "!";
} else {
    echo "Please log in first to see this page.";
}




?>