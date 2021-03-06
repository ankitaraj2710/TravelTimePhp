<?php

 include('includes/header.php');
//session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$email=$_POST['email'];	
$mobile=$_POST['mobileno'];
$subject=$_POST['subject'];	
$description=$_POST['description'];
$sql="INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Enquiry  Successfully submited";
}
else 
{
$error="Something went wrong. Please try again";
}

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>TT | Travel Time</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fovero Tours In PHP" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

<!-- top-header -->
<div class="top-header">
<div class="banner-1 ">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">TT | Travel Time</h1>
	</div>
</div>
<!--- /banner-1 ---->
<!--- privacy ---->
<div class="privacy">
	<div class="container">
										<?php 
$pagetype=$_GET['type'];
$sql = "SELECT type,detail from tblpages where type=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{		

?>

		<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;"><?php  $result->Name;?></h3>
		
		
<!--	<p>
	<?php 	echo  htmlspecialchars_decode(stripslashes($result->detail)); ?>


	</p> -->
<?php } }?>
        <section class="white-section" id="register" >


                    <div class="container-fluid">
                         <h1><u> Fill the Credentials!- Hotel Booking</u> <a href="index.php" style="color:#0066ff;text-decoration:none;padding-left:1em;" >Home</a> </h1>
                      <form class="needs-validation" novalidate>
                          <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="firstName">FIRST NAME</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Simran" value="" required>

                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="lastName">LAST NAME</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Kaur" value="" required>

                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="from">DEPART FROM</label>
                    <input type="text" class="form-control" id="flightFrom" placeholder="TORONTO" value="" required>

                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="to">DESTINATION</label>
                    <input type="text" class="form-control" id="flightTo" placeholder="DELHI" value="" required>

                  </div>
                </div>

                <div class="mb-3">
                  <label for="depart">DEPART - DATE</label>
                  <input type="date" min="2019-05-02" class="form-control" id="flightDepart" placeholder="01/06/2019">

                </div>

                <div class="mb-3">
                  <label for="return">RETURN - DATE</label>
                  <input type="date" min="2019-05-02" class="form-control" id="flightReturn" placeholder="01/09/2019" required>

                </div>
                  

                  <div class="mb-3">
                    <label for="state">TRAVEL - CLASS</label>
                    <select class="custom-select d-block w-100" id="flightClass" required>
                      <option value="">SELECT</option>
                      <option>BUSINESS</option>
                      <option>PREMINUM ECONOMY</option>
                      <option>ECONOMY</option>
                      <option>FIRST CLASS</option>
                    </select>

                  </div>
                  
                <div class="form-group row">

                    <div class="mb-4">
                      <div class="form-check">
                        &nbsp; &nbsp; &nbsp;
                        <input class="form-check-input" type="checkbox" id="flightGridCheck">
<!--                         <a href="package-list.php"> Our Packages</a>-->
                        <label class="form-check-label" for="gridCheck1">
                            I AM Not A ROBOT!
                        </label>
                      </div>
                    </div>
                  </div>
                     <a href="package-list.php"> <h2> Our Packages </h2></a>

<!--
                    <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" onclick="bookFlight()" type="submit">ADD TO LIST!</button>
-->
              </form>

          </div>
        
<!--
	<h2>ABOUT US!</h2>
 With our unrivalled knowledge, from over 100 years experience between us in the travel industry, we are experts in finding the right holiday   for you. <br>
          Having travelled to every corner of the earth, we leave no stone unturned to making sure you have the perfect city break, cruise, escorted tour   or luxury escape &nbsp; &nbsp; away. <br>

Our philosophy is simple, as an independent travel agency we are able to give completely impartial advice from our own experiences, personalised service            and add extra value you just can't find by booking a holiday online.<br>
          
      <h3>WHY US? </h3>
     <li>Easy to get in touch with us </li> 
     <li>Co-operative Staff </li>
     <li>Affordable Luxury Holidays </li>
    
-->
		
        </section>
    
    
<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>