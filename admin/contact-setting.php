<?php
  session_start();
  if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
      header("location: login.php");
      exit;
  }

	require_once "config.php";
    $sql = "SELECT * FROM Contact_Details";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$email= $row['Email'];
	$phone1= $row['Phone_No_1'];
	$phone2= $row['Phone_No_2'];
    $addr= $row['Address'];
	$map= $row['Google_Map'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Voxo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Voxo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Store Contact Setting - Furnterior</title>

    <!-- Google font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&amp;family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- fontawesome css  -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Themify icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!--Drop zon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/dropzone.css">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- Select2 css -->
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/date-picker.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- Bootstrap-tag input css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap-tagsinput.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  
  	<!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- tap on top start-->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">
        <?php include("header.php") ?>

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <?php include("sidebar.html") ?>

            <!-- Settings Section Start -->
            <div class="page-body">
                <div class="title-header">
                    <h5>Store Contact Details Setting</h5>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Details Start -->
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="theme-form theme-form-2 mega-form" name="contact">
                                                <div class="row">                                                                                                	
                                                  <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Email
                                                            </label>
                                                        <div class="col-sm-10">
                                                            <input name="email" class="form-control" type="email" value='<?php echo $email ?>'>
                                                        </div>
                                                    </div>	
                                                  
                                                  	<div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Phone# 1
                                                           </label>
                                                        <div class="col-sm-10">
                                                            <input name="phone1" class="form-control" type="text" value='<?php echo $phone1 ?>'>
                                                        </div>
                                                    </div>
                                                  
                                                  	<div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Phone# 2
                                                           </label>
                                                        <div class="col-sm-10">
                                                            <input name="phone2" class="form-control" type="text" value='<?php echo $phone2 ?>'>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Address</label>
                                                        <div class="col-sm-10">
                                                            <input name="addr" class="form-control" type="text" value='<?php echo $addr ?>'>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Google Map Embed Link</label>
                                                        <div class="col-sm-10">
                                                            <input name="map" class="form-control" type="text" value='<?php echo $map ?>'>
                                                        </div>
                                                    </div>

                                                    
                                                </div>
                                        <div class="card">
                                        <div class="card-body">
                                            <div class="button login">
                                                <button type="submit" style="width: 100%;left: 0%;background-color: var(--theme-color);border: 1px solid var(--theme-color);font-weight: 900;font-size: 18px;color: #fff;padding: calc(13px + (18 - 13) * ((100vw - 320px) / (1920 - 320)));border-radius: 4px;">
                                                    <span>Save Contact Details</span>
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                    
                                    <!-- Details End -->

                                    <!-- Address Start -->
                                    <!-- <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2 mb-3">
                                                <h5>Address</h5>
                                            </div>

                                            <div class="save-details-box">
                                                <div class="row g-4">
                                                    <div class="col-xl-4 col-md-6">
                                                        <div class="save-details">
                                                            <div class="save-name">
                                                                <h5>Mark Jugal</h5>
                                                            </div>

                                                            <div class="save-position">
                                                                <h6>Home</h6>
                                                            </div>

                                                            <div class="save-address">
                                                                <p>549 Sulphur Springs Road</p>
                                                                <p>Downers Grove, IL</p>
                                                                <p>60515</p>
                                                            </div>

                                                            <div class="mobile">
                                                                <p class="mobile">Mobile No. +1-123-456-7890</p>
                                                            </div>

                                                            <div class="button">
                                                                <a href="javascript:void(0)" class="btn btn-sm">Edit</a>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-sm">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-4 col-md-6">
                                                        <div class="save-details">
                                                            <div class="save-name">
                                                                <h5>Method Zaki</h5>
                                                            </div>

                                                            <div class="save-position">
                                                                <h6>Office</h6>
                                                            </div>

                                                            <div class="save-address">
                                                                <p>549 Sulphur Springs Road</p>
                                                                <p>Downers Grove, IL</p>
                                                                <p>60515</p>
                                                            </div>

                                                            <div class="mobile">
                                                                <p class="mobile">Mobile No. +1-123-456-7890</p>
                                                            </div>

                                                            <div class="button">
                                                                <a href="javascript:void(0)" class="btn btn-sm">Edit</a>
                                                                <a href="javascript:void(0)" class="btn btn-sm">
                                                                    Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-4 col-md-6">
                                                        <div class="save-details">
                                                            <div class="save-name">
                                                                <h5>Mark Jugal</h5>
                                                            </div>

                                                            <div class="save-position">
                                                                <h6>Home</h6>
                                                            </div>

                                                            <div class="save-address">
                                                                <p>549 Sulphur Springs Road</p>
                                                                <p>Downers Grove, IL</p>
                                                                <p>60515</p>
                                                            </div>

                                                            <div class="mobile">
                                                                <p class="mobile">Mobile No. +1-123-456-7890</p>
                                                            </div>

                                                            <div class="button">
                                                                <a href="javascript:void(0)" class="btn btn-sm">Edit</a>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-sm">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- Address End -->
                                  
                                  </div>
                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Settings Section End -->
        </div>
        <!-- Page Body End-->

        <!-- footer start-->
        <div class="container-fluid">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2023 © Furnterior by Codemply</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- footer End-->
    </div>
    <!-- page-wrapper End-->
      <div id="notification"> </div>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
  // Retrieve user data from the form
		$email = $_POST['email'];
        $phone1 = $_POST['phone1'];
		$phone2 = $_POST['phone2'];
		$addr = $_POST['addr'];
    	$map= $_POST['map'];

		// Escape the data to prevent SQL injection
		$email = $conn->real_escape_string($email);
		$phone1 = $conn->real_escape_string($phone1);
    	$phone2 = $conn->real_escape_string($phone2);
		$addr = $conn->real_escape_string($addr);

			
		// Insert user data into the database
		$sql = "UPDATE Contact_Details SET Email='$email', Phone_No_1='$phone1', Phone_No_2='$phone2', Address='$addr', Google_Map='$map' WHERE Email= '$email'";
		if ($conn->query($sql) === TRUE) {
		    echo "<script>
              // After successful insertion, show notification
              $('#notification').html('Profile updated successfully!')
                .fadeIn('slow', function() {
                  $(this).delay(5000).fadeOut('slow');
              });
            </script>";
          	echo "<meta http-equiv='refresh' content='1;url=contact-setting'>"; 
			exit;
			
		} else {
		    echo mysqli_error($conn);
		
		}

		$conn->close();
      
    }
  ?>
  
    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="button-box">
                        <button type="button" class="btn btn--no " data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn  btn--yes btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->


    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- scrollbar simplebar js-->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>

    <!-- Sidebar jquery-->
    <script src="assets/js/config.js"></script>
    <!-- Plugins JS start-->

    <!-- bootstrap tag-input JS start-->
    <script src="assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="assets/js/sidebar-menu.js"></script>

    <!-- customizer js start  -->
    <script src="assets/js/customizer.js"></script>
    <!-- customizer js end -->

    <!--Dropzon start-->
    <script src="assets/js/dropzone/dropzone.js"></script>
    <script src="assets/js/dropzone/dropzone-script.js"></script>

    <!--Dropzon start-->
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>
    <!-- Plugins JS Ends-->

    <!-- Theme js-->
    <script src="assets/js/script.js"></script>
</body>

</html>