<?php include('includes/header.php');
if(isset($_POST['card_number'])){
  $bid=intval($_GET['bid']);
$status=1;
$sql = "UPDATE tblbooking SET status=:status WHERE BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();
$msg="Booking Confirm successfully";
$_SESSION['msg']=$msg;
header('Location: thankyou.php');
}
if(isset($_GET['bid']))
{
$bid=intval($_GET['bid']);
$sql = "SELECT * from tblbooking where BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':bid', $bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{

?>

<script src="js/jquery-validator.js"></script>
<script src="js/jquery.creditCardValidator.js"></script>
<div class="banner-1 ">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Payment Portal</h1>
	</div>
</div>
<div class="container">
    <div class='row '>
        <div class='col-md-4'></div>
        <div class='col-md-4 payment'>
          <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
          <form  action="" class="require-validation" id="payment_form" name="payment_form" method="post">
          <div style="margin:0;padding:0;display:inline">
          <input name="utf8" type="hidden" value="✓" />
          <input name="_method" type="hidden" value="PUT" />
          </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' id="name_on_card" name="name_on_card" maxlength='26' type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' id="card_number" name="card_number" class='form-control card-number' maxlength='16' type='text'><img src="images/credit-card.png" id="card_image" class="card-image">
                <span id="invalid-card-error" style="display:none; font-size: 13px; display: none;top: 36px;color: red;" for="card_number">Invalid card</span>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-4 form-group cvc required'>
                <label class='control-label'>CVC</label>
                <input autocomplete='off' id="cvv" name="cvv" class='form-control card-cvc' placeholder='ex. 311' maxlength='4' type='text'>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'>Expiration</label>
                <select  class='form-control card-expiry-month' id="expiry_month" name="expiry_month" placeholder='MM'>
                  <option value="01">01</option>
                  <option  value="02">02</option>
                  <option value="03">03</option>
                  <option  value="04">04</option>
                  <option  value="05">05</option>
                  <option  value="06">06</option>
                  <option  value="07">07</option>
                  <option  value="08">08</option>
                  <option  value="09">09</option>
                  <option  value="10">10</option>
                  <option  value="11">11</option>
                  <option  value="12">12</option>
                </select>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label'> </label>
                <select  class='form-control card-expiry-year' id="expiry_year" name="expiry_year" placeholder='YYYY'>
                  <?php
                  foreach (range(date('Y'),2050) as $x) {
                    print '<option value="'.$x.'">'.$x.'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12'>
                <div class='form-control total btn btn-info'>
                  Total:
                  <span class='amount'>$ <?=$results[0]->amount;?></span>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 form-group'>
                <button id="submitbtn" class='form-control btn btn-primary submit-button' type='submit'>Pay »</button>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>
                  Please correct the errors and try again.
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class='col-md-4'></div>
    </div>
</div>
<?php
}else{
  header('Location: index.php');
}
}else{
  header('Location: index.php');
}
?>

<script>
function checkExpDate() {
	var expTs = mktime(0, 0, 0, $month + 1, 1, $year);
  	if ($expTs > $curTs && $expTs < $maxTs) {
		return true;
	} else {
		return 0;			
	}
}

$(document).ready(function() {
  
  $("#payment_form").validate({
                rules: {
                  name_on_card: "required",
                  card_number: "required",
                  cvv: {
                        required: true,
                        minlength: 3,
                    },
                    cardExpYear: {
                      CCExp: {
                        month: '#expiry_month',
                        year: '#expiry_year'
                      }
                    }                  
                },
                messages: {
                  name_on_card: "Please enter name on card",
                  card_number:"Please enter card number",
                  cvv: {
                        required: "Please enter card cvv",
                        minlength: "Cvv is 3 digits number on back of your card",
                    }
                }
            }); 
  $.validator.addMethod('CCExp', function(value, element, params) {
    var minMonth = new Date().getMonth() + 1;
    var minYear = new Date().getFullYear();
    var month = parseInt($(params.month).val(), 10);
    var year = parseInt($(params.year).val(), 10);
    return (!month || !year || year > minYear || (year === minYear && month >= minMonth));
  }, 'Your Credit Card Expiration date is invalid.');
    //card validation on input fields
    $('#card_number').validateCreditCard(function(result) {
        if(result.card_type){
          $('#card_image').attr("src","images/"+result.card_type.name+".png");
        }if(result.valid){
          $('#invalid-card-error').hide();
        }else{
          $('#invalid-card-error').show();

        }

    });
});
</script>
<!--- /selectroom ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<!-- //signu -->
<!-- signin -->
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>