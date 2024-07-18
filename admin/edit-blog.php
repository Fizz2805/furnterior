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
	$sql = "SELECT * FROM Blog WHERE Blog_ID='$id'";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$title= $row['Title'];
	$img= $row['Featured_Img'];
	$data= $row['Blog_Data'];
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
    <title>Edit Blog- Furnterior</title>

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
                    <h5>Edit Blog</h5>
                </div>

                <!-- New Product Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">                
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Blog Information</h5>
                                            </div>
                                            
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Blog Title *</label>
                                                        <div class="col-sm-10">
                                                            <input name="b_name" id="b_name" class="form-control" type="text"
                                                                placeholder="Blog Name" value="<?php echo $title ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Featured Image *</label>
                                                        <div class="col-sm-10">
                                                        <img src="<?php echo "assets/images/blog-featured/".$img ?>" style="width: -webkit-fill-available;"> 
                                                        <input name="image"  class="form-control form-choose" type="file"
                                                                id="image" required>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            
                                        </div>
                                    </div>
									
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Blog Data *</h5>
                                            </div>                                         	
											
                                            <div class="theme-form theme-form-2 mega-form">
                                                <div class="row">
                                                    <div class="col-12">
                                                       <div class="row">
                                                            <div class="col">
                                                                <textarea name="data" rows="15" id="blog_content" style="width:100%" required><?php echo $data ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                  <div class="card">
                                        <div class="card-body">
                                          <div class="button login">
                                            <button type="submit" style="width: 100%;left: 0%;background-color: var(--theme-color);border: 1px solid var(--theme-color);font-weight: 900;font-size: 18px;color: #fff;padding: calc(13px + (18 - 13) * ((100vw - 320px) / (1920 - 320)));border-radius: 4px;">
                                                <span>Save Blog</span>
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
      // Database credentials
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $dbname = 'furnterior';

      $conn = mysqli_connect($host, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        echo '<script> console.log("Connection to database failed") </script>';
        die("Connection failed: " . $conn->connect_error);
      }
      	$name= $_POST['b_name'];
      	$data= $_POST['data'];
		// Retrieve user data from the form
      	  $name = mysqli_real_escape_string($conn, $name);
      	  $data = mysqli_real_escape_string($conn, $data);
          // Get the uploaded file information
			$img = $_FILES['image']['name'];
			$image_type = $_FILES['image']['type'];
			$image_size = $_FILES['image']['size'];
			$image_temp = $_FILES['image']['tmp_name'];
			
      		// Check if a file was uploaded successfully
		if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
      		// Remove special characters
            $img = preg_replace("/[^a-zA-Z0-9.\s]/", "", $img);

            // Replace spaces with hyphens
            $img = str_replace(" ", "-", $img);

            // Convert to lowercase
            $img = strtolower($img);

			// Check if the file is an image
			if(!preg_match("/\.(jpeg|gif|jpg|png|webp)$/i", $img)) {
              echo "alert('Error: The file you uploaded is not an image.');</script>";
              return;
			} else {
				// Check the database connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Upload the image to the server
              	$target_dir= 'assets/images/blog-featured/';
				$target_path =  $target_dir. basename($img);
				move_uploaded_file($image_temp, $target_path);
			
			}
        }
		// Get current date in D M Y format
        $currentDate = date('F d Y');
        // Convert date to string
        $dateString = strtotime($currentDate);
        $varcharDate = date('F d Y', $dateString);
      
		// Update blog data into the database
		$sql = "UPDATE Blog SET `Title`= '$name',`Date`='$varcharDate',`Featured_Img`='$img',`Blog_Data`='$data' WHERE Blog_ID=$id";
		if ($conn->query($sql) === TRUE) {
		    echo "<script>
              // After successful product insertion, show notification
              $('#notification').html('New blog added successfully!')
                .fadeIn('slow', function() {
                  $(this).delay(5000).fadeOut('slow');
              });
            </script>";
                echo "<script>console.log('Blog added successfully'); window.location.href='all-blogs'</script>";
		
		} else {
		    echo "<script>console.log('Error adding Blog');</script>";
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