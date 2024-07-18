<?php 
$page_title = 'Stripe Payment';
require_once "../header-new.php";
include('include/header.php');
?>
<title>Stripe Payment</title>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-creditcardvalidator/1.0.0/jquery.creditCardValidator.js"></script>
<script type="text/javascript" src="script/payment.js"></script>
<style>
  body{
   font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Ubuntu,sans-serif; 
  }
  input[type="button"]{
    background-color: rgb(0, 116, 212) !important;
        -webkit-text-size-adjust: 100%;
    font-family: inherit;
    font-size: 100%;
    line-height: 1.15;
    margin: 0;
    text-transform: none;
    border: 0;
    border-radius: 6px;
    box-shadow: inset 0 0 0 1px rgba(50,50,93,.1),0 2px 5px 0 rgba(50,50,93,.1),0 1px 1px 0 rgba(0,0,0,.07);
    cursor: pointer;
    height: 44px;
    margin-top: 12px;
    outline: none;
    overflow: hidden;
    padding: 0;
    position: relative;
    width: 100%;
    color: rgb(255, 255, 255);
  }
  form input[type="button"]::hover{
   color: #fff;
}
  input[type="text"], textarea{
       -webkit-text-size-adjust: 100%;
    -webkit-font-smoothing: antialiased;
    pointer-events: auto;
    -webkit-box-direction: normal;
    box-sizing: border-box;
    font-family: inherit;
    margin: 0;
    overflow: visible;
    -webkit-animation: native-autofill-out 1ms;
    appearance: none;
    background: white;
    border: 0;
    box-shadow: 0 0 0 1px #e0e0e0,0 2px 4px 0 rgba(0,0,0,.07),0 1px 1.5px 0 rgba(0,0,0,.05);
    color: hsla(0,0%,10%,.9);
    line-height: 1.5;
    padding: 8px 12px;
    position: relative;
    transition: box-shadow .08s ease-in,color .08s ease-in,filter 50000s;
    width: 100%;
    font-size: 14px;
    height: 36px;
    transform: rotateY(0);
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px; 
  }
  .panel-body {
    padding: 15px;
    box-shadow: 0 0 30px 0 rgba(0,0,0,.18);
}
</style>
<?php include('include/container.php');?>
<div class="container" style="margin-top: 30px">	
	<div class="row">	

		<?php 
		if(isset($_SESSION["message"]) && $_SESSION["message"] && $_SESSION["message"] == 'failed') {
		?>			
			<div class="alert alert-danger">
			  <?php 
			  echo "Error : Payment failed!"; 
			  $_SESSION["message"] = '';
			  ?>
			</div>
		<?php 
		} elseif(isset($_SESSION["message"]) && $_SESSION["message"]) {
		?>
			<div class="alert alert-success">
			  <?php 
			  echo $_SESSION["message"]; 
			  $_SESSION["message"] = '';
			  ?>
			</div>
		<?php } ?>
		<div class="panel panel-default">			
			<div class="panel-heading">Stripe Payment</div>
			<div class="panel-body">
              
				<form action="process.php" method="POST" id="paymentForm">	
					<div class="row">
						<div class="col-md-6" style="border-right:1px solid #ddd;">
							<h4 align="center">Customer Details</h4>
							<div class="form-group">
								<label><b>Card Holder Name <span class="text-danger">*</span></b></label>
								<input type="text" name="customerName" id="customerName" class="form-control" value="" required>
								<span id="errorCustomerName" class="text-danger"></span>
							</div>
                          	<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label><b>Email Address <span class="text-danger">*</span></b></label>
                                        <input type="text" name="emailAddress" id="emailAddress" class="form-control" value="" required>
                                        <span id="errorEmailAddress" class="text-danger"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label><b>Phone Number <span class="text-danger">*</span></b></label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="" required>
                                        <span id="errorPhone" class="text-danger"></span>
                                  </div>
								</div>
							</div>
							<div class="form-group">
								
							</div>
							<div class="form-group">
								<label><b>Address <span class="text-danger">*</span></b></label>
								<textarea name="customerAddress" id="customerAddress" class="form-control" required></textarea>
								<span id="errorCustomerAddress" class="text-danger"></span>
							</div>
							
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label><b>Country <span class="text-danger">*</span></b></label>
										<input type="text" name="customerCountry" id="customerCountry" class="form-control" required>
										<span id="errorCustomerCountry" class="text-danger"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label><b>City <span class="text-danger">*</span></b></label>
										<input type="text" name="customerCity" id="customerCity" class="form-control" value="" required>
										<span id="errorCustomerCity" class="text-danger"></span>
									</div>
								</div>
							</div>
                          	<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label><b>Zip</b></label>
										<input type="text" name="customerZipcode" id="customerZipcode" class="form-control" value="">
										<span id="errorCustomerZipcode" class="text-danger"></span>
									</div>
								</div>
								<div class="col-sm-6">
									
								</div>
							</div>
							<hr>
							<h4 align="center">Payment Details</h4>
							<div class="form-group">
								<label>Card Number <span class="text-danger">*</span></label>
								<input type="text" name="cardNumber" id="cardNumber" class="form-control" placeholder="1234 5678 9012 3456" maxlength="20" onkeypress="" required>
								<span id="errorCardNumber" class="text-danger"></span>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label>Expiry Month</label>
										<input type="text" name="cardExpMonth" id="cardExpMonth" class="form-control" placeholder="MM" maxlength="2" onkeypress="return validateNumber(event);" required>
										<span id="errorCardExpMonth" class="text-danger"></span>
									</div>
									<div class="col-md-4">
										<label>Expiry Year</label>
										<input type="text" name="cardExpYear" id="cardExpYear" class="form-control" placeholder="YYYY" maxlength="4" onkeypress="return validateNumber(event);" required>
										<span id="errorCardExpYear" class="text-danger"></span>
									</div>
									<div class="col-md-4">
										<label>CVC</label>
										<input type="text" name="cardCVC" id="cardCVC" class="form-control" placeholder="123" maxlength="4" onkeypress="return validateNumber(event);" required>
										<span id="errorCardCvc" class="text-danger"></span>
									</div>
								</div>
							</div>
							<br>
							<div align="center">
                              <!--
							<input type="hidden" name="price" value="500">
							<input type="hidden" name="total_amount" value="500">
							<input type="hidden" name="currency_code" value="USD">
							<input type="hidden" name="item_details" value="Jeans">
							<input type="hidden" name="item_number" value="TS1234567">
							<input type="hidden" name="order_number" value="SKA987654321">-->
							<input type="button" name="payNow" id="payNow" class="btn btn-sm" onclick="stripePay(event)" value="Pay Now" />
							</div>
							<br>
						</div>
						<div class="col-md-6">
							<h4 align="center">Order Details</h4>
							<div class="table-responsive" id="order_table">
								<table class="table table-bordered table-striped">
									<tbody>
										<tr> 
                                            <th>Image</th>
											<th>Product Name</th>  
											<th>Quantity</th>  
											<th>Price</th>  
											<th>Total</th>  
										</tr>
                                      	<?php
                                        $total_price = 0;
                                        foreach ($_SESSION['cart'] as $product_id => $product) {
                                            $product_name = $product['name'];
                                            $product_image = $product['image'];
                                            $product_qty = $product['qty'];
                                            $product_cost = $product['cost'];
                                            $product_total = $product_qty * $product_cost;
                                            $total_price += $product_total;
                            			?>
										<tr>
                                            <td><img src="<?php echo '../admin/assets/images/products/'.$product_image ?>" style="width: 50px; height; 50px"> </td>
											<td><strong><?php echo $product_name ?></strong></td>
											<td><?php echo $product_qty ?></td>
											<td align="right">Rs. <?php echo $product_cost ?></td>
											<td align="right">Rs. <?php echo $product_total ?></td>
										</tr>
                                      	<?php } ?>
										<tr>  
											<td colspan="4" align="right">Sub Total</td>  
											<td align="right"><strong>Rs. <?php echo $total_price ?></strong></td>
										</tr>
                                      	<tr>  
											<td colspan="4" align="right">Discount Price</td>  
											<td align="right"><strong>Rs. <?php echo $_SESSION['price']['final'] ?></strong></td>
										</tr>
                                      	<tr>  
											<td colspan="4" align="right">Shipping</td>  
											<td align="right"><strong>Rs. <?php echo $_SESSION['price']['shipping'] ?></strong></td>
										</tr>
                                      	<tr>  
											<td colspan="4" align="right">Total Price</td>  
											<td align="right"><strong>Rs. <?php echo $_SESSION['price']['total_order'] ?></strong></td>
										</tr>
									</tbody>
                                  	
								</table>	
                              	<button onclick="window.location.href= '../cart'">Back to Cart</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>			
	</div>		
</div>

<script>
  window.onload = function() {
  var billing = <?php echo json_encode($_SESSION['billing']); ?>;
  var name = document.getElementsByName('customerName')[0];
  var phone = document.getElementsByName('phone')[0];
  var email = document.getElementsByName('emailAddress')[0];
  var country = document.getElementsByName('customerCountry')[0];
  var city = document.getElementsByName('customerCity')[0];
  var zip = document.getElementsByName('customerZipcode')[0];
  var address = document.getElementsByName('customerAddress')[0];
  
      name.value = billing.fname + " " + billing.lname;
      phone.value = billing.phone;
      email.value = billing.email;  	
      country.value = billing.country;
      city.value = billing.city;
      zip.value = billing.zip || '';
      address.value = billing.address;
  }
</script>
<?php include('include/footer.php');?>

