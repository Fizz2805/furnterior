<?php
	$page_title = 'Shipping';
    require_once "header-new.php";
    require_once "navbar.php";
    require_once "admin/config.php";
	if(isset($_SESSION["userID"]))
	$cust_id= $_SESSION["userID"];

?>
<head>
  <!-- Select2 css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/select2.min.css">
  <style>
    .select2{
     border: 1px solid #ced4da !important; 
    }
    .select2-container--default .select2-results>.select2-results__options {
      display: flex;
      flex-direction: column;
	}
    .selection .select2-selection {
    border-radius: 5px !important;
}
    .select2-container .select2-selection--single {
    border-radius: 0.25rem !important;
    border-color: #f6f7fb;
    height: 40px !important;
    padding: 5px;
}
   .theme-form .select2-container .selection {
    width: 100%;
    background-color: #f2f9fc !important;
    border: 1px solid #efefef;
}
    .theme-form select {
    width: 100% !important;
     line-height: 1.5 !important;
    border-color: #efefef;
    background-color: #f2f9fc !important;
    font-size: calc(14px + (16 - 14) * ((100vw - 320px) / (1920 - 320)));
    color: #898989;
    padding: 10px 10px !important;
    outline: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;

}
    .select2-container--default .select2-results__options .select2-results__option[aria-selected=true] {
    background-color: var(--theme-color) !important;
    color: #fff !important;
}
    .select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 7px !important;
    right: 10px !important;
}
    .cont {
  text-align: center;
}

.progress-container {
  display: flex;
  justify-content: space-between;
  position: relative;
  margin-bottom: 60px;
  max-width: 100%;
}

.progress-container::before {
  content: "";
  background-color: #C4C1C1;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  height: 4px;
  width: 100%;
  z-index: -1;
}

.progress {
  background-color: #e87316 !important;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  height: 4px;
  width: 0%;
  z-index: -1;
  transition: 0.4s ease;
}

.circle {
  background: #C4C1C1;
  color: #C4C1C1;
  border-radius: 50%;
  height: 10px;
  width: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 3px solid #C4C1C1;
  transition: 0.4s ease;
}

.circle.active {
  border-color: #e87316;
  background-color: #fff;
  color: #e87316;
  scale: 1.1;
}

.circle .icon {
  position: absolute;
  font-size: 25px;
  bottom: 25px;
}
.circle .caption {
  position: absolute;
  font-size: 14px;
  font-weight: bolder;
  bottom: -30px;
}


@media only screen and (max-width: 400px) {
  .cont {
    width: 85%;
  }
}

  </style>
