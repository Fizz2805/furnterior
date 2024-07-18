<?php
  session_start();
  if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
      header("location: login");
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
    <title>Add New Product- Furnterior</title>

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
                    <h5>Add New Product</h5>
                  	<p> Fields marked with * are required</p>
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
                                                <h5>Product Information</h5>
                                            </div>
                                            
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Product
                                                            Name *</label>
                                                        <div class="col-sm-10">
                                                            <input name="p_name" id="p_name" class="form-control" type="text"
                                                                placeholder="Product Name" required>
                                                        </div>
                                                    </div>
                                                  

                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Category *</label>
                                                        <div class="col-sm-10">
                                                              <?php
                                                              // select query
                                                              $query = "SELECT Cat_ID, Name FROM Product_Category";

                                                              // execute query and get the result
                                                              $result = mysqli_query($conn, $query);

                                                              // display the select element with option elements for each category
                                                              echo '<select name="category" id="category" class="js-example-basic-single w-100" required>';
                                                              while ($row = mysqli_fetch_assoc($result)) {
                                                                  echo '<option value="' . $row['Cat_ID'] . '">' . $row['Name'] . '</option>';
                                                              }
                                                              echo '</select>';

                                                              // close database connection
                                                              mysqli_close($conn);
                                                              ?>
                                                                
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Product
                                                            Price (Rs.) *</label>
                                                        <div class="col-sm-10">
                                                            <input name="price" id="price" class="form-control" type="number"
                                                                placeholder="Product Price" min="0" required>
                                                        </div>
                                                    
                                                    </div>
                                                  <div class="row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Is Featured? *</label>
                                                        <div class="col-sm-10">
                                                            <input class="checkbox_animated" type="radio" value="Y" name="featured" required> Yes
                                                          	<input class="checkbox_animated" type="radio" value="N" name="featured" required> No
                                                        </div>
                                                    
                                                    </div>
                                                    
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Description</h5>
                                            </div>

                                            <div class="theme-form theme-form-2 mega-form">
                                                <div class="row">
                                                    <div class="col-12">
                                                       <div class="row">
                                                            <label class="form-label-title col-sm-2 mb-0">Product
                                                                Description</label>
                                                            <div class="col-sm-10">
                                                                <textarea name="description" rows="4" style="width:100%"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                              
                                     <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Shipping</h5>
                                            </div>

                                            <div class="theme-form theme-form-2 mega-form">
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Weight
                                                            (kg)</label>
                                                        <div class="col-sm-10">
                                                            <input name="weight" id="weight" class="form-control" type="number"
                                                                placeholder="Weight" min="1">
                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Dimensions
                                                            (ft)</label>
                                                        <div class="col-sm-10">                                                            
                                                              <input name="dimension" id="dimension" class="form-control" type="text"
                                                                  placeholder="Length x Width x Height">                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Inventory</h5>
                                            </div>

                                            <div class="theme-form theme-form-2 mega-form">
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">SKU *</label>
                                                        <div class="col-sm-10">
                                                            <input name="sku" id="sku" class="form-control" type="text" required>
                                                        </div>
                                                    </div>
													                                                  	                                                 
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-2 col-form-label form-label-title">Stock
                                                            Status</label>
                                                        <div class="col-sm-10">
                                                            <select class="js-example-basic-single w-100" name="stock-status" id="stock-status">
                                                                <option value="In Stock">In Stock</option>
                                                                <option value="Out of Stock">Out Of Stock</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                  
                                                  <div class="row align-items-center" id="stock-quantity-field">
                                                        <label class="col-sm-2 col-form-label form-label-title">Stock
                                                            Quantity</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" min="0" name="qty" id="qty" class="form-control" >
                                                        </div>
                                                    </div>
                                                  	<script>
                                                    // add event listener to stock status select field
                                                    var stockStatusSelect = document.getElementById("stock-status");
                                                    stockStatusSelect.addEventListener("change", function() {
                                                      // get selected value
                                                      var selectedValue = stockStatusSelect.value;
                                                      // show/hide stock quantity field based on selected value
                                                      if (selectedValue === "Out of Stock") {
                                                        document.getElementById("stock-quantity-field").style.display = "none";
                                                      } else {
                                                        document.getElementById("stock-quantity-field").style.display = "block";
                                                      }
                                                    });
                                                  </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                  <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Images</h5>
                                            </div>

                                            <div class="theme-form theme-form-2 mega-form">
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Images *</label>
                                                        <div class="col-sm-10">
                                                            <input name="fileToUpload[]"  class="form-control form-choose" type="file"
                                                                id="formFileMultiple" multiple>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>3D Model</h5>
                                            </div>

                                            <div class="theme-form theme-form-2 mega-form">
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">glb/glt files supported</label>
                                                        <div class="col-sm-10">
                                                            <input name="3dmodel"  class="form-control form-choose" type="file" accept=".glb,.gltf">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
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
                                                <span>Save Product</span>
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
      // Database credentials
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'furnterior';
		$conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

		// Retrieve user data from the form
		$name = $_POST['p_name'];
        $category = $_POST['category'];
		$price = $_POST['price'];
		$desc = $_POST['description'];
      	$weight = $_POST['weight'];
      	$dim= $_POST['dimension'];
        $sku = $_POST['sku'];
      	$stock= $_POST['stock-status'];
      	$stock_qty= $_POST['qty'];
      	$is_featured= $_POST['featured'];
      	
          $target_dir = "assets/images/products/";
          $uploadOk = 1;
          $fileNames = array();
          foreach ($_FILES["fileToUpload"]["name"] as $key => $value) {
              $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$key]);
              $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              // Check if file already exists
              if (file_exists($target_file)) {
                  echo '<script>alert("Sorry, file already exists.");</script>';
                  $uploadOk = 0;
              }
              // Check file size
              if ($_FILES["fileToUpload"]["size"][$key] > 800000) {
                  echo '<script>alert("Sorry, your file is too large.");</script>';
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" && $imageFileType != "webp" ) {
                  echo '<script> alert("Sorry, only JPG, JPEG, PNG, GIF & WebP files are allowed.")<script>;';
                  $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
                      echo '<script> console.log("The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$key])). " has been uploaded ");</script>';                     
                      // Add filename to array
                      $fileNames[] = basename($_FILES["fileToUpload"]["name"][$key]);
                  } else {
                      echo '<script> alert("Sorry, there was an error uploading your file.") </script> ';
                  }
              }
          }
       
      // Get the uploaded 3d model file information
			$model_name = $_FILES['3dmodel']['name'];
			$model_type = $_FILES['3dmodel']['type'];
			$model_size = $_FILES['3dmodel']['size'];
			$model_temp = $_FILES['3dmodel']['tmp_name'];
			$target_path= "";
			// Check if the file is an image
			if(!preg_match("/\.(glb|gltf)$/i", $model_name)) {
              echo "<script>document.getElementById('message').innerHTML = 'Error: The file you uploaded is not a GLB/GLTF File.';</script>";
			} else {
				// Check the database connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Upload the image to the server
              	$target_dir= 'assets/3D-models/';
				$target_path =  $target_dir. basename($model_name);
				move_uploaded_file($model_temp, $target_path);
			
			}
	  
      
      
		// Insert product data into the database
		$sql = "INSERT INTO Product (SKU, Name, Description, Category, Cost, Weight, Dimensions, Is_Featured, Stock_Status, Stock_Qty, 3D_Model) VALUES ('$sku', '$name', '$desc', '$category', CAST('$price' AS FLOAT), '$weight', '$dim', '$is_featured', '$stock', '$stock_qty','$model_name')";
		if ($conn->query($sql) === TRUE) {
		    echo "<script>
              // After successful product insertion, show notification
              $('#notification').html('New product added successfully!')
                .fadeIn('slow', function() {
                  $(this).delay(5000).fadeOut('slow');
              });
            </script>";
                echo "<script>console.log('Product added successfully'); window.location.href='all-products'</script>";
		
		} else {
		    echo "<script>console.log('Error adding Product');</script>";
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

        // SQL query to select Product_ID of current product added
        $sql = "SELECT Product_ID FROM Product WHERE SKU= '$sku'";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Fetch the result and get the Product_ID value
        if ($row = mysqli_fetch_array($result)) {
            $product_id = $row['Product_ID'];
            // inserting images into Images table
            foreach ($fileNames as $filename) {
                $sql = "INSERT INTO Images (Img_Url,Product_ID) VALUES ('$filename','$product_id')";
                if(mysqli_query($conn, $sql)) {
                    echo '<script> console.log("The file " . $filename . " has been inserted into the database.")</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
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