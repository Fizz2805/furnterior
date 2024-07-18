<?php
  session_start();
  if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
      header("location: login");
      exit;
  }
	require_once "config.php";
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
    <title>All Products- Furnterior</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&amp;family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- Themify icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  <style>
    .form-inline{visibility: visible !important;} 
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
                <div class="title-header title-header-1">
                    <h5>Products List</h5>
                  	<a href="add-new-product" class="align-items-center btn btn-theme">
                            <i data-feather="plus-square"></i>Add New Product
                    </a>
                </div>
            	
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-desi table-product">
                                            <table class="table table-1d all-package">
                                                <thead>
                                                    <tr>
                                                        <th>Product Image</th>
                                                        <th>Product SKU</th>
                                                      	<th>Product Name</th>
                                                        <th>Category</th>
                                                      	<th>Is Featured</th>
                                                        <th>In Stock</th>
                                                        <th>Current Qty</th>
                                                        <th>Price</th>                                                        
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                  
                                                  <?php
                                                    
                                                    if(isset($_GET['search'])) {
                                                      $search =  htmlspecialchars($_GET['search']);                                                      
													  $sql = "SELECT * FROM Product WHERE Name LIKE '%$search%' OR SKU LIKE '%$search%'";
                                                    } else{
                                                      $sql = "SELECT * FROM Product";
                                                    }
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                          	$id= $row['Product_ID'];
                                                            // Getting Image  
                                                          	$img = "SELECT Img_Url FROM Images WHERE Product_ID= $id LIMIT 1";
                                                    		$img_result = $conn->query($img);
                                                          	//if ($img_result->num_rows > 0) {
                                                          	$img_row = $img_result->fetch_assoc();
                                                          	$imageURL = 'assets/images/products/'.$img_row["Img_Url"];
                                                            echo "<td>
                                                            <img src='$imageURL' class='img-fluid' alt='Product Image'>
                                                        	</td>";
                                                            //}
                                                                // Getting SKU
                                                                $sku = $row["SKU"];  
                                                                echo "<td>$sku</td>";

                                                                // Getting Name
                                                                $name = $row["Name"];  
                                                                echo "<td>$name</td>";

                                                                // Getting Category
                                                                $cat = $row["Category"];
                                                          		switch($cat){ 
                                                                  case 1:
                                                                	echo "<td> Sofa </td>";
                                                                    break;
                                                                  case 2:
                                                                	echo "<td> Chair </td>";
                                                                    break;
                                                                  case 3:
                                                                	echo "<td> Bed </td>";
                                                                    break;
                                                                  case 4:
                                                                	echo "<td> Table </td>";
                                                                    break;
                                                                  case 5:
                                                                	echo "<td> Augmented Reality </td>";
                                                                    break;
                                                                }
																
                                                          		// Getting Featured Product Status
                                                                $stock= $row["Is_Featured"];
                                                          		if($stock=== "Y"){
                                                                    echo '<td class="td-check">
                                                                  		<span class="lnr lnr-checkmark-circle"></span> 
                                                              		</td> ';
                                                                  
                                                                } else{
                                                                  echo '<td class="td-cross">
                                                                  		<span class="lnr lnr-cross-circle"></span> 
                                                              		</td> ';
                                                                }
                                                                              
                                                          
                                                                // Getting Stock Status
                                                                $stock= $row["Stock_Status"];
                                                          		if($stock=== "In Stock"){
                                                                    echo '<td class="td-check">
                                                                  		<span class="lnr lnr-checkmark-circle"></span> 
                                                              		</td> ';
                                                                  
                                                                } else{
                                                                  echo '<td class="td-cross">
                                                                  		<span class="lnr lnr-cross-circle"></span> 
                                                              		</td> ';
                                                                }
                                                                                                              	
                                                                // Getting Quantity
                                                                $qty = $row["Stock_Qty"];   
                                                                echo "<td>$qty</td>";
                                                          
                                                          		// Getting Price
                                                                $cost = $row["Cost"];   
                                                                echo "<td> Rs. ".$cost. "</td>";
                                                          
                                                                echo "<td>
                                                                    <ul>
                                                                        <li>
                                                                    <a href='/product?id=$id' target='blank'>
                                                                        <span class='lnr lnr-eye'></span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href='edit-product?id=$sku'>
                                                                        <span class='lnr lnr-pencil'></span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href='delete-product?id=$sku'>
                                                                        <i class='far fa-trash-alt theme-color'></i>
                                                                    </a>
                                                                </li>                                                 
                                                                        
                                                                    </ul>
                                                                </td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "No results found.";
                                                    }
                                                    
                                                    
                                                 $conn->close();
                                             ?>
                                                                                                          
                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                
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

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- Plugins js -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
</body>


</html>