</head>
    <!-- Breadcrumb section start -->
    <section class="breadcrumb-section section-b-space">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Shipping</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            / <li class="breadcrumb-item active" aria-current="page">Shipping</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Cart Section Start -->
    <section class="section-b-space">
        <div class="container mt-3">
          <div class-="row g-4">
            <div class="col">
              <div class="container cont">
                <div class="progress-container">
                  <div class="progress" id="progress"></div>
                  <div class="circle active">
                    <i data-feather="shopping-cart" class="icon"></i>
                    <div class="caption">Cart</div>
                  </div>
                  <div class="circle active">
                    <i data-feather="truck" class="icon"></i>
                    <div class="caption">Shipping</div>
                  </div>
                  <div class="circle">
                    <i data-feather="credit-card" class="icon"></i>
                    <div class="caption">Billing</div>
                  </div>
                  <div class="circle">
                    <i data-feather="check-circle" class="icon"></i>
                    <div class="caption">Confirmation</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="row g-4">
                <div class="col-lg-8">
                    <h3 class="mb-3">Shipping address</h3>
                  	<div id="message">  </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation theme-form">
                      <?php
                      	if(isset($_SESSION['userID'])){
                            // Check if the user already has a saved shipping address
                            $sql = "SELECT * FROM Customer_Shipping_Details WHERE Cust_ID='$cust_id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // If the user has a saved shipping address, fetch the values and pre-populate the form
                                $row = $result->fetch_assoc();
                                $fname = $row['First_Name'];
                                $lname = $row['Last_Name'];
                                $phone = $row['Phone_No'];
                                $email = $row['Email'];
                                $province = $row['Province'];
                                $city = $row['City'];
                                $zip = $row['Zip'];
                                $address = $row['Address1'];
                                $address2 = $row['Address2'];
                            } else {
                                // If the user does not have a saved shipping address, set default values for the form fields
                                $fname = "";
                                $lname = "";
                                $phone = "";
                                $email = "";
                                $province = "";
                                $city = "";
                                $zip = "";
                                $address = "";
                                $address2 = "";
                            }
                          }
                        ?>

                        <!-- Display the form with pre-populated values if they exist -->
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="fname" class="form-label">First Name *</label>
                                <input type="text" class="form-control" name="fname" placeholder="Enter First Name" value="<?php if(isset($_SESSION['userID'])) echo $fname; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" value="<?php if(isset($_SESSION['userID'])) echo $lname; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Phone Number *</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">#</span>
                                    <input type="text" class="form-control" name="phone"  placeholder="+92 XXXXXXXXXX" value="<?php if(isset($_SESSION['userID'])) echo $phone; ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email address *</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="email" class="form-control" name="email" placeholder="example@example.com" value="<?php if(isset($_SESSION['userID'])) echo $email; ?>" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="provinces" class="form-label">Province *</label>
                                <select class="js-example-basic-single" id="provinces" name="province" required onchange="generateCities()">
                                    <option selected disabled value="">Choose...</option>
                                    <option <?php if($province=="Punjab"){echo "selected";} ?>>Punjab</option>
                                    <option <?php if($province=="Sindh"){echo "selected";} ?>>Sindh</option>
                                    <option <?php if($province=="Khyber Pakhtunkhwa"){echo "selected";} ?>>Khyber Pakhtunkhwa</option>
                                    <option <?php if($province=="Balochistan"){echo "selected";} ?>>Balochistan</option>
                                    <option <?php if($province=="Gilgit-Baltistan"){echo "selected";} ?>>Gilgit-Baltistan</option>
                                    <option <?php if($province=="Azad Jammu and Kashmir"){echo "selected";} ?>>Azad Jammu and Kashmir</option>
                                 </select>
                             </div>
                                    <div class="col-md-5">
                                        <label for="cities" class="form-label">City *</label>
                                        <select class="js-example-basic-single" id="cities" name="city" required>
                                            <option selected disabled value="">Choose...</option>
                                            <?php
                                                 echo "<option selected>$city</option>";
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="zip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" name="zip" aria-describedby="emailHelp"
                                            placeholder="" value="<?php if(isset($_SESSION['userID'])) echo $zip ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Address *</label>
                                        <input type="text" class="form-control" name="address" aria-describedby="emailHelp"
                                            placeholder="1234 Main St" required value="<?php if(isset($_SESSION['userID'])) echo $address ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address2" class="form-label">Address 2</label>
                                        <input type="text" class="form-control" name="address2" aria-describedby="emailHelp"
                                            placeholder="1234 Main St" value="<?php if(isset($_SESSION['userID'])) echo $address2 ?>">
                                    </div>
                                    </div>

                        <div class="form-check ps-0 mt-3 custome-form-check">
                            <input class="checkbox_animated check-it" type="checkbox" id="flexCheckDefault11" name="save-shipping">
                            <label class="form-check-label checkout-label" for="flexCheckDefault11">Save this information for next time</label>
                        </div>

                        
                        <button class="btn btn-solid-default mt-4" type="submit">Continue to checkout</button>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="your-cart-box">
                        <h3 class="mb-3 d-flex text-capitalize">Your cart<!--<span
                                class="badge bg-theme new-badge rounded-pill ms-auto bg-dark">3</span>-->
                        </h3>
                        <ul class="list-group mb-3">
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
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?php echo $product_name ?></h6>
                                    <small>Qty: <?php echo $product_qty ?></small>
                                </div>
                                <span><?php echo "Rs. ".$product_total ?></span>
                            </li>
                            
                          	<?php
                        }
                        ?>
                         	<li class="list-group-item d-flex lh-condensed justify-content-between">
                                <span class="fw-bold">Sub Total</span>
                                <strong><?php echo "Rs. ".$total_price; ?></strong>
                            </li>
                          	<li class="list-group-item d-flex lh-condensed justify-content-between">
                                <span class="fw-bold">Discount (20%)</span>
                                <strong><?php echo "- Rs. ". $_SESSION['price']['discount'] ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed active">
                                <div class="text-dark">
                                    <h6 class="my-0">Shipping Charges</h6>
                                </div>
                                <span id="shipping-charges"></span> 
                            </li>
                            <li class="list-group-item d-flex lh-condensed justify-content-between" style="background: #e87316; ">
                                <span class="fw-bold" style="color: #000 !important">Total (PK)</span>
                                <strong id="total-order" style="color: #000 !important"> </strong>
                            </li>
                        </ul>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->

<?php include "footer.php" ?>

<script>
function generateCities() {
  // Get the selected Province
  var province = document.getElementById('provinces').value;
  
  // Send an Ajax request to a PHP script that generates the City options based on the selected Province
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Replace the current options in the City select with the generated options
      document.getElementById('cities').innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "generate_cities.php?province=" + province, true);
  xmlhttp.send();
}
</script>

<script>
$(document).ready(function(){
  $('#cod').click(function(){
    $('.card-details').hide();
  });
  $('#credit').click(function(){
    $('.card-details').show();
  });
  $('#debit').click(function(){
    $('.card-details').show();
  });
});
</script>

    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

  <!-- select2 js -->
    <script src="admin/assets/js/select2.min.js"></script>
    <script src="admin/assets/js/select2-custom.js"></script>


