<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Travel Tiem</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="css/landing-page.min.css" rel="stylesheet">

<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		 new WOW().init();
	</script>
<script src="js/jquery-ui.js"></script>
<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '2840a280-63da-475b-b0e8-6fc4f9db1475', f: true }); done = true; } }; })();</script>
<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
					</script>
<!--//end-animate-->
</head>
<body>
<?php

session_start();
include('config.php');
if(isset($_SESSION['login']))
{?>
 
 <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
	     <div class="container">
        <a href="index.php"><i class="fa fa-home"></i>Travel Time</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="services2.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="page.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact Us</a>
          </li>
          <li class="nav-item">
						<a class="nav-link" href="profile.php">My Profile</a>
          </li>
          <li class="nav-item">
						<a class="nav-link" href="change-password.php">Change Password</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tour-history.php">My Tour History</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
          </li>
				</ul>
      </div>
    </nav>
<?php } else {?>

 
 <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
		<div class="container">
			<a href="index.php"><i class="fa fa-home"></i>Travel Time</a> 
<!--			<a href="admin/index.php"><i class="fa fa-home"></i>Admin</a>-->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">

					<a class="nav-link" href="admin/index.php">Admin</a>
				</li> 						
				<li class="nav-item">
					<a class="nav-link" href="services2.php">Services</a>
				</li> 
				<li class="nav-item">
					<a class="nav-link" href="page.php">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contactus.php">Contact Us</a>
				</li>
				<li class="nav-item">
					<a class="btn btn-primary" href="signin.php">Sign In</a>
				</li>
				<li class="nav-item">
					<a class="btn btn-success" href="signup.php">Signup</a>
				</li>
			</ul>
		</div>
	</nav>
<?php }?>
			
