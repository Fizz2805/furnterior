<?php
$page_title = 'Login';
require_once "header-new.php";
require_once "admin/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Funterior">
    <meta name="keywords" content="Funterior">
    <meta name="author" content="Funterior">
    <link rel="icon" href="assets/images/favicon/4.png" type="image/x-icon" />

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

<body class="theme-color2 light ltr">


    <!-- Log In Section Start -->
    <div class="login-section">
        <div class="materialContainer">
            <div class="box">
              <a href="/"><img src="assets/images/logo.jpeg" style="width: 100%; margin-bottom: 20px;" ></a>
                <div class="login-title">
                    <h2>Login</h2>
                  	<p id="error-message"> </p>
                </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?redirect=<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : ''; ?>" method="post" onsubmit="return validateForm()">
                              
                <div class="input form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    <span class="spin"></span>
                   </div>

                <div class="input form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass"class="form-control" required>
                  	<i class="fa fa-eye" id="toggle-password" onclick="togglePasswordVisibility()" style="cursor: pointer;
  position: relative; top: -25px; left: 90%; color: #E87316"></i>
                  	<span class="spin"></span>
                </div>
                
                <div class="row pass-forgot">
                              <div class="col"  style="text-align: left !important; margin-top: 10px;">
                              	<input class="checkbox_animated" type="checkbox"  value="remember" id="remember">
                                <label for="remember">Remember me</label>  
                              </div>
                             <!-- <div class="col">
                              	<a href="forgot-password" class="pass-forgot">Forgot your password?</a>
                              </div>-->
                </div>
                
                <div class="button login">
                  	
                   <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_GET['redirect'] ?? ''); ?>">
                    <button type="submit">
                        <span>Log In</span>
                        <i class="fa fa-check"></i>
                    </button>
                </div>
                
              </form>
              
              
                <!--<p class="sign-category">
                    <span>Or sign in with</span>
                </p>

                <div class="row gx-md-3 gy-3">
                    <div class="col-md-6">
                        <a href="www.facebook.html">
                            <div class="social-media fb-media">
                                <img src="assets/images/inner-page/facebook.png" class="img-fluid blur-up lazyload"
                                    alt="">
                                <h6>Facebook</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="www.gmail.html">
                            <div class="social-media google-media">
                                <img src="assets/images/inner-page/google.png" class="img-fluid blur-up lazyload"
                                    alt="">
                                <h6>Google</h6>
                            </div>
                        </a>
                    </div>
                </div> -->

                <p>Not a member? <a href="sign-up.php" class="theme-color">Sign up now</a></p>

            </div>
        </div>
    </div>
    <!-- Log In Section End -->

  <script>
    function togglePasswordVisibility() {
      const passField = document.getElementById("pass");
      const toggleBtn = document.getElementById("toggle-password");

      if (passField.type === "password") {
        passField.type = "text";
        toggleBtn.classList.remove("fa-eye");
        toggleBtn.classList.add("fa-eye-slash");
      } else {
        passField.type = "password";
        toggleBtn.classList.remove("fa-eye-slash");
        toggleBtn.classList.add("fa-eye");
      }
	}

  function validateForm() {

    // Get the values of the input fields
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var error= document.getElementById("error-message");
    var textNode = document.createTextNode("New text content");
    
    // Validate the input fields
    if (email == "" || pass == "") {
      error.replaceChild(textNode, error.firstChild);
      error.textContent= "Please fill in all fields.";

      return false;
    }

    // Validate the email address
    var email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email_regex.test(email)) {
      error.replaceChild(textNode, error.firstChild);
      error.textContent= "Please enter valid email address.";
      document.getElementById("email").focus();
      return false;
    }

    // Validate the password
    if (pass.length < 8) {
      error.replaceChild(textNode, error.firstChild);
      error.textContent= "Password must be at least 8 characters long.";
      document.getElementById("pass").focus();
      return false;
    }


    // If all input is valid, return true to submit the form
    return true;
  }
    
    
</script>
<script>
function errorForWrongLogin(context){
      	var error= document.getElementById("error-message");
    	var textNode = document.createTextNode("New text content");
      
      	if(context=== "Email"){
          error.replaceChild(textNode, error.firstChild);
          error.textContent= "User with this email does not exit!";
          document.getElementById("email").focus();
        } else if(context=== "Password"){
          error.replaceChild(textNode, error.firstChild);
          error.textContent= "Incorrect Password! Please try again";
          document.getElementById("pass").focus();
        }
    }
  </script>
  
  <?php

$email = $password = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = trim($_POST["email"]);
        $password = $_POST["pass"];
  
        $sql = "SELECT * FROM Customer WHERE Email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // User exists
            $row = $result->fetch_assoc();
          	$id= $row['Cust_ID'];
            $hashedPassword = $row['Password'];
            /*$info = password_get_info($hashedPassword);
            $algo = $info['algo']; // get the algorithm name

          echo "<script> console.log('Password hash was created using {$algo} algorithm');</script>";

          	
          $verify= password_verify($password, $hashedPassword);
          if($verify) { echo '<script> console.log("yes!"); </script>'; }
          else {echo '<script> console.log("no!"); </script>';} */
            // Verify password
            if (password_verify($password, $hashedPassword)) {
                // Password is correct
              	$_SESSION["userLoggedIn"]= true; 
              	$_SESSION["userID"]= $id;
              	if (isset($_POST['remember'])) {
                  echo '<script> console.log("Cookies Set"); </script>';
                    // Set a cookie with the email and password that expires in 30 days
                    setcookie('email', $email, time() + (30 * 24 * 60 * 60), '/');
                    setcookie('pass', $userpassword, time() + (30 * 24 * 60 * 60), '/');
                } else {
                    // Remove any existing cookies
                    setcookie('email', '', time() - 3600, '/');
                    setcookie('pass', '', time() - 3600, '/');
                }
              if (isset($_GET['redirect']) && $_GET['redirect'] == 'shipping') {
                    // Redirect to the shipping page
                   echo '<script> window.location.href="shipping" </script>';
                    exit;
                } else {
                    // Redirect to the user dashboard
                    echo '<script> window.location.href="user-dashboard" </script>';
                    exit;
                }
            } else {
                // Password is incorrect
                echo '<script> errorForWrongLogin("Password"); </script>';
            }
        } else {
            // User does not exist
            echo '<script>errorForWrongLogin("Email");</script>';
        }
}  
    
?>

    <div class="bg-overlay"></div>

    
<!-- latest jquery-->
<script src="assets/js/jquery-3.5.1.min.js"></script>

<!-- Add To Home js -->
<script src="assets/js/pwa.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>

<!-- lazyload js-->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/slick-animation.min.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- Notify js-->
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- Price Filter js -->
<script src="assets/js/price-filter.js"></script>

<!--Plugin JavaScript file-->
<script src="assets/js/ion.rangeSlider.min.js"></script>

<!-- Filter Hide and show Js -->
<script src="assets/js/filter.js"></script>

<!-- Notify js-->
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>


</body>
</html>