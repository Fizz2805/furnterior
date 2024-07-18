
<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$parts = explode("=", $url);
$id = $parts[1];

include "config.php";
$sql = "SELECT * FROM Orders WHERE Order_ID='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$order_date=$row['Order_Date'];
$price=$row['Price'];
$discounted=$row['Discounted_Price'];
$totalprice=$row['Price_With_Shipping'];
$address=$row['Shipping_Address'];
$paymethod=$row['Payment_Method'];

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
<title>Order Details - Furnterior</title>

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
<!-- tap on top start -->
<div class="tap-top">
    <i data-feather="chevrons-up"></i>
</div>
<!-- tap on tap end -->

<!-- page-wrapper Start -->
<div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">
    <!-- Page Header Start-->
    <?php  include('header.php'); ?>
    <!-- Page Header Ends-->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <!-- Page Sidebar Ends-->
        <?php include('sidebar.html'); ?>
        <!-- tracking section start -->
        <div class="page-body">
                <div class="title-header title-header-block package-card">
                    <div>
                        <h5>Order #<?php  echo $id ?></h5>
                    </div>
                    <div class="card-order-section">
                        <ul>
                            <li><?php echo $order_date ?></li>
                            <li>Total Rs. <?php echo $totalprice ?></li>
                        </ul>
                    </div>
                </div>

            <!-- tracking table start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="bg-inner cart-section order-details-table">
                                    <div class="row g-4">
                                        <div class="col-xl-8">
                                            <div class="table-responsive table-details">
                                                <table class="table cart-table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2">Items</th>
                                                            <th class="text-end" colspan="2">
                                                                
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        
                                                        <?php 
                                                            $products_sql= "SELECT *
                                                                FROM Order_Items
                                                                INNER JOIN Product
                                                                ON Order_Items.Product_ID = Product.Product_ID
                                                                WHERE Order_Items.Order_ID = $id;
                                                                ";
                                                            $result_p = mysqli_query($conn, $products_sql);
                    
                                                          if (mysqli_num_rows($result_p) > 0) {
                                                              while($row_p = mysqli_fetch_assoc($result_p)) {
                                                        ?>
                                                        <tr class="table-order">
                                                            <td>
                                                              <p>Product ID</p>
                                                              <h5><?php echo $row_p['Product_ID'] ?></h5>
                                                          </td>
                                                          <td>
                                                              <p>Product Name</p>
                                                              <h5><?php echo $row_p['Name'] ?></h5>
                                                          </td>
                                                          <td>
                                                              <p>Quantity</p>
                                                               <h5><?php echo $row_p['Quantity'] ?></h5> 
                                                          </td>
                                                          <td>
                                                              <p>Price</p>
                                                              <h5><?php echo "Rs.".$row_p['Price'] ?></h5> 
                                                          </td>
                                                      </tr>
                                                      <?php  }} ?>
                                                  </tbody>
                                                
                                                    <tfoot>
                                                        <tr class="table-order">
                                                            <td colspan="3">
                                                                <h5>Price :</h5>
                                                            </td>
                                                            <td>      
                                                                <h4>Rs. <?php echo $price?></h4> 
                                                            </td>
                                                        </tr>

                                                        <tr class="table-order">
                                                            <td colspan="3">
                                                                <h5>Discounted Price : </h5>
                                                            </td>
                                                            <td>
                                                                 <h4>Rs. <?php echo $discounted?></h4> 
                                                            </td>
                                                        </tr>
                                                        
                                                      

                                                        <tr class="table-order">
                                                            <td colspan="3">
                                                                <h4 class="theme-color fw-bold">Total Price :</h4>
                                                            </td>
                                                            <td>
                                                                <h4 class="theme-color fw-bold"> Rs. <?php echo $totalprice?></h4> 
                                                            </td>
                                                        </tr>
                                                     
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-xl-4">
                                            <div class="order-success">
                                                <div class="row g-4">
                                                    <h4>summary</h4>
                                                    <ul class="order-details">
                                                        
                                                        <li>Order ID: <?php echo $id?></li>
                                                        <li>Order Date: <?php echo $order_date?></li>
                                                        <li>Order Total Rs. : <?php echo $totalprice?></li>
                                                    </ul>

                                                    <h4>shipping address</h4>
                                                    <ul class="order-details">
                                                        <li><?php echo $address?></li>
                                                      
                                                    </ul>

                                                    <div class="payment-mode">
                                                        <h4>payment method</h4>
                                                        <p><?php echo $paymethod?></p>
                                                    </div>

                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- section end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tracking table end -->

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
        <!-- tracking section End -->
    </div>
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


<!-- Mirrored from themes.pixelstrap.com/voxo/back-end/order-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Jan 2023 20:05:21 GMT -->
</html>