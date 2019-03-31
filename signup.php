<!DOCTYPE HTML>
<html lang="en">
<head>
<title>TT | Travel Time</title>
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
<script src="js/jquery-validator.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<script src="js/wow.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		 new WOW().init();
	</script>
<script src="js/jquery-ui.js"></script>
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

include('includes/config.php');
if(isset($_SESSION['login']))
{
	header('Location: index.php');
} else {?>

 
 <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
		<div class="container">
			<a href="index.php"><i class="fa fa-home"></i>TT | Travel Time</a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="services.php">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#aboutus">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#contactus">Contact Us</a>
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
			

<?php
error_reporting(0);
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO  tblusers(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="You are Scuccessfully registered. Now you can login ";
header('location:thankyou.php');
}
else 
{
$_SESSION['msg']="Something went wrong. Please try again.";
header('location:thankyou.php');
}
}
?>
<!--Javascript for check email availabilty-->
<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<div class="container">
<hr>
<div class="card bg-light signup">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>	
	<form id="signup" name="signup" method="post" action="" novalidate>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="fname" class="form-control" placeholder="Full name" type="text" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input required name="email" id="email" onBlur="checkAvailability()"  class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="custom-select" name="mcode" style="max-width: 75px;">
		    <option selected="+1">+1</option>
		    <option value="+2">+2</option>
		    <option value="+91">+91</option>
		</select>
    	<input required class="form-control"  placeholder="Mobile number" maxlength="10" minlength="5" maxlength="10" name="mobilenumber"  type="text">
    </div> <!-- form-group// -->
		 <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input required class="form-control" id="password" name="password" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
			</div>
        <input required class="form-control" id="cofirmpassword" name="cofirmpassword" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->  
		<div class="form-group input-group">
		<div class="input-group-prepend">
			<input type="checkbox" class="checkbox" id="agree" name="agree" required="required"> 
			</div>
			I agree to  <a href="page.php?type=terms"> Terms and Conditions. </a>
		</div>                                    
    <div class="form-group">
		  <button  name="submit" id="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="signin.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
<br><br>
		<script>
			$().ready(function() {
							$("#signup").validate({
                rules: {
										fname: "required",
                    password: {
                        required: true,
                        minlength: 5
										},
										mobilenumber: {
                        required: true,
                        minlength: 5,
                        maxlength: 10
                    },
                    cofirmpassword: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    agree: "required"
                },
                messages: {
										fname: "Please enter your Full name",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
										},
										mobilenumber: {
                        required: "Please enter your Mobile Number",
                        minlength: "Number must be at least 5 characters long",
                        maxlength: "Number must not exceed 10 characters"
                    },
                    cofirmpassword: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",
                    agree: "Please accept our policy"
                }
            }); 
						});
		</script>

<?php include('includes/footer.php');?>		