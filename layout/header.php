<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="icon" type="/team10/image/x-icon" href="../assets/images//favicon.ico">

    <link href="https://fonts.cdnfonts.com/css/roboto-condensed" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" deffer></script><!--darkmode toggle switch-->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/stylulate.css">
    <link rel="stylesheet" href="../assets/css/darkmode.css"><!--darkmode toggle switch-->
    
    <title>
        <?php
        if (isset($title)) {
            echo "$title";
        } else {
            echo "LFC Fan Club";
        }
        ?>
    </title>

    <div class="container"  style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
        <div class="row topbar">
        </div>
        
        <div class="row header ">
<!--darkmode toggle switch-->
        <label class="switch">
					<input type="checkbox" id="toggleTheme"
                    <?php if(isset($_COOKIE["theme"]) == "dark") { 
                        echo "checked"; 
                    }
                        ?>>
					<span class="slider round"></span>
				</label>
        </div>

        <nav class="navbar navbar-expand-xl  navbar-dark ms-auto pr-3   ">

            <a class="navbar-brand justify-content-start" href="index.php">
                <img class="navbar_logo" src="../assets/images/lfc_logo.png" alt="Liverpool FC logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav topnav float-lg-end">
                    <li class="nav-item active">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            IN CLASS EXERCISE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="ex1.php">EXERCISE 1</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="ex2.php">EXERCISE 2</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="ex3.php">EXERCISE 3</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="controlflow.php">EXERCISE 4 (ControlFlow)</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="array.php">EXERCISE 5 (Array)</a>
                        </div>
                    </li>
                </ul>

                <!--user login links-->
                <div class="nav-item user-box ">

                    <a class="nav-link user-link " href="#">
                        <img src="../assets/images/user.svg" width="18" alt="Signup" class="nav-icon"> Join</a>


                    <a class="nav-link user-link" href="#">Login</a>


                </div>


                <!--user-box login links end-->
                <div class="nav-item justify-content-end sponser">
                    <a href="https://www.sc.com/en/"><img src="../assets/images/sponser.svg" width="120" alt="sponser"></a>
                </div>


            </div>
        </nav>
        <?php
if(isset($_COOKIE["theme"]) == "dark") {
    $background = "#1b1d1e";
    $color = "#fff";
} else {
    $background = "#f1f1f1 ";
    $color = "#1b1d1e";
}
?>
</head><!--#################### HEADER ENDS #########################-->

<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
    <!--################SLIDER ###############-->
    <div class="page-heading slider-carousel">
        <div class=" container heading-h1  dark-change" >
            <h1> <small>EXCLUSIVE NEWS!</small> SALAH SCORED THE WINNER AGAINST MANU</h1>
        </div>
    </div>
    <!--################SLIDER ENDS ###############-->
    <div class="container post-container content-wrapper wd-75" 
    style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
    <!--################CONTENT STARTS###############-->