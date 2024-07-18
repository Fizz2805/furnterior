<?php
$page_title = 'Contact Us';
require_once "header-new.php";
require_once "navbar.php";
require_once "admin/config.php";

	$sql = "SELECT * FROM Contact_Details";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$email= $row['Email'];
	$phone1= $row['Phone_No_1'];
	$phone2= $row['Phone_No_2'];
    $addr= $row['Address'];
	$map= $row['Google_Map'];
?>

<body class="theme-color2 light ltr">

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
                    <h3>Contact Us</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Contact Section Start -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="materialContainer">
                        <div class="material-details">
                            <div class="title title1 title-effect mb-1 title-left">
                                <h2>Contact Us</h2>
                                <p class="ms-0 w-100">Your email address will not be published. Required fields are
                                    marked *</p>
                            </div>
                          <div id="message" style="display:none;background-color: #d4edda;border: 1px solid #c3e6cb;padding: 10px;margin-bottom: 10px; margin-top: 10px;"> </div>
                        </div>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="contact-form">                
                        <div class="row g-4 mt-md-1 mt-2">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Your Email"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone"
                                    placeholder="Enter Your Phone Number">
                            </div>
                            <div class="col-md-6">
                                <label for="city" class="form-label">City *</label>
                                <input type="text" class="form-control" name="city"
                                    placeholder="Enter Your City" required>
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" name="message" rows="5" required></textarea>
                            </div>
                          
                          	<div class="col-auto">
                              	<button class="btn btn-solid-default" type="submit">Submit</button>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="contact-details">
                        <div>
                            <h2>Let's get in touch</h2>
                            <h5 class="font-light">We're open for any suggestion or just to have a chat</h5>
                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="map-pin"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Address :</h4>
                                    <p><?php echo $addr; ?></p>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="phone"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Phone Number :</h4>
                                    <p><?php echo $phone1; ?></p>
                                    <p><?php echo $phone2; ?></p>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-icon">
                                    <i data-feather="mail"></i>
                                </div>
                                <div class="contact-title">
                                    <h4>Email Address :</h4>
                                    <p><?php echo $email; ?></p>
                                </div>
                            </div>                          	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Section start -->
    <section class="contact-section">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-12 p-0">
                    <div class="location-map">
                        <iframe
                            src="<?php echo $map; ?>"
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Section End -->


    <!-- footer start -->
  <?php include("footer.php"); ?>
  
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
		$city = $_POST['city'];
      	$mssg = $_POST['message'];
      	
		// Escape the data to prevent SQL injection
		$name = $conn->real_escape_string($name);
		$phone = $conn->real_escape_string($phone);
        $city = $conn->real_escape_string($city);
		$email = $conn->real_escape_string($email);
    	$mssg = $conn->real_escape_string($mssg);
		$mssg = nl2br($mssg); // new line to br tag
		// Insert user data into the database
		$sql = "INSERT INTO Contact_Messages (Name, Email, Phone, City, Message) VALUES ('$name', '$email', '$phone', '$city', '$mssg')";
		if ($conn->query($sql) === TRUE) {
		    echo "<script>document.getElementById('message').innerHTML = 'Thank you! Your response has been submitted. We will get back to you soon.';</script>";
			$admin_que= "SELECT Email FROM Admin LIMIT 1";
          	$result = $conn->query($admin_que);
            $row = $result->fetch_assoc();
            $admin_email= $row['Email'];
          	
          	$to = $admin_email;
            $subject = 'New Contact Form Submission';

            // Load your HTML email template into a variable
            $html_message = file_get_contents('admin/email-templates/contact-form-submission.html');

            // Replace the placeholders in the email template with the contact form details
            $html_message = str_replace('{name}', $name, $html_message);
            $html_message = str_replace('{email}', $email, $html_message);
          	$html_message = str_replace('{city}', $city, $html_message);
            $html_message = str_replace('{phone}', $phone, $html_message);
            $html_message = str_replace('{message}', $mssg, $html_message);

            // Set the headers for the email, including the content type
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-type: text/html\r\n";

            // Send the email
            if (mail($to, $subject, $html_message, $headers)) {
              	// Set a session variable to indicate that a new submission has been received
  				$_SESSION['new_contact_message'] = true;              	
              	echo "<script> document.getElementById('message').style.display= 'block';document.getElementById('message').innerHTML = 'Your message has been sent successfully.';</script>";
            } else {
                echo "<script>document.getElementById('message').innerHTML = 'Sorry, there was an error sending your message. Please try again later.';</script>";
            }
		} else {
		    echo "<script>document.getElementById('message').innerHTML = 'Sorry, there was an error sending your message. Please try again later.';</script>";
		
		}

		$conn->close();
      
    }
  
  ?>
 
    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

