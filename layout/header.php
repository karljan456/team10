<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/team10/assets/images/favicon.ico">

    <link href="https://fonts.cdnfonts.com/css/roboto-condensed" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script> <!--darkmode toggle switch needed jquery-->
    <script src="/team10/assets/js/poll.js"></script>
    <script src="/team10/assets/js/quiz_validation.js"></script>


    <link rel="stylesheet" href="/team10/assets/css/darkmode.css"><!--darkmode toggle switch styles-->
    <link rel="stylesheet" href="/team10/assets/css/styles.css">
    <link rel="stylesheet" href="/team10/assets/css/stylulate.css">
    <link rel="stylesheet" href="/team10/assets/css/signup.css" type="text/css" />
    <?php
    if (basename(__FILE__) == 'signup.php') {
        echo '<link rel="stylesheet" href="/team10/assets/css/signup.css" type="text/css"/>';
    }
    ?>

    <title>
        <?php
        if (isset($title)) {
            echo $title;
        } else {
            echo "LFC Fan Club";
        }
        ?>
    </title>
    <div class="container wd-100" style="
    background-color: <?php echo $background; ?>; 
    color: <?php echo $color; ?>;">
        <div class="row topbar">
        </div>
        <!--header second row-->
        <div class="row header ">
            <div class="justify-content-start col-md-4"></div>
            <div class="justify-content-center col-md-4"></div>
            <div class="justify-content-end col-md-4 header-darkmode-toggle">
                <span class="sun">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
                        <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                    </svg>
                </span>

                <!--darkmode toggle switch-->
                <label class="switch">
                    <input type="checkbox" id="toggleTheme" <?php if (isset($_COOKIE["theme"]) == "dark") {
                                                                echo "checked";
                                                            } ?>>
                    <span class=" toggler round" title="Light/Dark mode"></span>
                </label>
                <span class="moon"> <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-moon-stars-fill" viewBox="0 0 16 16">
                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                    </svg>
                </span>

            </div>
        </div>

        <nav class="navbar navbar-expand-xl  navbar-dark ms-auto pr-3   ">

            <a class="navbar-brand justify-content-start" href="/team10/index.php">
                <img class="navbar_logo" src="/team10/assets/images/lfc_logo.png" alt="Liverpool FC logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav topnav float-lg-end">
                    <li class="nav-item active">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/team10/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tables.php">Tables</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            MORE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="poll.php">Poll Site</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="tables.php">League Table</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Comment Forum</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="quiz.php">Quiz</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Extra 1</a>
                        </div>
                    </li>
                </ul>

                <!--user login links-->
                <div class="nav-item user-box ">

                    <?php 
                    if (!empty($_SESSION['loggedin'])) {
                        echo '<a class="nav-link user-link" href="/team10/userprofile.php">
                        <img src="/team10/assets/images/user.svg" width="18" alt="logout" class="nav-icon"> Profile</a>';
                        
                        echo '<a class="nav-link user-link" href="/team10/scripts/logout.serv.php">Logout</a>';
                    } else {
                        echo '<a class="nav-link user-link " href="/team10/signup.php">
                        <img src="/team10/assets/images/user.svg" width="18" alt="Signup" class="nav-icon"> Join</a>';
                        echo '<a class="nav-link user-link" href="login.php">Login</a>';

                    }
                    ?>
                </div>


                <!--sponser-->
                <div class="nav-item justify-content-end sponser">
                    <a href="https://www.sc.com/en/"><img src="/team10/assets/images/sponser.svg" width="120" alt="sponser"></a>
                </div>
            </div>
        </nav>
        <?php
        if (isset($_COOKIE["theme"]) == "dark") {
            $background = "#222";
            $color = "#fff";
        } else {
            $background = "#f9f9f9 ";
            $color = "#1b1d1e";
        }
        ?>
</head>
<!--#################### HEADER ENDS #########################-->
<div class="almighty-wrapper" style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">

    <body style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">

        <!--################SLIDER ###############-->
        <div class="page-heading slider-carousel">
            <div class=" container heading-h1  background-dark dark-change">
                <?php
        if (isset($title)) {
             echo '<h1>'.htmlspecialchars($title).'</h1>';
           
        } else {
            echo '<h1> <small>LFC FAN EXCLUSIVE</small> SALAH SCORED THE WINNER AGAINST MANU </h1>';
        }
        ?>
            </div>
        </div>
        <!--################SLIDER ENDS ###############-->
        <div class="container post-container content-wrapper " style="background-color: <?php echo $background; ?>; color: <?php echo $color; ?>">
            <!--################CONTENT STARTS###############-->