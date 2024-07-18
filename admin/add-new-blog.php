<?php
  session_start();
  if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
      header("location: login.php");
      exit;
  }
	include "config.php";
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
    <title>Add New Blog- Furnterior</title>

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
  .ck-file-dialog-button, .ck-dropdown{
    display: none !important;
  }
  #loader {
  border: 16px solid #f3f3f3; 
  border-top: 16px solid #e87316; 
  border-radius: 50%;
  width: 50px;
  height: 50px;
  animation: spin 2s linear infinite;
  display: none;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
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
                    <h5>Add New Blog</h5>
                </div>

                <!-- New Product Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">                
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
                                                                placeholder="Blog Name" onblur="generateBlogPost()" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Featured Image *</label>
                                                        <div class="col-sm-10">
                                                        <input name="image"  class="form-control form-choose" type="file"
                                                                id="image" required>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            
                                        </div>
                                    </div>
									<!-- loader  -->
                                  <div id="loader-div" style="display:none;"><h6>Generating Blog Content... </h6></div> <div id="loader"> </div>
                                          	
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Blog Data *</h5>
                                            </div>
                                          	<script>
                                              // Define a function to generate the blog post
                                              function generateBlogPost() {
                                                // Get the value of the input field
                                                var prompt = document.getElementById("b_name").value;

                                                // Your API key
                                                var apiKey = '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';

                                                // The URL for the API endpoint
                                                var url = 'https://api.openai.com/v1/engines/davinci/completions';

                                                // The data to be sent with the API request
                                                var data = {
                                                  'prompt': prompt,
                                                  'max_tokens': 1024,
                                                  'n': 1,
                                                  'stop': '',
                                                };

                                                // Set the HTTP headers for the API request
                                                var headers = {
                                                  'Content-Type': 'application/json',
                                                  'Authorization': 'Bearer ' + apiKey,
                                                };

                                                // Create a new cURL resource
                                                var curl = new XMLHttpRequest();
												
                                                // Show the loader
                                                var loader_text = document.getElementById("loader-div");
                                                var loader = document.getElementById("loader");
                                                loader_text.style.display = "block";
                                                loader.style.display = "block";
                                                
                                                // Set the cURL options
                                                curl.open('POST', url, true);
                                                curl.setRequestHeader('Content-Type', 'application/json');
                                                curl.setRequestHeader('Authorization', 'Bearer ' + apiKey);

                                                // Send the API request and get the response
                                                curl.onload = function() {
                                                  // Hide the loader
                                                  loader_text.style.display = "none";
                    							  loader.style.display = "none";
                                                  // Check for API errors
                                                  if (curl.status !== 200) {
                                                    console.log('API error: ' + curl.responseText);
                                                  } else {
                                                    // Decode the JSON response
                                                    var result = JSON.parse(curl.responseText);

                                                    // Get the generated blog post
                                                    var blogPost = result.choices[0].text;

                                                    // Output the generated blog post
                                                    document.getElementById("blog_content").value= blogPost;
                                                  }
                                                };

                                                curl.onerror = function() {
                                                  console.log('Error connecting to API');
                                                }

                                                curl.send(JSON.stringify(data));
                                              }

                                              
                                            </script>
											
                                            <div class="theme-form theme-form-2 mega-form">
                                                <div class="row">
                                                    <div class="col-12">
                                                       <div class="row">
                                                            <div class="col">
                                                                <textarea name="data" rows="15" id="blog_content" style="width:100%" required></textarea>
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
			$image_name = $_FILES['image']['name'];
			$image_type = $_FILES['image']['type'];
			$image_size = $_FILES['image']['size'];
			$image_temp = $_FILES['image']['tmp_name'];
			
      		// Remove special characters
            $image_name = preg_replace("/[^a-zA-Z0-9.\s]/", "", $image_name);

            // Replace spaces with hyphens
            $image_name = str_replace(" ", "-", $image_name);

            // Convert to lowercase
            $image_name = strtolower($image_name);

			// Check if the file is an image
			if(!preg_match("/\.(jpeg|gif|jpg|png|webp)$/i", $image_name)) {
              echo "alert('Error: The file you uploaded is not an image.');</script>";
              return;
			} else {
				// Check the database connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Upload the image to the server
              	$target_dir= 'assets/images/blog-featured/';
				$target_path =  $target_dir. basename($image_name);
				move_uploaded_file($image_temp, $target_path);
			
			}
		// Get current date in D M Y format
        $currentDate = date('F d Y');
        // Convert date to string
        $dateString = strtotime($currentDate);
        $varcharDate = date('F d Y', $dateString);
      
		// Insert blog data into the database
		$sql = "INSERT INTO Blog (`Title`,`Date`,`Featured_Img`,`Blog_Data`) VALUES ('$name', '$varcharDate', '$image_name', '$data')";
		if ($conn->query($sql) === TRUE) {
		    echo "<script>
              // After successful product insertion, show notification
              $('#notification').html('New blog added successfully!')
                .fadeIn('slow', function() {
                  $(this).delay(5000).fadeOut('slow');
              });
            </script>";
                echo "<script>console.log('Blog added successfully'); window.location.href='all-blogs.php'</script>";
		
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