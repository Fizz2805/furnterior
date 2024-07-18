<?php
	$page_title = 'Billing';
    require_once "header-new.php";
	require_once "navbar.php";
    require_once "admin/config.php";
 	$cust_id= $_SESSION['userID'];
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
                    <h3>Billing</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            / <li class="breadcrumb-item active" aria-current="page">Billing</li>
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
                  <div class="circle active">
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
                    <h3 class="mb-3">Billing address</h3>
                  	<div id="message">  </div>
       				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation theme-form">
                      <?php
                        // Check if the user already has a saved shipping address
                        $sql = "SELECT * FROM Customer_Billing_Details WHERE Cust_ID='$cust_id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // If the user has a saved shipping address, fetch the values and pre-populate the form
                            $row = $result->fetch_assoc();
                            $fname = $row['First_Name'];
                            $lname = $row['Last_Name'];
                            $phone = $row['Phone_No'];
                            $email = $row['Email'];
                            $country = $row['Country'];
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
                            $country = "";
                            $city = "";
                            $zip = "";
                            $address = "";
                            $address2 = "";
                        }
                        ?>

                        <!-- Display the form with pre-populated values if they exist -->
                        <div class="row g-4">
                          
                            <div class="col-md-6">
                                <label for="fname" class="form-label">First Name *</label>
                                <input type="text" class="form-control" name="fname" placeholder="Enter First Name" value="<?php echo $fname; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" value="<?php echo $lname; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Phone Number *</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">#</span>
                                    <input type="text" class="form-control" name="phone"  placeholder="+92 XXXXXXXXXX" value="<?php echo $phone; ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email address *</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="email" class="form-control" name="email" placeholder="example@example.com" value="<?php echo $email; ?>" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="provinces" class="form-label">Country *</label>
                                <select class="js-example-basic-single" id="country" name="country" required>
                                    <option selected disabled value="">Choose...</option>
                                 </select>
                             </div>
                                    <div class="col-md-5">
                                        <label for="cities" class="form-label">City *</label>
                                        <input type="text" class="form-control" name="city" placeholder="" value="<?php echo $city; ?>" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="zip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" name="zip" aria-describedby="emailHelp"
                                            placeholder="" value="<?php echo $zip ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Address *</label>
                                        <input type="text" class="form-control" name="address" aria-describedby="emailHelp"
                                            placeholder="1234 Main St" required value="<?php echo $address ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address2" class="form-label">Address 2</label>
                                        <input type="text" class="form-control" name="address2" aria-describedby="emailHelp"
                                            placeholder="1234 Main St" value="<?php echo $address2 ?>">
                                    </div>
                                    </div>

                        <div class="form-check ps-0 mt-3 custome-form-check">
                            <input class="checkbox_animated check-it" type="checkbox" id="save-billing" name="save-billing">
                            <label class="form-check-label checkout-label" for="flexCheckDefault11">Save this information for next time</label>&nbsp;&nbsp;&nbsp;
                          	<input class="checkbox_animated check-it" type="checkbox" id="same-as-shipping" name="same-as-shipping">
                            <label class="form-check-label checkout-label" for="flexCheckDefault11">Same as Shipping Address</label>
                      </div>
                      </div>

				<div class="col-lg-4">
                        <h3 class="mb-3">Payment Method</h3>
                        <div class="d-block my-3">
                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="stripe" id="credit" checked>
                                <label class="form-check-label" for="credit">Pay Via Stripe</label>
                            </div>

                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="cod" id="cod">
                                <label class="form-check-label" for="paypal">Cash on Delivery (COD)</label>
                            </div>
                        </div>
                        <div class="row g-4 stripe-btn">
                          <button class="btn btn-solid-default mt-4" type="submit">Pay Now</button>
                        </div>
                        <div class="row g-4 cod-btn" style="display:none">
                          <button class="btn btn-solid-default mt-4" type="submit">Confirm Order</button>
                        </div>
                    
                </div>
         	</div>
                
          </form>
      </div>
    </section>
    <!-- Cart Section End -->

<?php include "footer.php" ?>

<script>
$(document).ready(function(){
  $('#credit').click(function(){
    $('.stripe-btn').show();
    $('.cod-btn').hide();
    $("#cod").prop("checked", false);
  });
  $('#cod').click(function(){
    $('.stripe-btn').hide();
    $('.cod-btn').show();
    $("#credit").prop("checked", false);
  });
});
</script>

<!-- 
	GETTING NAMES OF COUNTRIES 
  	API USED: REST Countries
-->
<script>
// Define the endpoint URL for the REST Countries API
const endpoint_country = 'https://restcountries.com/v3.1/all';

// Fetch the list of countries from the API
fetch(endpoint_country)
  .then(response => response.json())
  .then(data => {
    // Get a reference to the select dropdown
    const select = document.getElementById('country');

    // Loop through the list of countries and add them as options to the select dropdown
    data.forEach(country => {
      const option = document.createElement('option');
      option.value = country.name.common;
      option.text = country.name.common;
      select.add(option);
    });
  });
</script>

