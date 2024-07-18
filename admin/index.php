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
    <link rel="shortcut icon" href="assets/images/favicon/4.jpg" type="image/x-icon">
    <title>Admin Dashboard</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&amp;family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="assets/css/ratio.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vector-map.css">

    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  
  <style>
    .to-do-list .to-do-item {
    margin-bottom: 20px !important;
    border-bottom: 1px solid #e8eaf6 !important;
    padding-bottom: 10px !important;
}
  </style>
</head>

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">
        <!-- Page Header Start-->
        <?php include("header.php"); ?>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <?php include("sidebar.html"); ?>

            <!-- index body start -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- chart caard section start -->
                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-primary border-5 border-0 card o-hidden">
                                <div class="custome-1-bg b-r-4 card-body">
                                    <div class="media align-items-center static-top-widget">
                                        <div class="media-body p-0">
                                          	<?php 
                                          		$sql_earning= "SELECT Price_With_Shipping FROM Orders";
                                          		$result_e= $conn->query($sql_earning);
                                          		$total_earnings= 0;
                                          		while($row_e= mysqli_fetch_array($result_e)){
                                                  $total_earnings += $row_e['Price_With_Shipping'];
                                                }
                                          
                                          	?>
                                            <span class="m-0">Total Earnings (Rs.)</span>
                                            <h4 class="mb-0 counter"><?php echo $total_earnings ?>
                                                <!--<span class="badge badge-light-primary grow">
                                                    <i data-feather="trending-up"></i>8.5%</span>-->
                                            </h4>
                                        </div>
                                        <div class="align-self-center text-center">
                                            <i data-feather="database"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-danger border-5 border-0 card o-hidden">
                                <div class=" custome-2-bg  b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                          <?php
  												$sql_orders = "SELECT COUNT(*) AS count FROM Orders";
                                                $result_o = $conn->query($sql_orders);
                                                if ($result_o->num_rows > 0) {
                                                  $count= 0;
                                                  while($row_o = $result_o->fetch_assoc()) {
                                                    $count += $row_o["count"];
                                                  }
                                                } 
  											?>
                                            <span class="m-0">Total Orders</span>
                                            <h4 class="mb-0 counter"><?php echo $count ?>
                                                <!--<span class="badge badge-light-danger grow">
                                                    <i data-feather="trending-down"></i>8.5%</span>-->
                                            </h4>
                                        </div>
                                        <div class="align-self-center text-center">
                                            <i data-feather="shopping-bag"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-secondary border-5 border-0  card o-hidden">
                                <div class=" custome-3-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                          <?php
  												$sql_review = "SELECT COUNT(*) AS count FROM Product_Review";
                                                $result_r = $conn->query($sql_review);
                                                if ($result_r->num_rows > 0) {
                                                  $count= 0;
                                                  while($row_r = $result_r->fetch_assoc()) {
                                                    $count += $row_r["count"];
                                                  }
                                                } 
  											?>
                                            <span class="m-0">Reviews</span>
                                            <h4 class="mb-0 counter"><?php echo $count ?>
                                                <!--<span class="badge badge-light-secondary grow ">
                                                    <i data-feather="trending-up"></i>8.5%</span>-->
                                            </h4>
                                        </div>

                                        <div class="align-self-center text-center">
                                            <i data-feather="message-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="b-b-success border-5 border-0 card o-hidden">
                                <div class=" custome-4-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                          <?php
  												$sql_users = "SELECT COUNT(*) AS count FROM Customer";
                                                $result_u = $conn->query($sql_users);
                                                if ($result_u->num_rows > 0) {
                                                  $count= 0;
                                                  while($row_u = $result_u->fetch_assoc()) {
                                                    $count += $row_u["count"];
                                                  }
                                                } 
  											?>
                                            <span class="m-0">Total Users</span>
                                            <h4 class="mb-0 counter"><?php echo $count ?>
                                                <!--<span class="badge badge-light-success grow">
                                                    <i data-feather="trending-down"></i>8.5%</span>-->
                                            </h4>
                                        </div>

                                        <div class="align-self-center text-center">
                                            <i data-feather="user-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- chart caard section End -->

                        <!-- Earning chart star-->
                        <div class="col-12">
                            <div class="card o-hidden ">
                                <div class="card-header border-0 pb-1">
                                    <div class="card-header-title">
                                        <h4>Revenue Report <?php echo date("Y") ?></h4>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div id="report-chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Earning chart  end-->

                      	   <!-- Orders start-->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card o-hidden card-hover">
                                <div class="card-header border-0">
                                    <div class="card-header-title">
                                        <h4>Recent Orders</h4>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <ul class="StepProgress">
                                      <?php

                                      // SQL query to retrieve the first 5 orders with their total item count
                                      $query = "SELECT o.Order_ID, COUNT(oi.Order_ID) AS TotalItems
                                                FROM Orders o
                                                JOIN Order_Items oi ON o.Order_ID = oi.Order_ID
                                                WHERE o.Status IN ('Paid', 'In Process')
                                                GROUP BY o.Order_ID
                                                ORDER BY o.Order_ID
                                                LIMIT 5";

                                      $result = $conn->query($query);

                                      // Check if any rows are returned
                                      if ($result->num_rows > 0) {
                                          // Loop through the rows and generate the <li> elements
                                          while ($row = $result->fetch_assoc()) {
                                              $orderID = $row["Order_ID"];
                                              $totalItems = $row["TotalItems"];
                                              ?>
                                              <li class="StepProgress-item">
                                                  <strong>Order# <?php echo $orderID; ?></strong>
                                                  <p>Total Items: <?php echo $totalItems; ?></p>
                                              </li>
                                              <?php
                                          }
                                        
                                      } else {
                                          // Handle the case when no rows are returned
                                          echo "<li>No orders found.</li>";
                                      }

                                      ?>
                                    </ul>
                                  	<a href="all-orders" class="align-items-center btn btn-theme mt-3">View All Orders</a>
                                </div>
                            </div>
                        </div>
                        <!-- orders end-->
                        
                        <!-- categories chart start-->
                        <div class="col-xxl-4 col-md-6">
                            <div class="h-100">
                                <div class="card o-hidden card-hover">
                                    <div class="card-header border-0">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="card-header-title">
                                                <h4>Popular Categories</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="pie-chart">
                                            <div id="pie-chart-visitors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- categories chart end-->
                      
                      	<!-- Transactions start-->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card o-hidden card-hover">
                                <div class="card-header border-0">
                                    <div class="card-header-title">
                                        <h4>Transactions</h4>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div>
                                        <div class="table-responsive table-desi">
                                            <table class="user-table transactions-table table border-0">
                                              <?php
                                                // Initialize counts
                                                $stripeCount = 0;
                                                $codCount = 0;

                                                $query = "SELECT Payment_Method, COUNT(*) AS Transaction_Count
                                                          FROM `Orders`
                                                          WHERE Payment_Method IN ('Stripe', 'COD')
                                                          GROUP BY Payment_Method";

                                                // Execute the query
                                                $result = mysqli_query($conn, $query);

                                                if ($result) {
                                                    // Fetch the results
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $paymentMethod = $row['Payment_Method'];
                                                        $transactionCount = $row['Transaction_Count'];

                                                        // Store counts separately based on payment method
                                                        if ($paymentMethod === 'Stripe') {
                                                            $stripeCount = $transactionCount;
                                                        } elseif ($paymentMethod === 'COD') {
                                                            $codCount = $transactionCount;
                                                        }
                                                    }

                                                    // Free the result set
                                                    mysqli_free_result($result);
                                                } else {
                                                    // Handle query error
                                                    echo "Error executing query: " . mysqli_error($connection);
                                                }

                                                ?>

                                                <tbody>
                                                    <tr>
                                                        <td class="td-color-1">
                                                            <div class="transactions-icon">
                                                                <i data-feather="credit-card"></i>
                                                            </div>
                                                            <div class="transactions-name">
                                                                <h6>Stripe</h6>
                                                                <p>Payment</p>
                                                            </div>
                                                        </td>

                                                        <td class="success"><?php echo $stripeCount ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-color-3">
                                                            <div class="transactions-icon">
                                                                <i data-feather="check"></i>
                                                            </div>
                                                            <div class="transactions-name">
                                                                <h6>COD</h6>
                                                                <p>Payment</p>
                                                            </div>
                                                        </td>

                                                        <td class="lost"><?php echo $codCount ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Transactions end-->


                        <!-- To Do List start-->
                        <div class="col-12">
                            <div class="card o-hidden card-hover">
                                <div class="card-header border-0">
                                    <div class="card-header-title">
                                        <h4>To Do List</h4>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <ul class="to-do-list">
                                      	<?php
  											$sql_tasks= "SELECT * FROM To_Do_List";
                                            $result_tasks= $conn->query($sql_tasks);                                                  
                                            if ($result_tasks->num_rows > 0) {
                                                while ($row_tasks = $result_tasks->fetch_assoc()) {
                                                  $dateTimeStr = $row_tasks['Date_Time']; //date and time in the format "YYYY-MM-DD HH:MM:SS"
                                                  $dateTime = new DateTime($dateTimeStr);
                                                  // Format the DateTime object as desired display format
                                                  $displayDateTime = $dateTime->format('F d, Y H:i:s');
                                                   echo 
                                                   '<li class="to-do-item">
                                                        <div class="form-check user-checkbox">
                                                            <input class="checkbox_animated check-it" type="checkbox" id="task-done" value="'.$row_tasks['ID'].'">
                                                        </div>
                                                        <div class="to-do-list-name">
                                                            <strong>'.$row_tasks['Task'].'</strong>
                                                            <p>'.$displayDateTime.'</p>
                                                        </div>
                                                    </li>      ';
                                                }
                                            } else {
                                                echo "No Task is Pending.";
                                            }
  										?>
                                        <li class="to-do-item">
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-2">
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="task" name="task" placeholder="Enter Task">
                                                </div>
                                                <div class="col-lg-4">
                                                    <button type="submit" class="btn btn-primary w-100">Add task</button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- To Do List end-->

                        <!-- Recent Activity start-->
                        <!-- <div class="col-xxl-4 col-md-6">
                            <div class="card o-hidden card-hover">
                                <div class="card-header border-0">
                                    <div class="card-header-title">
                                        <h4>Recent Activity</h4>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <ul class="recent-activity">
                                        <li class="recent-item">
                                            <div class="recent-icon">
                                                <span class="lnr lnr-calendar-full"></span>
                                                <p>Calendar Updated</p>
                                            </div>

                                            <div class="recent-timer">
                                                <h6 class="color-1">Just Now</h6>
                                            </div>
                                        </li>
                                        <li class="recent-item">
                                            <div class="recent-icon">
                                                <i data-feather="alert-circle"></i>
                                                <p>Commrnted on a post</p>
                                            </div>

                                            <div class="recent-timer">
                                                <h6 class="color-2">5 Min</h6>
                                            </div>
                                        </li>
                                        <li class="recent-item">
                                            <div class="recent-icon">
                                                <i data-feather="truck"></i>
                                                <p>Order 392 shipped</p>
                                            </div>

                                            <div class="recent-timer">
                                                <h6 class="color-3">12 Min</h6>
                                            </div>
                                        </li>
                                        <li class="recent-item">
                                            <div class="recent-icon">
                                                <i data-feather="dollar-sign"></i>
                                                <p>Invoice 653 has been paid</p>
                                            </div>

                                            <div class="recent-timer">
                                                <h6 class="color-4">45 Min</h6>
                                            </div>
                                        </li>
                                        <li class="recent-item">
                                            <div class="recent-icon">
                                                <span class="lnr lnr-user"></span>
                                                <p>A new user has been added</p>
                                            </div>

                                            <div class="recent-timer">
                                                <h6 class="color-1">1 Hr</h6>
                                            </div>
                                        </li>
                                        <li class="recent-item mb-0">
                                            <div class="recent-icon">
                                                <span class="lnr lnr-select"></span>
                                                <p>Finace report</p>
                                            </div>

                                            <div class="recent-timer">
                                                <h6 class="color-2">Just Now</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- Recent Activity end-->

                        <!-- Browser States start-->
                        <!-- <div class="col-xxl-4 col-md-6">
                            <div class="card o-hidden card-hover">
                                <div class="card-header border-0">
                                    <div class="card-header-title">
                                        <h4>Browser States</h4>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <ul class="brower-states">
                                        <li class="brower-item">
                                            <div class="browser-image">
                                                <img src="assets/images/brower-image/chrome.png" class="img-fluid"
                                                    alt="">
                                                <h5>Chrome</h5>
                                            </div>

                                            <div class="browser-progressbar">
                                                <h6>84%</h6>
                                            </div>
                                        </li>
                                        <li class="brower-item">
                                            <div class="browser-image">
                                                <img src="assets/images/brower-image/firefox.png" class="img-fluid"
                                                    alt="">
                                                <h5>Firefox</h5>
                                            </div>

                                            <div class="browser-progressbar">
                                                <h6>48%</h6>
                                            </div>
                                        </li>
                                        <li class="brower-item">
                                            <div class="browser-image">
                                                <img src="assets/images/brower-image/internet-explorer.png"
                                                    class="img-fluid" alt="">
                                                <h5>internet Explorer</h5>
                                            </div>

                                            <div class="browser-progressbar">
                                                <h6>35%</h6>
                                            </div>
                                        </li>
                                        <li class="brower-item">
                                            <div class="browser-image">
                                                <img src="assets/images/brower-image/opera.png" class="img-fluid"
                                                    alt="">
                                                <h5>Opera Mini</h5>
                                            </div>

                                            <div class="browser-progressbar">
                                                <h6>55%</h6>
                                            </div>
                                        </li>
                                        <li class="brower-item">
                                            <div class="browser-image">
                                                <img src="assets/images/brower-image/safari.png" class="img-fluid"
                                                    alt="">
                                                <h5>Safari</h5>
                                            </div>

                                            <div class="browser-progressbar">
                                                <h6>20%</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- Browser States end-->
                    </div>
                </div>
                <!-- Container-fluid Ends-->

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
                <!-- footer End-->
            </div>
            <!-- index body end -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End-->

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
                      <form action="logout.php" method="post">
                        <button type="submit" class="btn  btn--yes btn-primary" >Yes</button>
                      </form>
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

    <!-- Sidebar jquery -->
    <script src="assets/js/config.js"></script>

    <!-- tooltip init js -->
    <script src="assets/js/tooltip-init.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- Apexchar js -->
    <script src="assets/js/chart/apex-chart/apex-chart1.js"></script>
    <script src="assets/js/chart/apex-chart/moment.min.js"></script>
    <script src="assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="assets/js/chart/apex-chart/chart-custom1.js"></script>

    <!-- customizer js -->
    <script src="assets/js/customizer.js"></script>

    <!-- ratio js -->
    <script src="assets/js/ratio.js"></script>
  
   <!-- Timer Js -->
    <script src="/assets/js/timer1.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
