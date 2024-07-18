<?php
	$page_title = 'Order Tracking';
    require_once "header-new.php";
	require_once "navbar.php";
    require_once "admin/config.php";
	if (isset($_GET['tracking-id'])) 
    $id = $_GET['tracking-id'];

?>
<!-- Breadcrumb section start -->
    <section class="breadcrumb-section section-b-space">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Order Tracking</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i> /
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order tracking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Order Track Section Start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-12 overflow-hidden">
                    <div class="order-left-image ratio_asos">

                        <div class="order-image-contain">
                            <h4>Tracking ID: <?php echo $id ?></h4>
							<?php
  								$sql = "SELECT * FROM Orders WHERE Tracking_ID = '$id'";
                                $result = mysqli_query($conn, $sql);

                                if (!$result) {
                                    // handle the SQL error
                                    echo "Error: " . mysqli_error($conn);
                                } else if (mysqli_num_rows($result) == 0) {
                                    // handle the case where no rows were found
                                    echo "No rows found with Tracking_ID = $id";
                                } else {
                                    // fetch the row data
                                    $row = mysqli_fetch_assoc($result);
                                    $order_id = $row['Order_ID'];
                                    $order_date = $row['Order_Date'];
                                  	$ship_date = $row['Ship_Date'];
                                  	$deliver_date = $row['Deliver_Date'];
                                  	$order_status= $row['Status'];
                                }

  							?>
                            <div class="tracker-number">
                                <p class="font-light">Order ID : <span><?php echo $order_id ?></span></p>
                                <p class="font-light mb-0">Order Placed : <span><?php echo $order_date ?></span></p>
                            </div>
                            <ol class="progtrckr">
                                <li class="progtrckr-done">
                                    <h5>Order Processing</h5>
                                    <h6><?php echo $order_date ?></h6>
                                </li>
                              	<?php if($order_status== "Shipped") { ?>
                              	<li class="progtrckr-done">
                                    <h5>Shipped</h5>
                                    <h6><?php echo $ship_date ?></h6>
                                </li>
                                <li class="progtrckr-todo">
                                    <h5>Delivered</h5>
                                    <h6>Pending</h6>
                              	</li></ol>
                              	<h5 class="font-light" id="status"style="text-align:center">Your Order has been shipped. Be ready for Delivery.</h5>
                              	<?php } 
                              	else if($order_status== "Delivered") { ?>
                              	<li class="progtrckr-done">
                                    <h5>Shipped</h5>
                                    <h6><?php echo $ship_date ?></h6>
                                </li>
                                <li class="progtrckr-done">
                                    <h5>Delivered</h5>
                                    <h6><?php echo $deliver_date ?></h6>
                          		</li></ol>
                              	<h5 class="font-light" id="status" style="text-align:center">Your Order has been delivered.</h5>
                              	<?php } else { ?>
                              	<li class="progtrckr-todo">
                                    <h5>Shipped</h5>
                                    <h6>Pending</h6>
                                </li>
                                <li class="progtrckr-todo">
                                    <h5>Delivered</h5>
                                    <h6>Pending</h6>
                      			</li></ol>
                  				<h5 class="font-light" id="status" style="text-align:center">Your Order has been placed. In process for Shipping.</h5>
                              	<?php } ?>
                           
                        </div>
                    </div>
                </div>
				</div>
                </div>
    </section>
    <!-- Order Track Section End -->

    <?php include("footer.php") ?>

    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

</html>