<!--
<script>
		// Set the API endpoint URL
		const endpoint = 'https://api.teleport.org/api/cities/';

		// Fetch the list of cities from the API
		fetch(endpoint)
			.then(response => response.json())
			.then(data => {
				// Get a reference to the select dropdown
				const select = document.getElementById('city');

				// Loop through the list of cities and add them as options to the select dropdown
				data._embedded['city:search-results'].forEach(city => {
					const option = document.createElement('option');
					option.value = city.matching_full_name;
					option.text = city.matching_full_name;
					select.add(option);
				});
			})
			.catch(error => console.error(error));
	</script> -->

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

<!-- If "Same as Shipping Address" is checked  -->
<script>
  var ship_checkbox = document.getElementById('same-as-shipping');
  var shipping = <?php echo json_encode($_SESSION['shipping']); ?>;
  var fname = document.getElementsByName('fname')[0];
  var lname = document.getElementsByName('lname')[0];
  var phone = document.getElementsByName('phone')[0];
  var email = document.getElementsByName('email')[0];
  var city = document.getElementsByName('city')[0];
  var zip = document.getElementsByName('zip')[0];
  var address = document.getElementsByName('address')[0];
  var address2 = document.getElementsByName('address2')[0];
  
  ship_checkbox.addEventListener('change', function() {
    if(this.checked) {
      fname.value = shipping.fname;
      lname.value = shipping.lname;
      phone.value = shipping.phone;
      email.value = shipping.email;
      city.value = shipping.city;
      zip.value = shipping.zip;
      address.value = shipping.address;
      address2.value = shipping.address2;
    } 
    else {
      fname.value = '';
      lname.value = '';
      phone.value = '';
      email.value = '';
      city.value = '';
      zip.value = '';
      address.value = '';
      address2.value = '';
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
    $country = $_POST["country"];
    $city = $conn->real_escape_string($_POST["city"]);
    $zip = $conn->real_escape_string($_POST["zip"]);
    $address = $conn->real_escape_string($_POST["address"]);
    $address2 = $conn->real_escape_string($_POST["address2"]);
  	
    $_SESSION['billing_address']= $address;
  	
  
    // Validate required fields
    if(empty($fname) || empty($lname) || empty($phone) || empty($email) || empty($country) || empty($city) || empty($address)) {
        echo "<script>document.getElementById('message').innerHTML = 'Please fill out all required fields marked *';</script>";
    } else {
      // check if the "save-billing" checkbox is checked
  		if(isset($_POST['save-billing']) && $_POST['save-billing'] == 'on') 
        {
  
      		// Check if a row with Cust_ID equal to $_SESSION['userID'] already exists
            $sql_check = "SELECT * FROM Customer_Billing_Details WHERE Cust_ID = $cust_id";

            $result = $conn->query($sql_check);

            if ($result->num_rows > 0) {
              // If a row exists, update it
              $sql = "UPDATE Customer_Billing_Details SET First_Name = '$fname', Last_Name = '$lname', Phone_No = '$phone', Email = '$email', Country = '$country', City = '$city', Zip = '$zip', Address1 = '$address', Address2 = '$address2' WHERE Cust_ID = $cust_id";
            } else {
              // If no row exists, insert a new one
              $sql = "INSERT INTO Customer_Billing_Details (Cust_ID, First_Name, Last_Name, Phone_No, Email, Country, City, Zip, Address1, Address2) VALUES ($cust_id,'$fname', '$lname', '$phone', '$email', '$country', '$city', '$zip', '$address', '$address2')";
            }

            if ($conn->query($sql) === TRUE) {
                if(isset($_POST["cod"])){
                $_SESSION['pay_method']= "COD";
                echo '<script>window.location.href= "order-success"</script>';
              }
              else{
                $_SESSION['pay_method']= "Stripe"; 
                // Save the billing details to session variables
                $_SESSION['billing'] = [
                    'fname' => $fname,
                    'lname' => $lname,
                    'phone' => $phone,
                    'email' => $email,
                    'country' => $country,
                    'city' => $city,
                    'zip' => $zip,
                    'address' => $address,
                    'address2' => $address2,
                ];
                echo '<script>window.location.href= "stripe-payment/"</script>';
              }
            } else {
              echo "<script>document.getElementById('message').innerHTML = 'Sorry, there was an error processing your shipping. Please try again later.';</script>";
            }

        } 
      else
        {
          	if(isset($_POST["cod"])){
              $_SESSION['pay_method']= "COD";
              echo '<script>window.location.href= "order-success"</script>';
            }
          	else{
             $_SESSION['pay_method']= "Stripe";
              // Save the billing details to session variables
              $_SESSION['billing'] = [
                  'fname' => $fname,
                  'lname' => $lname,
                  'phone' => $phone,
                  'email' => $email,
                  'country' => $country,
                  'city' => $city,
                  'zip' => $zip,
                  'address' => $address,
                  'address2' => $address2,
              ];
             echo '<script>window.location.href= "stripe-payment/"</script>';
            }
        }
        
    }
}

?>


</body>


</html>