</body>
 

<?php
// SQL query to calculate total order amount for each month
$sql = "SELECT 
            DATE_FORMAT(STR_TO_DATE(Order_Date, '%M %e %Y'), '%M') AS month,
            SUM(Price_With_Shipping) AS total_amount
        FROM
            Orders
        WHERE
            DATE_FORMAT(STR_TO_DATE(Order_Date, '%M %e %Y'), '%M') IN ('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')
        GROUP BY
            DATE_FORMAT(STR_TO_DATE(Order_Date, '%M %e %Y'), '%M')
        ORDER BY
            STR_TO_DATE(Order_Date, '%M %e %Y')";

$result = $conn->query($sql);

// Create an associative array with all 12 months
$months = array(
    'January' => 0,
    'February' => 0,
    'March' => 0,
    'April' => 0,
    'May' => 0,
    'June' => 0,
    'July' => 0,
    'August' => 0,
    'September' => 0,
    'October' => 0,
    'November' => 0,
    'December' => 0
);

// Check if query execution was successful
if ($result) {
    // Fetch all rows from the result set into an associative array
    $orderAmounts = $result->fetch_all(MYSQLI_ASSOC);

    // Iterate through the fetched rows and update the corresponding month's order amount
    foreach ($orderAmounts as $order) {
        $month = $order['month'];
        $totalAmount = $order['total_amount'];

        $months[$month] = $totalAmount;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Generate the series data for Apex chart
$seriesData = [];
foreach ($months as $month => $totalAmount) {
    $seriesData[] = [
        'x' => $month,
        'y' => $totalAmount,
        'goals' => [
            [
                'name' => 'Expected',
                'value' => $totalAmount,
                'strokeWidth' => 5,
                'strokeColor' => '#775DD0'
            ]
        ]
    ];
}

// Generate the options for Apex chart
$options = [
    'series' => [
        [
            'name' => 'Actual',
            'data' => $seriesData
        ]
    ],
    'chart' => [
        'height' => 320,
        'type' => 'bar'
    ],
    'plotOptions' => [
        'bar' => [
            'columnWidth' => '40%'
        ]
    ],
    'colors' => ['#e22454'],
    'dataLabels' => [
        'enabled' => false
    ],
    'legend' => [
        'show' => false
    ]
];

// Encode the options array to JSON format
$optionsJSON = json_encode($options);
?>

<script>
var options = <?php echo $optionsJSON; ?>;

var chart = new ApexCharts(document.querySelector("#report-chart"), options);
chart.render();
</script>


  
<?php
// SQL query to count the number of order items bought for each category
$query = "SELECT p.Category, COUNT(oi.Product_ID) AS TotalItems
          FROM Order_Items oi
          INNER JOIN Product p ON oi.Product_ID = p.Product_ID
          GROUP BY p.Category";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if ($result) {
    // Initialize an empty array for the series data
    $seriesData = array();

    // Fetch the results and store the counts in the series data array
    while ($row = mysqli_fetch_assoc($result)) {
        $count = intval($row['TotalItems']);
        $seriesData[] = $count;
    }
    // Convert the series data array to a JSON string
    $seriesJson = json_encode($seriesData);
} else {
    // Handle the case when the query fails
    echo "Failed to retrieve category counts: " . mysqli_error($conn);
}
?>

<script>
var options = {
    series: <?php echo $seriesJson; ?>,
    labels: ['Sofa', 'Chair', 'Table', 'Bed', 'AR'],
    chart: {
        width: "100%",
        height: 275,
        type: 'donut',
    },
    legend: {
        fontSize: '12px',
        position: 'bottom',
        offsetX: 1,
        offsetY: -1,

        markers: {
            width: 10,
            height: 10,
        },

        itemMargin: {
            vertical: 2
        },
    },

    colors: ['#4aa4d9', '#ef3f3e', '#9e65c2', '#6670bd', '#FF9800', '#e22454'],

    plotOptions: {
        pie: {
            startAngle: -90,
            endAngle: 270
        }
    },

    dataLabels: {
        enabled: false
    },

    responsive: [{
            breakpoint: 1835,
            options: {
                chart: {
                    height: 245,
                },

                legend: {
                    position: 'bottom',

                    itemMargin: {
                        horizontal: 5,
                        vertical: 1
                    },
                },
            },
        },

        {
            breakpoint: 1388,
            options: {
                chart: {
                    height: 330,
                },

                legend: {
                    position: 'bottom',
                },
            },
        },

        {
            breakpoint: 1275,
            options: {
                chart: {
                    height: 300,
                },

                legend: {
                    position: 'bottom',
                },
            },
        },

        {
            breakpoint: 1158,
            options: {
                chart: {
                    height: 280,
                },

                legend: {
                    fontSize: '10px',
                    position: 'bottom',
                    offsetY: 10,
                },
            },
        },

        {
            theme: {
                mode: 'dark',
                palette: 'palette1',
                monochrome: {
                    enabled: true,
                    color: '#255aee',
                    shadeTo: 'dark',
                    shadeIntensity: 0.65
                },
            },
        },

        {
            breakpoint: 598,
            options: {
                chart: {
                    height: 280,
                },

                legend: {
                    fontSize: '12px',
                    position: 'bottom',
                    offsetX: 5,
                    offsetY: -5,

                    markers: {
                        width: 10,
                        height: 10,
                    },

                    itemMargin: {
                        vertical: 1
                    },
                },
            },
        },
    ],
};

var chart = new ApexCharts(document.querySelector("#pie-chart-visitors"), options);
chart.render();
  </script>

  
  <!--  ADD NEW TASK -->
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  		$task= $_POST['task'];
    	$currentDateTime = date('Y-m-d H:i:s');

    	$sql_add_task= "INSERT INTO To_Do_List (Task,Date_Time) VALUES ('$task','$currentDateTime')";
        if($result_add_task= $conn->query($sql_add_task)){
          echo '<meta http-equiv="refresh" content="0">';
        }
    	else {
        // Error in preparing the statement
        echo "Error: " . $conn->error;
    }
  }
  ?>
  
  <!-- DELETE TASK -->
  <script>
  $(document).ready(function() {
    $('.checkbox_animated').on('click', function() {
      var checkbox = $(this);
      var taskId = checkbox.val();
      var listItem = checkbox.closest('.to-do-item');

      // Strike out the task
      listItem.find('.to-do-list-name').css('text-decoration', 'line-through');

      // Send AJAX request to delete the task
      $.ajax({
        url: 'delete-task.php',
        method: 'POST',
        data: {
          taskId: taskId
        },
        success: function(response) {
          // Hide the task with animation
          listItem.fadeOut(500, function() {
            listItem.remove();
          });
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });
</script>
  
</html>