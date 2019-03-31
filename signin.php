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
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
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


<?php
if(isset($_POST['signin']))
{
   $email=$_POST['email'];
   $password=md5($_POST['password']);
   $sql ="SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
   $query= $dbh -> prepare($sql);
   $query-> bindParam(':email', $email, PDO::PARAM_STR);
   $query-> bindParam(':password', $password, PDO::PARAM_STR);
   $query-> execute();
   $results=$query->fetchAll(PDO::FETCH_OBJ);
   if($query->rowCount() > 0)
   {
   $_SESSION['login']=$_POST['email'];
   header('Location: index.php');
   } else{
      echo "<script>alert('Invalid Details');</script>";
   }
}
?>
<div class="container">
   <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
         <div class="card card-signin my-5">
            <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
               <form method="post" action="" class="form-signin">
                  <div class="form-label-group">
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>
                  <label for="inputEmail">Email address</label>
                  </div>

                  <div class="form-label-group">
                  <input type="password"  name="password" id="password" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                  </div>

                  <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block text-uppercase"  type="submit" name="signin" value="SIGNIN">Sign in</button>
                  <div class="card-footer">
                     <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="signup.php">Sign Up</a>
                     </div>
                     <div class="d-flex justify-content-center">
                        <a href="forgot-password.php">Forgot your password?</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>


<?php include('includes/footer.php');?>		