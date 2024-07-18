<?php include_once("admin/config.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Voxo">
    <meta name="keywords" content="Voxo">
    <meta name="author" content="Voxo">
    <link rel="icon" href="assets/images/favicon/4.png" type="image/x-icon" />
    <title>Sign Up- Furnterior</title>

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- animation css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick-theme.css">

    <!-- Theme css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo4.css">

</head>

<body class="signup-page theme-color2">
	
    <!-- Sign Up Section Start -->
    <div class="login-section">
        <div class="materialContainer">
            <div class="box">
              <a href="index.php"><img src="assets/images/logo.jpeg" style="width: 100%; margin-bottom: 20px;" ></a>
                <div class="login-title">
                    <h2>Register</h2>
                  	<p id="message">  </p>
                </div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="input">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" required>
                    <span class="spin"></span>
                </div>
              
				<div class="input">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" required>
                    <span class="spin"></span>
                </div>
              
                <div class="input">
                    <label for="emailname">Email Address</label>
                    <input type="email" name="email" id="email" required>
                    <span class="spin"></span>
                </div>            
                

                <div class="input">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" required>
                    <span class="spin"></span>
                </div>

                 <div class="input">
                    <label for="address">Address</label>
                	<input type="text" name="address" id="address" required >
                    <span class="spin"></span>
                </div>
              
              <div class="input">                
                <input class= "form-control form-choose" type="file" name="image" id="image" accept = "image/*">
              </div>
              
                <div class="button login">
                    <button type="submit">
                        <span>Sign Up</span>
                        <i class="fa fa-check"></i>
                    </button>
                </div>
              </form>
                <!--<p class="sign-category">
                    <span>Or sign up with</span>
                </p>

                <div class="row gx-md-3 gy-3">
                    <div class="col-md-12">
                        <a href="www.gmail.html">
                            <div class="social-media google-media">
                                <img src="assets/images/inner-page/google.png" class="img-fluid blur-up lazyload"
                                    alt="">
                                <h6>Google</h6>
                            </div>
                        </a>
                    </div>
                </div> -->
                <p><a href="log-in.php" class="theme-color">Already have an account?</a></p>
            </div>
        </div>
    </div>
  
  <?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		// Retrieve user data from the form
		$name = $_POST['name'];
        $phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['pass'];
      	$address = $_POST['address'];
      	

		// Escape the data to prevent SQL injection
		$name = $conn->real_escape_string($name);
		$phone = $conn->real_escape_string($phone);
        $address = $conn->real_escape_string($address);
		$email = $conn->real_escape_string($email);

		// Encrypt the password using password_hash function
		$encrypted_password = password_hash($password, PASSWORD_BCRYPT);
      
      	//
		// Get the uploaded file information
			$image_name = $_FILES['image']['name'];
			$image_type = $_FILES['image']['type'];
			$image_size = $_FILES['image']['size'];
			$image_temp = $_FILES['image']['tmp_name'];

			// Check if the file is an image
			if(!preg_match("/\.(jpeg|gif|jpg|png)$/i", $image_name)) {
              echo "<script>document.getElementById('message').innerHTML = 'Error: The file you uploaded is not an image.';</script>";
			} else {
				// Check the database connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Upload the image to the server
              	$target_dir= 'admin/customer-profile/';
				$target_path =  $target_dir. basename($image_name);
				move_uploaded_file($image_temp, $target_path);
			
			}
	
		// Insert user data into the database
		$sql = "INSERT INTO Customer (Full_Name, Email, Password, Address, Phone_No, Image) VALUES ('$name', '$email', '$encrypted_password', '$address', '$phone', '$image_name')";
		
      if ($conn->query($sql) === TRUE) {
         // Saving Address information in Customer_Saved_Addresses Table
          $select_CustID= "SELECT Cust_ID FROM Customer WHERE Email = '$email'";
          $result = mysqli_query($conn, $select_CustID);
          $row = mysqli_fetch_assoc($result);
          $cust_id= $row['Cust_ID'];
          $sql_address= "INSERT INTO Customer_Saved_Addresses (Cust_ID,Full_Name,Address,Label,Phone_No) VALUES ($cust_id,'$name','$address','Home','$phone')";
          mysqli_query($conn,$sql_address);
          echo "<script>document.getElementById('message').innerHTML = 'Your account has been created successfully! Sign in Now';</script>";
		
		} else {
		    echo "<script>document.getElementById('message').innerHTML = 'Sorry, there was an error processing your registration. Please try again later.';</script>";
		
		}

		$conn->close();
      
    }
  ?>
    <!-- Sign Up Section End -->

  <script>
  function validateForm() {

    // Get the values of the input fields
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var address = document.getElementById("address").value;
    var image = document.getElementById("image").value;

    // Validate the input fields
    if (name == "" || phone == "" || email == "" || pass == "" || address == "" || image == "") {
      alert("Please fill in all fields.");
      return false;
    }

    // Validate the phone number
    var phone_regex = /^\d{11}$/;
    if (!phone_regex.test(phone)) {
      alert("Please enter a valid 11-digit phone number.");
      return false;
    }

    // Validate the email address
    var email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email_regex.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    }

    // Validate the password
    if (pass.length < 8) {
      alert("Password must be at least 8 characters long.");
      return false;
    }

    // Validate the image file type
    var image_regex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!image_regex.test(image)) {
      alert("Please upload a valid image file (JPG, JPEG, PNG, or GIF).");
      return false;
    }

    // If all input is valid, return true to submit the form
    return true;
  }
</script>


    <div class="bg-overlay"></div>

    <!-- theme Setting Start -->
    <div class="theme-setting">
        <ul>
            <li>
                <button id="darkButton" class="btn btn-sm dark-buttton">Dark</button>
            </li>
            <li>
                <button class="btn btn-sm rtl-button">RTL</button>
            </li>
            <li class="color-picker">
                <input type="color" class="form-control form-control-color" id="ColorPicker1" value="#e22454"
                    title="Choose your color">
            </li>
        </ul>
    </div>
      
      
      ?>
    <!-- theme Setting End -->

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather/feather.min.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/slick-animation.min.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- Notify js-->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/home-script.js"></script>

</body>

</html>