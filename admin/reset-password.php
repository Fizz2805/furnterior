<?php include_once("config.php");?>
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
    <title>Reset Password- Furnterior</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&amp;family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body class="signup-page theme-color2">
	
    <!-- Sign Up Section Start -->
    <div class="login-section">
        <div class="materialContainer">
            <div class="box">
              <img src="assets/images/logo.jpeg" style="width: 100%; margin-bottom: 20px;" >
                <div class="login-title">
                    <h2>Reset Password</h2>
                  	<p id="message">  </p>
                </div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validateForm()">
                <div class="input">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" required>
                  	<i class="fa fa-eye" id="toggle-password" onclick="togglePasswordVisibility()" style="cursor: pointer;
  position: relative; top: -25px; left: 90%; color: #E87316"></i>
                    <span class="spin"></span>
                </div>

              <div class="input">
                    <button type="button" class="button login" onclick="generatePassword()" style="border: 1px solid orange; padding-top: 10px; padding-bottom: 10px;">Generate Random Password</button>
                </div>

                 
                <div class="button login">
                    <button type="submit">
                        <span>Save Password</span>
                        <i class="fa fa-check"></i>
                    </button>
                </div>
              </form>
                
                <p><a href="login" class="theme-color">Login Instead?</a></p>
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
		$password = $_POST['pass']; 
      	// Token value from db
      	$sql = "SELECT Token FROM Admin LIMIT 1";
        $result = $conn->query($sql);
      	$row = $result->fetch_assoc();
      	$token= $row['Token'];
		// Insert user data into the database
		$sql = "UPDATE Admin SET Password= '$password' WHERE Token= '$token'";
		if ($conn->query($sql) === TRUE) {
		    echo "<script>document.getElementById('message').innerHTML = 'Your password has been reset. Redirecting to Login page ...';</script>";
      		echo "<meta http-equiv='refresh' content='3;url=login.php'>"; // 3 seconds delay
			exit; // terminate the script to prevent further output
		
		} else {
		    echo "<script>document.getElementById('message').innerHTML = 'Sorry, there was an error processing your password reset.';</script>";
		
		}

		$conn->close();
      
    }
  ?>
    <!-- Sign Up Section End -->

  <script>
  function validateForm() {

    // Get the values of the input field
    var pass = document.getElementById("pass").value;

    // Validate the password
    if (pass.length < 8) {
      alert("Password must be at least 8 characters long.");
      return false;
    }


    // If all input is valid, return true to submit the form
    return true;
  }
</script>

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
  </script>
       <!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Theme js-->
    <script src="assets/js/script.js"></script>

	<!-- JavaScript code to generate a random password -->
    <script>
    function generatePassword() {
        var length = 12; // Change this to adjust the length of the password
        var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?";
        var password = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            password += charset.charAt(Math.floor(Math.random() * n));
        }
        document.getElementById("pass").value = password;
    }
    </script>
  
</body>

</html>