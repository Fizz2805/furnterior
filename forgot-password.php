<?php 
session_start();
include_once("admin/config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Forgot Password - Furnterior</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&amp;family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/font-awesome.css">

    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/themify.css">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/feather-icon.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/style.css">

    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/responsive.css">
</head>

<body>
    <!-- Forgot password start-->
    <div class="login-section">
        <div class="materialContainer">
            <div class="box">
                <div class="login-title">
                    <h2>Forgot Password</h2>
                  <p id="message"> </p>
                </div>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="input">
                    <label for="email">Enter Your Registered Email</label>
                    <input type="email" name="email" id="email">
                    <span class="spin"></span>
                </div>
                <div class="button login button-1" type="submit">
                    <button>
                        <span>Send</span>
                        <i class="fa fa-check"></i>
                    </button>
                </div>
                </form>
            </div>
              
        </div>
    </div>
    <!-- Forgot password end-->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>document.getElementById('message').innerHTML = 'Error: Invalid Email format';</script>";
    } else {
        // Check if the email exists in your database
        $query = "SELECT * FROM Customer WHERE Email = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0) {
            echo "<script>document.getElementById('message').innerHTML = 'Email does not exist';</script>";
        } else {
            // Generate a random password reset token
            $token = bin2hex(random_bytes(32));
			
          	//
          	$_SESSION["forgot-user-email"] = $email;
            // Save the token to the database along with the email
            $query = "UPDATE Customer SET Token = '$token' WHERE Email = '$email'";
            mysqli_query($conn, $query);

            // Send an email to the user with the password reset link
          
          	$to = $email;
            $subject = 'Password reset';

            // Load your HTML email template into a variable
            $html_message = file_get_contents('admin/email templates/reset-password.html');
          	$link = "<button><a href='https://codemply.com/reset-password.php?token=$token'>Reset Password</a></button>";
            $html_message = str_replace('{link}', $link, $html_message);

            // Set the headers for the email, including the content type
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-type: text/html\r\n";
            if(mail($to, $subject, $html_message, $headers))
            	echo "<script>document.getElementById('message').innerHTML = 'A Password reset link has been sent on your email. ';</script>";
          	else
              	echo "<script>document.getElementById('message').innerHTML = 'An error occurred while resetting your Password. Please try again!';</script>";
        }
    }
}
?>


    <!-- latest jquery-->
    <script src="admin/assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Theme js-->
    <script src="admin/assets/js/script.js"></script>
</body>
<!-- JavaScript code to display the notification popup -->
<script>
function showNotification(message) {
    var popup = document.createElement("div");
    popup.className = "notification-popup";
    popup.textContent = message;
    document.body.appendChild(popup);
    setTimeout(function() {
        popup.remove();
    }, 3000);
}
</script>
  
</html>