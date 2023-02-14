<?php 	include '../assets/plugins/connect.php';
	session_start();

	if(isset($_SESSION['userID'])){

		header('location:home.php');
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Sidebar #1</title>
  </head>
  <body>
  
    
    <aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
      </div>
      <div class="side-inner">

        <div class="profile">
          <img src="<?php?>" alt="Image" class="img-fluid">
          <h3 class="name">Debby Williams</h3>
          <span class="country">New York, USA</span>
        </div>

        <div class="counter d-flex justify-content-center">
          <!-- <div class="row justify-content-center"> -->
            <div class="col">
              <strong class="number">892</strong>
              <span class="number-label">Posts</span>
            </div>
            <div class="col">
              <strong class="number">22.5k</strong>
              <span class="number-label">Followers</span>
            </div>
            <div class="col">
              <strong class="number">150</strong>
              <span class="number-label">Following</span>
            </div>
          <!-- </div> -->
        </div>
        
        <div class="nav-menu">
          <ul>
            <li class="active"><a href="#"><span class="icon-home mr-3"></span>Feed</a></li>
            <li><a href="#"><span class="icon-search2 mr-3"></span>Explore</a></li>
            <li><a href="#"><span class="icon-notifications mr-3"></span>Notifications</a></li>
            <li><a href="#"><span class="icon-location-arrow mr-3"></span>Direct</a></li>
            <li><a href="#"><span class="icon-pie-chart mr-3"></span>Stats</a></li>
            <li><a href="#"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
          </ul>
        </div>
      </div>
      
    </aside>

    <main>
      <div class="site-section">