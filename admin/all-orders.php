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
    <title>All Orders- Furnterior</title>

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
    .dropdown-toggle{
     	color: #fff!important;
    }
    .btn, .change-status-btn{
     white-space: nowrap;
    font-weight: 400;
    font-size: 14px;
    text-transform: capitalize;
      margin: 0 !important;
    padding: 4px 10px;
    border-radius: 5px;
    font-size: 12px !important;
    color: #fff !important;
    } .dropdown-menu{
         padding: 12px !important;
    	font-size: 14px; 
      	line-height: 30px;
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
        <!-- Page Header starts-->
        <?php  include('header.php'); ?>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include('sidebar.html'); ?>
            <!-- Page Sidebar Ends-->

            <!-- Order section Start -->
            <div class="page-body">
                <div class="title-header">
                    <h5>All Orders</h5>
                </div>

                <!-- Table Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-desi table-product">
                                               
                                            <table class="table table-1d all-package">
                                                <thead> <tr>
                                                        <th>Order ID</th>
                                                        <th>Order Date</th>
                                                        <th>Paid Amount</th>
                                                        <th>Payment Method</th>
                                                        <th>Tracking ID</th>
                                                        <th>Status</th>
                                                        <th>Options</th>        
                                                </tr>
                                                </thead>
                                              
                                                <tbody>
                                                <?php
                                $sql1 = "SELECT * FROM Orders";
                               
                                $result = $conn->query($sql1);
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) { 
                                      echo "<tr data-id='" . $row['Order_ID'] . "'>";
                                      echo "<td>" . $row['Order_ID'] . "</td>";
                                      echo "<td>" . $row['Order_Date'] . "</td>";
                                      echo "<td> Rs. " . $row['Price_With_Shipping'] . "</td>";
                                      echo "<td>" . $row['Payment_Method'] . "</td>";
                                      echo "<td>" . $row['Tracking_ID'] . "</td>";
                                      
                                      $orderstatus=$row['Status'];
if ($orderstatus == "Delivered") {
    echo "<td>
                <button class='success-button btn btn-sm dropdown-toggle' type='button' style='background-color: green !important'>" . $orderstatus . "</button>
        </td>";
} else if ($orderstatus == "In Process") {
    echo "<td>
            <div>
                <button class='success-button btn btn-sm dropdown-toggle change-status-btn' data-order-id='" . $row['Order_ID'] . "' type='button' data-bs-toggle='dropdown' aria-expanded='false' style='background-color: #919690 !important'>" . $orderstatus . "</button>
                <ul class='dropdown-menu'>
                    <li><a href='#' data-status='Shipped'>Shipped</a></li>
                    <li><a href='#' data-status='Delivered'>Delivered</a></li>
                </ul>
            </div>
        </td>";
} else if ($orderstatus == "Paid") {
    echo "<td>
            <div>
                <button class='success-button btn btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false' style='background-color: #4291e5 !important'>" . $orderstatus . "</button>
                <ul class='dropdown-menu'>
                    <li><a href='#' data-status='Shipped'>Shipped</a></li>
                    <li><a href='#' data-status='Delivered'>Delivered</a></li>
                </ul>
            </div>
        </td>";
} else if ($orderstatus == "Shipped") {
    echo "<td>
            <div>
                <button class='success-button btn btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false' style='color: #000!important; background-color: #fce42a !important'>" . $orderstatus . "</button>
                <ul class='dropdown-menu'>
                    <li><a href='#' data-status='Delivered'>Delivered</a></li>
                </ul>
            </div>
        </td>";
} else {
    echo "<td>
                <button class='danger-button btn btn-sm' type='button'>" . $orderstatus . "</button>
        </td>";
}// for order cancellation
                                     echo "<td> <ul>
                                     <li>
                                        <a href='order-detail?id=$row[Order_ID]' title='View order details'>
                                            <span class='lnr lnr-eye'></span>
                                        </a>
                                   	 </li>
                                     <li>
                                        <a href='download-invoice?id=$row[Order_ID]' title='Download Invoice'>
                                            <span class='lnr lnr-download'></span>
                                        </a>
                                   	 </li>
                                   </ul> </td>";

                                     
                                      echo "</tr>";
                                      
                     }} else {echo "No results found.";}
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
                <!-- Table End -->

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
            </div>
            <!-- Order section End -->
        </div>
        <!-- Page Body End-->
    </div>
    <!-- page-wrapper End -->

    <!-- Modal start -->
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
    <!-- Modal end -->

    <!-- latest js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>

    <!-- Sidebar js -->
    <script src="assets/js/config.js"></script>

    <!-- Plugins js -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- all checkbox select js -->
    <script src="assets/js/checkbox-all-check.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
  
<script>
$(document).ready(function() {
  $('ul.dropdown-menu li a').click(function(e) {
    e.preventDefault();
    var status = $(this).data('status');
    var orderId = $(this).closest('tr').data('id');
    $.ajax({
      url: 'update-order-status.php',
      type: 'POST',
      data: {
        status: status,
        orderId: orderId
      },
      success: function(response) {
        // update the order status on the frontend
        $(this).closest('td').html(response);
        // refresh the page after successful response
        location.reload();
      }
    });
  });
});

  </script> 
</body>
</html>