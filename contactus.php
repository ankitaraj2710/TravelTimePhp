<?php
include('includes/header.php');

if(isset($_POST['submit']))
{
  $issue=$_POST['issue'];
  $name=$_POST['name'];
  $description=$_POST['description'];
  $email=$_POST['email'];
  $sql="INSERT INTO  tblissues(Name,UserEmail,Issue,Description) VALUES(:name,:email,:issue,:description)"; $query = $dbh->prepare($sql);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':issue',$issue,PDO::PARAM_STR);
  $query->bindParam(':description',$description,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId)
  {
    //$_SESSION['msg']="Info successfully submited ";
    echo "<script type='text/javascript'> alert('Thanks for contacting us'); </script>";
  }
  else 
  {
    //$_SESSION['msg']="Something went wrong. Please try again.";
    echo "<script type='text/javascript'> alert('Something went wrong. Please try again'); </script>";
  }
}

?>	

  <section class="jumbotron text-center banner contact">
    <div class="container">
        <h1 class="jumbotron-heading">CONTACT US</h1>
        <p class="lead text-muted mb-0">We value your feedback! If you have any questions or concerns, complete the form below and a team member will respond within 1 business day.</p>
    </div>
  </section>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact From
                </div>
                <div class="card-body">
                    <form name="contactus" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="issue">Issue</label>
                            <select id="issue" name="issue" class="frm-field required sect" required="">
														<option value="">Select Issue</option> 		
														<option value="Booking Issues">Booking Issues</option>
														<option value="Cancellation"> Cancellation</option>
														<option value="Refund">Refund</option>
														<option value="Other">Other</option>														
													</select>
                        </div>
                        <div class="form-group">
                            <label for="description">Message</label>
                            <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <input type="submit" name="submit" class="btn btn-primary text-right" value="Submit"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>We are located at:</p>
                    <p>101 Cedar Drive</p>
                    <p>Scarborough, ON M1B 5J2</p>
                    <p>Email : <a href="mailto:Traveltime.com" class="contact">Traveltime.com</a></p>
                    <p>Tel : <a class="mobile" href="tel:+16470000001">+1 (647) 000-0001</a></p>

                </div>

            </div>
        </div>
    </div>
</div>