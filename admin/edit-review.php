<?php
  session_start();
  if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
      header("location: login.php");
      exit;
  }
	
	$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$parts = explode("=", $url);
	$id = $parts[1];

	include "config.php";
	$sql = "SELECT * FROM Reviews WHERE Review_ID='$id'";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$r_name= $row['Name'];
	$mssg= $row['Message'];
	$rating= $row['Rating'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <!-- meta data -->
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
    <title>Edit Review- Furnterior</title>

    <!-- Google font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&amp;family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Themify icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!--Dropzon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/dropzone.css">

    <!-- Feather icon css-->
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
<style>
 
  .rating {
display: flex;
flex-direction: row-reverse;
justify-content: left;
}


.rating > input{ display:none;}

.rating > label {
position: relative;
width: 1.1em;
font-size: 3vw;
color: #e87316;
cursor: pointer;
}

.rating > label::before{
content: "\2605";
position: absolute;
opacity: 0;
}

.rating > label:hover:before,
.rating > label:hover ~ label:before {
opacity: 1 !important;
}

.rating > input:checked ~ label:before{
opacity:1;
}

.rating:hover > input:checked ~ label:before{ opacity: 0.4; }
  </style>
</head>

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper start -->
    <div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">
        <!-- Page Header start -->      
        <?php include("header.php"); ?>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <?php include("sidebar.html"); ?>
        
            <div class="page-body">
                <div class="title-header">
                    <h5>Edit Review</h5>
                </div>

                <!-- New Product Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $id; ?>" method="post" class="theme-form theme-form-2 mega-form">                
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                            </div>
                                            
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">
                                                            Name *</label>
                                                        <div class="col-sm-10">
                                                            <input name="name" id="name" class="form-control" type="text"
                                                                placeholder="Name" value="<?php echo $r_name ?>" required>
                                                        </div>
                                                    </div>
                                                  
                                                  <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">
                                                            Feedback *</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="mssg" id="mssg" class="form-control" style="height: 150px;"
                                                                placeholder="Feedback Message" required> <?php echo $mssg ?> </textarea>
                                                        </div>
                                                    </div>
													
                                                  <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">
                                                            Rating *</label>
                                                        <div class="col-sm-10">
                                                            <div class="rating">  
                                                              <input type="radio" name="rating" value="5" id="5" checked><label for="5">☆</label>
                                                              <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                              <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                              <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                              <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                  <div class="card">
                                        <div class="card-body">
                                          <div class="button login">
                                            <button type="submit" style="width: 100%;
    left: 0%;
    background-color: var(--theme-color);
    border: 1px solid var(--theme-color);
    font-weight: 900;
    font-size: 18px;
    color: #fff;
    padding: calc(13px + (18 - 13) * ((100vw - 320px) / (1920 - 320)));
    border-radius: 4px;">
                                                <span>Save Review</span>
                                            </button>
                                        </div>
                                    </div>
                                  </div>
                                  
                                </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Product Add End -->
				<!-- for showing product successful message-->
              	<div id="notification" style="position: fixed; bottom: 30px; right: 20px;background-color: #60C081;color: #fff;font-size: 18px;padding: 15px 20px;border-radius: 5px;z-index: 9999;display: none;"></div>
              
                <!-- footer Start -->
                <div class="container-fluid">
                    <footer class="footer">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2023 © Furnterior by Codemply</p>
                            </div>
                        </div>
                    </footer>
                </div>
                <!-- footer En -->
            </div>
            <!-- Container-fluid End -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End -->

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

  
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Check connection
     
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

		// Retrieve user data from the form
		$name = $_POST['name'];
        $mssg = $_POST['mssg'];
		$star = $_POST['rating'];
      	            
		// Insert product data into the database
		$sql = "UPDATE Reviews SET Name='$name', Message='$mssg', Rating='$star' WHERE Review_ID=$id";
		if ($conn->query($sql) === TRUE) {
		    echo "<script>
              // After successful product insertion, show notification
              $('#notification').html('New Review added successfully!')
                .fadeIn('slow', function() {
                  $(this).delay(5000).fadeOut('slow');
              });
            </script>";
                echo "<script>console.log('Review added successfully'); window.location.href='all-reviews' ; </script>";
		
		} else {
		    echo "<script>console.log('Error adding Review');</script>";
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

        $conn->close();
      
    }
  ?>
    
	<!-- latest js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
  	  
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>

    <!-- Sidebar js -->
    <script src="assets/js/config.js"></script>

    <!-- bootstrap tag-input js -->
    <script src="assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="assets/js/sidebar-menu.js"></script>

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!--Dropzon js -->
    <script src="assets/js/dropzone/dropzone.js"></script>
    <script src="assets/js/dropzone/dropzone-script.js"></script>

    <!-- Plugins js -->
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

     <!-- ck js -->
    <script src="assets/js/ckeditor.js"></script>
    <script src="assets/js/ckeditor-custom.js"></script>

    <!-- select2 js -->
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/select2-custom.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>

</body>

</html>