<?php
session_start();
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
$msg=$error='';
if(isset($_POST['submit']))
{
  $userid=$_POST['userid'];
  $fname=$_POST['fname'];
  $mnumber=$_POST['mobilenumber'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  $sql="UPDATE tblusers SET (FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password) Where id=:userid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':fname',$fname,PDO::PARAM_STR);
  $query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':password',$password,PDO::PARAM_STR);
  $query->bindParam(':userid',$userid,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId)
  {
    $msg="User Updated Sucessfully";
  }
  else 
  {
    $error="Something went wrong. Please try again.";
  }
}
else{ 
	if(isset($_REQUEST['uid']))
	{
$uid=intval($_GET['uid']);
$sql = "SELECT * FROM tblusers WHERE  id=:uid";
$query = $dbh->prepare($sql);
$query-> bindParam(':uid',$uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
  ?>
  <!DOCTYPE HTML>
  <html>
  <head>
  <title>FT | Admin manage Users</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
  <!-- Custom CSS -->
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="css/morris.css" type="text/css"/>
  <!-- Graph CSS -->
  <link href="css/font-awesome.css" rel="stylesheet"> 
  <!-- jQuery -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/jquery-validator.js"></script>
  <!-- //jQuery -->
  <!-- tables -->
  <link rel="stylesheet" type="text/css" href="css/table-style.css" />
  <link rel="stylesheet" type="text/css" href="css/basictable.css" />
  <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
        $('#table').basictable();

        $('#table-breakpoint').basictable({
          breakpoint: 768
        });

        $('#table-swap-axis').basictable({
          swapAxis: true
        });

        $('#table-force-off').basictable({
          forceResponsive: false
        });

        $('#table-no-resize').basictable({
          noResize: true
        });

        $('#table-two-axis').basictable();

        $('#table-max-height').basictable({
          tableWrapper: true
        });
      });
  </script>
  <!-- //tables -->
  <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <!-- lined-icons -->
  <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <!-- //lined-icons -->
  </head> 
  <body>
    <div class="page-container">
    <!--/content-inner-->
  <div class="left-content">
      <div class="mother-grid-inner">
              <!--header start here-->
          <?php include('includes/header.php');?>
          <div class="clearfix"> </div>	
        </div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a   href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Update Users</li>
        </ol>
        <div class="agile-grids">	
          <!-- tables -->
          <div class="agile-tables">
            <?php 
            if($msg!=''){echo "<p style='color:green'>".$msg."</p>";}
            if($error!=''){echo "<p style='color:red'>".$error."</p>";}
            ?>
            <div class="w3l-table-info">
              <h2>Update Users</h2>
              <article class="card-body mx-auto" style="max-width: 400px;">
                <form id="updateuser" name="updateuser" method="post" action="" novalidate>
                <div class="form-group input-group">
                    <input name="fname" value="<?=$results[0]->FullName;?>" class="form-control" placeholder="Full name" type="text" required>
                    <input name="userid" value="<?=$uid;?>" type="hidden">
                  </div> <!-- form-group// -->
                  <div class="form-group input-group">
                      <input required name="email" id="email" value="<?=$results[0]->EmailId;?>" onBlur="checkAvailability()"  class="form-control" placeholder="Email address" type="email">
                  </div> <!-- form-group// -->
                  <div class="form-group input-group">
                  <select class="custom-select" name="mcode" style="max-width: 75px;float:left;padding:6px 4px">
                      <option selected="+1">+1</option>
                      <option value="+2">+2</option>
                      <option value="+91">+91</option>
                  </select>
                    <input style="float:left;width: 85%;" value="<?=$results[0]->MobileNumber;?>" required class="form-control"  placeholder="Mobile number" maxlength="10" minlength="5" maxlength="10" name="mobilenumber"  type="text">
                  </div> <!-- form-group// -->
                  <!-- form-group end.// -->
                  <div class="form-group input-group">
                      <input required class="form-control" id="password" name="password" placeholder="Create password" type="password">
                  </div> <!-- form-group// -->
                  <div class="form-group input-group">
                    <input required class="form-control" id="cofirmpassword" name="cofirmpassword" placeholder="Repeat password" type="password">
                  </div> <!-- form-group// -->  
                  <div class="form-group input-group">
                  <div class="form-group">
                    <button  name="submit" id="submit" class="btn btn-primary btn-block"> Update User  </button>
                    <a  href="manage-users.php" class="btn btn-danger btn-block"> Cancel</a>
                  
                  </div> <!-- form-group// -->      
              </form>
              </article>
            </div>
  <!-- script-for sticky-nav -->
      <script>
      $(document).ready(function() {
        var navoffeset=$(".header-main").offset().top;
        $(window).scroll(function(){
          var scrollpos=$(window).scrollTop(); 
          if(scrollpos >=navoffeset){
            $(".header-main").addClass("fixed");
          }else{
            $(".header-main").removeClass("fixed");
          }
        });
        
      });
      </script>
      <!-- /script-for sticky-nav -->
  <!--inner block start here-->
  <div class="inner-block">

  </div>
<!--inner block end here-->
<!--copy rights start here-->
<?php 
}
  }
include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
						<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
              </script>
              <script>
			$().ready(function() {
							$("#updateuser").validate({
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
                    }
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
                    email: "Please enter a valid email address"
                }
            }); 
						});
		</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>