<?php
  session_start();
  if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
      header("location: login.php");
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
    <title>All Reviews- Furnterior</title>

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
                    <h5>Reviews List</h5>
                  <a href="add-new-review" class="align-items-center btn btn-theme">
                            <i data-feather="plus-square"></i>Add New Review
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
                                                      	<th>Name</th>
                                                        <th>Feedback</th>
                                                        <th>Rating</th>
                                                      	<th>Options</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                  <?php
                                                    $sql = "SELECT * FROM Reviews";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                          	$id= $row['Review_ID'];
                                                                // Getting Name
                                                                $name = $row["Name"];  
                                                                echo "<td class='font-primary'>$name</td>";
																
                                                          		// Getting Name
                                                                $mssg = $row["Message"];  
                                                                echo "<td>$mssg</td>";
                                                          	
                                                                // Getting Category
                                                                $star = $row["Rating"];
                                                          		switch($star){ 
                                                                  case 1:
                                                                	echo "<td><i class='fas fa-star theme-color'></i></td>";  
                                                                  case 2:
                                                                	echo "<td><i class='fas fa-star theme-color'></i>";  
                                                                    echo "<i class='fas fa-star theme-color'></i></td>"; 
                                                                    break;
                                                                  case 3:
                                                                	echo "<td><i class='fas fa-star theme-color'></i>";  
                                                                    echo "<i class='fas fa-star theme-color'></i>";
                                                                    echo "<i class='fas fa-star theme-color'></i></td>";
                                                                    break;
                                                                  case 4:
                                                                	echo "<td><i class='fas fa-star theme-color'></i>";  
                                                                    echo "<i class='fas fa-star theme-color'></i>";  
                                                                    echo "<i class='fas fa-star theme-color'></i>"; 
                                                                    echo "<i class='fas fa-star theme-color'></i></td>";
                                                                    break;
                                                                  case 5:
                                                                	echo "<td><i class='fas fa-star theme-color'></i>";  
                                                                    echo "<i class='fas fa-star theme-color'></i>";  
                                                                    echo "<i class='fas fa-star theme-color'></i>"; 
                                                                    echo "<i class='fas fa-star theme-color'></i>";
                                                                    echo "<i class='fas fa-star theme-color'></i></td>";
                                                                    break;
                                                                }
                                                                                                                         
                                                                echo "<td>
                                                                    <ul>
                                                                <li>
                                                                    <a href='edit-review?id=$id'>
                                                                        <span class='lnr lnr-pencil'></span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href='delete-review.php?id=$id'>
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