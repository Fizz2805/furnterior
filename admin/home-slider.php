<?php
  session_start();
  if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
      header("location: login");
      exit;
  }
	require_once "config.php";
	$productData = array();
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
    <title>Edit Home Slider- Furnterior</title>

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
	<link rel="stylesheet" type="text/css" href="/assets/css/demo4.css">
    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

  	<style>
      @media (max-width: 1660px){
      .poster-section {
          height: 400px !important;
      	}
      }
     .select2-container--default .select2-results>.select2-results__options {
      display: flex;
      flex-direction: column;
	}
  </style>
</head>

<body>
    <!-- tap on top start-->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">
        <!-- Page Header Start-->
        <?php  include('header.php'); ?>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include('sidebar.html'); ?>
            <!-- Page Sidebar Ends-->

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="title-header">
                    <h5>Edit Home Slider</h5>                  	
                </div>
				<div>
                  <?php
  		$slider_sql= "SELECT * FROM Slider_Products";
  		$result= $conn->query($slider_sql);
  		$row = mysqli_fetch_assoc($result);
  		$product1_id = $row['Product1_ID'];
      	$product2_id = $row['Product2_ID'];
      	$product3_id = $row['Product3_ID'];   
  		
  		// getting Product 1 data
  		$sql = "SELECT * FROM Product WHERE Product_ID= $product1_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                	$row = mysqli_fetch_assoc($result);
                    $name1= $row['Name'];
                    $cost1= $row['Cost'];
                    $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $product1_id LIMIT 1";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $image_data = $row2['Img_Url'];
                    $img_dir= "assets/images/products/";
                    $img_url1= $img_dir.$image_data;
            }
  		// getting Product 2 data
  		$sql = "SELECT * FROM Product WHERE Product_ID= $product2_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                	$row = mysqli_fetch_assoc($result);
                    $name2= $row['Name'];
                    $cost2= $row['Cost'];
                    $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $product2_id LIMIT 1";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $image_data = $row2['Img_Url'];
                    $img_dir= "assets/images/products/";
                    $img_url2= $img_dir.$image_data;
            }
  		// getting Product 3 data
  		$sql = "SELECT * FROM Product WHERE Product_ID= $product3_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                	$row = mysqli_fetch_assoc($result);
                    $name3= $row['Name'];
                    $cost3= $row['Cost'];
                    $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $product3_id LIMIT 1";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $image_data = $row2['Img_Url'];
                    $img_dir= "assets/images/products/";
                    $img_url3= $img_dir.$image_data;
            }
                   
  	?>
    <!-- home slider start -->
    <section class="pt-0 poster-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <img src="<?php echo $img_url1; ?>" class="img-fluid lazyload" alt="">
          </div>
          <div class="col-sm-4">
            <img src="<?php echo $img_url2; ?>" class="img-fluid lazyload" alt="">
          </div>
          <div class="col-sm-4">
            <img src="<?php echo $img_url3; ?>" class="img-fluid lazyload" alt="">
          </div>
        </div>
      </div>

    </section>
    <!-- home slider end -->
                <div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">         
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-desi table-product">
                                            <table class="table table-1d all-package">
                                                <thead>
                                                    <tr>
                                                        <th>Slide #</th>
                                                        <th>Product</th>                                                      	
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                  <?php
                                                    // create an empty array to hold the product data
													
                                                    $sql = "SELECT * FROM Product";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {         
                                                              while ($row = mysqli_fetch_assoc($result)) {
                                                              	$id= $row['Product_ID'];
                                                                $name= $row['Name'];
                                                              	$img = "SELECT Img_Url FROM Images WHERE Product_ID= $id LIMIT 1";
                                                                $img_result = $conn->query($img);
                                                                $img_row = $img_result->fetch_assoc();
                                                                $imageURL = 'assets/images/products/'.$img_row["Img_Url"]; 
                                                                
                                                               // add the product data to the array
                                                              $productData[] = array(
                                                                  'id' => $id,
                                                                  'image' => $imageURL,
                                                                  'name' => $name
                                                              );
                                                     }
                                                    }
                                                  
                                                  	$sql = "SELECT * FROM Slider_Products";
                                                    $result = $conn->query($sql);
                                                  	$row = mysqli_fetch_assoc($result);
                                                      $product1_id = $row['Product1_ID'];
                                                      $product2_id = $row['Product2_ID'];
                                                      $product3_id = $row['Product3_ID'];   
                                                    
                                                    ?>
                                                         
                                   
                                                  <tr>
                                                  <td> Slide# 1</td>
                                                  <td>
                                                 
                                                    <select class="js-example-basic-single w-100" name="slider_1" required>
                                                    <?php foreach ($productData as $product){ 
                                                      if($product['id'] == $product1_id) {   
                                                        $default = 'selected';
                                                        echo '<option value="'.$product['id'].'"'.$default.'>'.$product['name'].'</option>'; }
  													  else
                                                        echo '<option value='.$product['id'].'>'.$product['name'].'</option>';
														}
                                                      ?>
                                                       
                                                     </select>
                                                  </td>
                                                  </tr>
                                                  
                                                  <tr>
                                                  <td> Slide# 2</td>
                                                  <td>
                                                 
                                                    <select class="js-example-basic-single w-100" name="slider_2" required>
                                                    <?php foreach ($productData as $product){ 
                                                       if($product['id'] == $product2_id) {   
                                                        $default = 'selected';
                                                        echo '<option value="'.$product['id'].'"'.$default.'>'.$product['name'].'</option>'; }
  													  else
                                                        echo '<option value='.$product['id'].'>'.$product['name'].'</option>';
														}
                                                      ?>
                                                     </select>
                                                  </td>
                                                  </tr>
                                                  
                                                  <tr>
                                                  <td> Slide# 3</td>
                                                  <td>
                                                 
                                                    <select class="js-example-basic-single w-100" name="slider_3" required>
                                                    <?php foreach ($productData as $product){ 
                                                      if($product['id'] == $product3_id) {   
                                                        $default = 'selected';
                                                        echo '<option value="'.$product['id'].'"'.$default.'>'.$product['name'].'</option>'; }
  													  else
                                                        echo '<option value='.$product['id'].'>'.$product['name'].'</option>';
														}
                                                      ?>
                                                       
                                                     </select>
                                                  </td>
                                                  </tr>
                                                  
                                                </tbody>
                                            </table>
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
                                                <span>Publish Slider</span>
                                            </button>
                                        </div>
                                    </div>
                                  </div>
                                
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <div class="container-fluid">
                    <!-- footer start-->
                    <footer class="footer">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2023 © Furnterior by Codemply</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <!-- page-wrapper End-->

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

		// Retrieve data from the form
		$slider1 = $_POST['slider_1'];
      	$slider2 = $_POST['slider_2'];
      	$slider3 = $_POST['slider_3'];       
      
      
		// Insert product data into the database
		$sql = "UPDATE Slider_Products SET Product1_ID= $slider1,Product2_ID= $slider2,Product3_ID= $slider3 WHERE ID=3";
		if ($conn->query($sql) === TRUE) {
		    echo "<script>
              // After successful product insertion, show notification
              $('#notification').html('New product added successfully!')
                .fadeIn('slow', function() {
                  $(this).delay(5000).fadeOut('slow');
              });
            </script>";
                echo "<script>console.log('Slider updated successfully'); window.location.href='home-slider'</script>";
		
		} else {
		    echo "<script>console.log('Error updating Slider');</script>";
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

    <!-- Slick js-->
    <script src="/assets/js/slick/slick.js"></script>
    <script src="/assets/js/slick/slick-animation.min.js"></script>
    <script src="/assets/js/slick/custom_slick.js"></script>
      
    <!-- bootstrap tag-input js -->
    <script src="assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="assets/js/sidebar-menu.js"></script>

    <!--Dropzon js -->
    <script src="assets/js/dropzone/dropzone.js"></script>
    <script src="assets/js/dropzone/dropzone-script.js"></script>

    <!-- Plugins js -->
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- select2 js -->
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/select2-custom.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
    <script src="/assets/js/script.js"></script>

</body>


</html>