<!-- SHOW MODAL IF USER IS NOT LOGGED IN -->
<div class="modal modal-size fade" id="sizemodal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" style="padding: 60px 30px 60px 30px; text-align: center">
                  <h2> Please login to process checkout</h2>
                  <button onclick="window.location.href='log-in?redirect=shipping';" class="btn btn-solid-default mt-4"> LOGIN NOW </button>
                  <button onclick="window.location.href='cart'" class="btn mt-4" style="background: #fff; border: 1px solid #e87316"> BACK TO CART </button>
                </div>
            </div>
        </div>
    </div>

<script>
  $(document).ready(function(){
   var userLoggedIn = "<?php echo isset($_SESSION['userLoggedIn']); ?>";
   if (!userLoggedIn) {
      $('#sizemodal').modal('show');
      $('#sizemodal').modal({backdrop: 'static', keyboard: false}); // prevent closing of modal
   }
});
</script>
 <?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fname = $conn->real_escape_string($_POST["fname"]);
    $lname = $conn->real_escape_string($_POST["lname"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $province = $_POST["province"];
    $city = $_POST["city"];
    $zip = $conn->real_escape_string($_POST["zip"]);
    $address = $conn->real_escape_string($_POST["address"]);
    $address2 = $conn->real_escape_string($_POST["address2"]);

    // Validate required fields
    if(empty($fname) || empty($lname) || empty($phone) || empty($email) || empty($province) || empty($city) || empty($address)) {
        echo "<script>document.getElementById('message').innerHTML = 'Please fill out all required fields marked *';</script>";
    } else {
      // check if the "save-shipping" checkbox is checked
  		if(isset($_POST['save-shipping']) && $_POST['save-shipping'] == 'on') {
  
      		// Check if a row with Cust_ID equal to $_SESSION['userID'] already exists
            $sql_check = "SELECT * FROM Customer_Shipping_Details WHERE Cust_ID = $cust_id";

            $result = $conn->query($sql_check);

            if ($result->num_rows > 0) {
              // If a row exists, update it
              $sql = "UPDATE Customer_Shipping_Details SET First_Name = '$fname', Last_Name = '$lname', Phone_No = '$phone', Email = '$email', Province = '$province', City = '$city', Zip = '$zip', Address1 = '$address', Address2 = '$address2' WHERE Cust_ID = $cust_id";
            } else {
              // If no row exists, insert a new one
              $sql = "INSERT INTO Customer_Shipping_Details (Cust_ID, First_Name, Last_Name, Phone_No, Email, Province, City, Zip, Address1, Address2) VALUES ($cust_id,'$fname', '$lname', '$phone', '$email', '$province', '$city', '$zip', '$address', '$address2')";
            }

            if ($conn->query($sql) === TRUE) {
              $_SESSION['shipping'] = [
                'fname' => $fname,
                'lname' => $lname,
                'phone' => $phone,
                'email' => $email,
                'province' => $province,
                'city' => $city,
                'zip' => $zip,
                'address' => $address,
                'address2' => $address2,
            ];
              echo '<script>window.location.href= "billing"</script>';
            } else {
              echo "<script>document.getElementById('message').innerHTML = 'Sorry, there was an error processing your shipping. Please try again later.';</script>";
            }

        } else{
          // Save the shipping details to session variables
            $_SESSION['shipping'] = [
                'fname' => $fname,
                'lname' => $lname,
                'phone' => $phone,
                'email' => $email,
                'province' => $province,
                'city' => $city,
                'zip' => $zip,
                'address' => $address,
                'address2' => $address2,
            ];
          	echo '<script>window.location.href= "billing"</script>';
        }
        
    }
}

?>

<!--  Getting Shipping Charges and Total Order Price for the city selected -->
<script>

$(document).ready(function(){
    $('#cities').on('change', function(){
        var city = $(this).val();
      	
        $.ajax({
            url: 'ajax.php?action=get_shipping_charges',
            type: 'POST',
            data: {city: city},
            success: function(response){
                $('#shipping-charges').html(response);
                // Update the total-order element with the updated total order value
                $.ajax({
                    url: 'ajax.php?action=get_total_order',
                    type: 'GET',
                    success: function(response){
                        $('#total-order').html(response);
                    }
                });
            }
        });
    }).trigger('change'); 
    
});


 
   $(document).ready(function(){
    $('#cities').on('change', function(){
        var city = $(this).val();
        $.ajax({
            url: 'ajax.php?action=get_shipping_charges',
            type: 'POST',
            data: {city: city},
            success: function(response){
                $('#shipping-charges').html(response);
                // Update the total-order element with the updated total order value
                $.ajax({
                    url: 'ajax.php?action=get_total_order',
                    type: 'GET',
                    success: function(response){
                        $('#total-order').html(response);
                    }
                });
            }
        });
    });
    
});

</script>

</body>


</html>