<?php
error_reporting(0);
?>

<?php include('includes/header.php');?>
<div class="banner">
<div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Plan Your Next Trip!</h1>
        </div>
        <div class="col-md-12 col-lg-12">
          <form action="package-list.php?search=">
            <div class="row">
              <div class="col-7 col-md-offset-2">
<!--               search bar -->
                <input type="text" name="search" class="form-control form-control-lg" placeholder="Wildlife and Glaciers in Canada">
              </div>
              <div class="">
<!--               search button-->
                <button type="submit" class="btn btn-primary"><svg viewBox="0 0 16 16" role="presentation" aria-hidden="true" focusable="false" style="height:2em;width:2em;display:block;fill:currentColor"><path d="m2.5 7c0-2.5 2-4.5 4.5-4.5s4.5 2 4.5 4.5-2 4.5-4.5 4.5-4.5-2-4.5-4.5m13.1 6.9-2.8-2.9c.7-1.1 1.2-2.5 1.2-4 0-3.9-3.1-7-7-7s-7 3.1-7 7 3.1 7 7 7c1.5 0 2.9-.5 4-1.2l2.9 2.8c.2.3.5.4.9.4.3 0 .6-.1.8-.4.5-.5.5-1.2 0-1.7"></path></svg></button>
              </div>
            </div>
          </form>
        </div>  
      </div>
    </div>
</div>

<link rel="stylesheet" href="css/styles1.css">


<!--- rupes ---->
<div class="container">
	<div class="rupes">
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href="#"><i class="fa fa-usd"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>UP TO USD. 50 OFF</h3>
				<h4><a href="#">TRAVEL SMART</a></h4>
				
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href="#"><i class="fa fa-h-square"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>UP TO 70% OFF</h3>
				<h4><a href="#">ON HOTELS ACROSS WORLD</a></h4>
				
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
			<div class="rup-left">
				<a href="#"><i class="fa fa-mobile"></i></a>
			</div>
			<div class="rup-rgt">
				<h3>FLAT USD. 50 OFF</h3>
				<h4><a href="#">US APP OFFER</a></h4>
			
			</div>
				<div class="clearfix"></div>
		</div>
	
	</div>
</div>


<!--- /rupes ---->
<!---holiday---->
<!-- <center>-->

<!-- <section class="white-section" id="services" > <br> <br>-->
<!--           <img src="images/Services.png" height="200px" width="700px"><br>-->
<!--              <h2>Our Services!</h2>-->
<!--              *Hotel Booking * Flight Booking * Cruise Booking-->
              
<!--            <div class="container-fluid">-->
<!--
            <div class="container">
                   <img src="images/holiday.jpg" alt="Hotel image" class="image" height="300px">
                
                   <div class="overlay">
                      <div class="text"><a href="hotelbooking.html"> Book Hotel  &nbsp;&nbsp;Room in just ONE CLICK!</a></div>
                   </div>
                   <img src="images/planeservices.jpg" alt="Plane Image" class="image" height="300px">
                   <div class="overlay">
                    <div class="text"><a href="flightbooking.html">Book Flights Tickets in just ONE CLICK!</a></div>
                    </div>


                 <img src="images/cruise2.jpg" alt="Train Image" class="image">
                   <div class="overlay">
                   <div class="text"><a href="cruisebooking.html"> Book Cruise &nbsp;&nbsp;Tickets in just  ONE CLICK!</a></div>
                   </div>

                </div>
                
-->
<!--
                <div class="container">
                  <img src="images/planeservices.jpg" alt="Plane Image" class="image" height="300px">
                   <div class="overlay">
                    <div class="text"><a href="flightbooking.html">Book Flights Tickets in just ONE CLICK!</a></div>
                    </div>

                </div>
                
-->
<!--
                <div class="container">
                  <img src="images/cruise2.jpg" alt="Train Image" class="image">
                   <div class="overlay">
                   <div class="text"><a href="cruisebooking.html"> Book Cruise &nbsp;&nbsp;Tickets in just  ONE CLICK!</a></div>
                   </div>

                </div>
-->
<!--

              </div>
              
              </section>
            
-->
<!--</center>-->

<!--
<div class="container">
    <h3 class="h3">Our Packages</h3>
    <div class="row">
			//<?php 
			//$sql = "SELECT * from tbltourpackages order by rand() limit 3";
			//$query = $dbh->prepare($sql);
			//$query->execute();
			//$results=$query->fetchAll(PDO::FETCH_OBJ);
			//$cnt=1;
			//if($query->rowCount() > 0)
			//{
			//foreach($results as $result)
			//{	?>
			<div class="col-md-4 col-sm-6">
            <div class="product-grid8">
                <div class="product-image8">
                    <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" >
                        <img class="pic-1" src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>">
                    </a>
                </div>
                <div class="product-content">
                    <div class="price">£  <?php echo htmlentities($result->PackagePrice);?>
                    </div>
                    <span class="product-shipping"><?php echo htmlentities($result->PackageLocation);?></span>
                    <h3 class="title"><a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" ><?php echo htmlentities($result->PackageName);?></a></h3>
                    <a class="all-deals" href="package-list.php">See all Packages <i class="fa fa-angle-right icon"></i></a>
                </div>
            </div>
        </div>

					

				
					
		
        
    
    </div>
</div>
-->

<!-- <div class="container">
	<div class="holiday">	
	<h3>Package List</h3> -->
	<?php /* $sql = "SELECT * from tbltourpackages order by rand() limit 4";
	$query = $dbh->prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
	foreach($results as $result)
	{	?>
			<div class="rom-btm">
				<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
					<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
				</div>
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4>Package Name: <?php echo htmlentities($result->PackageName);?></h4>
					<h6>Package Type : <?php echo htmlentities($result->PackageType);?></h6>
					<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
					<p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					<h5>USD <?php echo htmlentities($result->PackagePrice);?></h5>
					<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>" class="view">Details</a>
				</div>
				<div class="clearfix"></div>
			</div>

		<?php }} */?>
			
<!-- 		
<div><a href="package-list.php" class="view">View More Packages</a></div>
</div>
			<div class="clearfix"></div>
	</div> -->



<!--- routes ---->
<div class="routes">
	<div class="container">
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="glyphicon glyphicon-list-alt"></i></a>
			</div>
			<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
				<h3>1000+</h3>
				<p>Enquiries</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left">
			<div class="rou-left">
				<a href="#"><i class="fa fa-user"></i></a>
			</div>
			<div class="rou-rgt">
				<h3>2000+</h3>
				<p>Regestered users</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="fa fa-ticket"></i></a>
			</div>
			<div class="rou-rgt">
				<h3>1,000,000+</h3>
				<p>Booking</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php include('includes/footer.php');?>		
<!-- //write us -->
