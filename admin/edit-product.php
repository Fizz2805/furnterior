<?php
  session_start();
  if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
      header("location: login.php");
      exit;
  }
	$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$parts = explode("=", $url);
	$sku = $parts[1];

	include "config.php";
	$sql = "SELECT * FROM Product WHERE SKU='$sku'";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$product_id= $row['Product_ID'];
	$product_name= $row['Name'];
	$product_desc= $row['Description'];
	$product_cat= $row['Category'];
	$product_cost= $row['Cost'];
	$product_weight= $row['Weight'];
	$product_dim= $row['Dimensions'];
	$product_featured= $row['Is_Featured'];
	$product_stock= $row['Stock_Status'];
	$product_qty= $row['Stock_Qty'];
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
    <title>Edit Product- Furnterior</title>

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
 .gallery {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-gap: 10px;
}

.gallery .image-container {
  display: inline-flex;
  flex-direction: column;
}

.gallery img {
  max-width: 100%;
  height: auto;
}

.gallery .delete-checkbox {
  margin-top: 10px;
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
                    <h5>Edit Product</h5>
                </div>

                <!-- New Product Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12">
                                <form action="edit-product-script.php?id=<?php echo $product_id ?>" method="post" enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">                
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Information</h5>
                                            </div>
                                            
                                                <div class="row">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Product Name *</label>
                                                        <div class="col-sm-10">
                                                            <input name="p_name" id="p_name" class="form-control" type="text"
                                                                placeholder="Product Name" value="<?php echo $product_name ?>" required>
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
                                                                	if($row['Cat_ID']== $product_cat){
                                                                    	 echo '<option value="' . $row['Cat_ID'] . '" selected>' . $row['Name'] . '</option>';
                                                                    } else
                                                                  echo '<option value="' . $row['Cat_ID'] . '">' . $row['Name'] . '</option>';
                                                              }
                                                              echo '</select>';

                                                              ?>
                                                                
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Product Price (Rs.) *</label>
                                                        <div class="col-sm-10">
                                                            <input name="price" id="price" class="form-control" type="number"
                                                                placeholder="Product Price" min="0" value="<?php echo $product_cost ?>" required>
                                                        </div>
                                                    
                                                    </div>
                                                  <div class="row align-items-center">
                                                        <label class="form-label-title col-sm-2 mb-0">Is Featured? *</label>
                                                        <div class="col-sm-10">
                                                          <?php
                                                          if($product_featured=="Y"){
                                                            echo '<input class="checkbox_animated" type="radio" value="Y" name="featured" checked required> Yes';
                                                          	echo '<input class="checkbox_animated" type="radio" value="N" name="featured" required> No';
                                                            } else{
                                                            echo '<input class="checkbox_animated" type="radio" value="Y" name="featured" required> Yes';
                                                          	echo '<input class="checkbox_animated" type="radio" value="N" name="featured" required> No';
                                                          }
                                                          ?>
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
                                                                <textarea name="description" rows="4" style="width:100%"><?php echo $product_desc ?></textarea>
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
                                                                placeholder="Weight" min="1" value="<?php echo $product_weight ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Dimensions
                                                            (ft)</label>
                                                        <div class="col-sm-10">                                                            
                                                              <input name="dimension" id="dimension" class="form-control" type="text"
                                                                  placeholder="Length x Width x Height" value="<?php echo $product_dim ?>">                                                        
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
                                                        <label class="form-label-title col-sm-2 mb-0">SKU</label>
                                                        <div class="col-sm-10">
                                                            <input name="sku" id="sku" class="form-control" type="text" value="<?php echo $sku ?>">
                                                        </div>
                                                    </div>
													                                                  	                                                 
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-2 col-form-label form-label-title">Stock
                                                            Status</label>
                                                        <div class="col-sm-10">
                                                            <select class="js-example-basic-single w-100" name="stock-status" id="stock-status">
                                                              	<?php  
                                                              		if($product_stock== "In Stock"){
                                                                     	echo '<option value="In Stock" selected>In Stock</option>';
                                                                		echo '<option value="Out of Stock">Out Of Stock</option>';
                                                                    } else {
                                                                     	echo '<option value="In Stock">In Stock</option>';
                                                                		echo '<option value="Out of Stock" selected>Out Of Stock</option>';
                                                                    }
                                                              	?>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                  
                                                  <div class="row align-items-center" id="stock-quantity-field">
                                                        <label class="col-sm-2 col-form-label form-label-title">Stock Quantity</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" min="0" name="qty" id="qty" class="form-control" value="<?php echo $product_qty ?>">
                                                        </div>
                                                    </div>
                                                  	<script>
                                                    // add event listener to stock status select field
                                                    var stockStatusSelect = document.getElementById("stock-status");
                                                    stockStatusSelect.addEventListener("change", function() {
                                                      // get selected value
                                                      var selectedValue = stockStatusSelect.value;
                                                      // show/hide stock quantity field based on selected value
                                                      if (selectedValue == "Out of Stock") {
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
                                                <h5 style="width: 70%">Product Images</h5>                                              	
                                            </div>

                                            <div class="theme-form theme-form-2 mega-form">                                              
                                                <div class="row">
                                                  <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Upload More Images</label>
                                                        <div class="col-sm-10">
                                                            <input name="fileToUpload[]"  class="form-control form-choose" type="file"
                                                                id="formFileMultiple" multiple>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <div class="col-sm-10">
                                                          <?php
  															$sql_images= "SELECT * FROM Images WHERE Product_ID= $product_id";
                                                            $result_img= $conn->query($sql_images);
                                                            echo '<div class="gallery">';
                                                                while($row_images= $result_img->fetch_assoc()) {
                                                                  echo '<div class="image-container">';
                                                                  echo '<img src="assets/images/products/' . $row_images['Img_Url'] . '" alt="Product Image">';
                                                                  echo '<label><input type="checkbox" name="delete[]" value="' . $row_images['image_id'] . '" class="delete-checkbox checkbox_animated "> Delete</label>';
                                                                  echo '</div>';
                                                                }
                                                            echo '</div>';
                                                          ?>
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
                                                <span>Edit Product</span>
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