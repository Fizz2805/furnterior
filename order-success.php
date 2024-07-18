<?php
	$page_title = 'Order Success';
    require_once "header-new.php";
	require_once "navbar.php";
    require_once "admin/config.php";
 	$cust_id= $_SESSION['userID'];

	$shipping_address= $_SESSION['shipping']['address'];
	$billing_address= $_SESSION['billing_address'];
	// Get current date in D M Y format
    $currentDate = date('F d Y');
    // Convert date to string
    $dateString = strtotime($currentDate);
    $date = date('F d Y', $dateString);
	$price= $_SESSION['price']['total'];
	$discount_price= $_SESSION['price']['final'];
	$shipping= $_SESSION['price']['shipping'];
	$shipped_price= $_SESSION['price']['total_order'];
	// generating tracking id
	$prefix = "ORDER";
	$tracking_id = substr(uniqid($prefix, true), 0, 19);	

function sendEmailOrderConfirmation($conn, $cust_id,$order_id, $tracking_id, $shipping_address, $billing_address, $price, $discount_price, $shipping, $shipped_price) {
	
    // Get customer details
    $cust_que = "SELECT Full_Name, Email FROM Customer WHERE Cust_ID = $cust_id";
    $result_cust = $conn->query($cust_que);
    $row_cust = $result_cust->fetch_assoc();
    $cust_email = $row_cust['Email'];
    $cust_name = $row_cust['Full_Name'];

  	$to = $cust_email;
    $subject = 'Your Order has been Confirmed';
  
    // Get order items
    $items_que= "SELECT *  FROM Order_Items INNER JOIN Product ON Order_Items.Product_ID = Product.Product_ID WHERE Order_Items.Order_ID = $order_id;";
    $result_items = $conn->query($items_que);

    // Load the email template
    $html_message = file_get_contents('admin/email-templates/order-success.html');

    // Replace placeholders with customer details
    $html_message = str_replace('{name}', $cust_name, $html_message);
    $html_message = str_replace('{trackingId}', $tracking_id, $html_message);
    $html_message = str_replace('{shippingaddress}', $shipping_address, $html_message);
    $html_message = str_replace('{billingaddress}', $billing_address, $html_message);
    $html_message = str_replace('{subtotal}', $price, $html_message);
    $html_message = str_replace('{discountprice}', $discount_price, $html_message);
    $html_message = str_replace('{shipping}', $shipping, $html_message);
    $html_message = str_replace('{total}', $shipped_price, $html_message);

    // Loop over order items and add HTML row for each item to email template
    $items_html = '';
    while ($row = $result_items->fetch_assoc()) {
        $item_html = '<tr>';
        $item_html .= '<td valign="top" style="padding-left: 15px;"><h5 style="margin-top: 15px;">' . $row['Name'] . '</h5></td>';
        $item_html .= '<td valign="top" style="padding-left: 15px;"><h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>' . $row['Quantity'] . '</span></h5></td>';
        $item_html .= '<td valign="top" style="padding-left: 15px;"><h5 style="font-size: 14px; color:#444;margin-top:15px"><b>Rs. ' . $row['Price'] . '</b></h5></td>';
        $item_html .= '</tr>';
        $items_html .= $item_html;
    }

    // Replace placeholder for order items with HTML rows
    $html_message = str_replace('{orderitems}', $items_html, $html_message);

    // Get admin email
    $admin_que = "SELECT Email FROM Admin LIMIT 1";
    $result = $conn->query($admin_que);
    $row = $result->fetch_assoc();
    $admin_email = $row['Email'];

            // Set the headers for the email, including the content type
            $headers = "From: $admin_email\r\n";
            $headers .= "Reply-To: noreply@codemply.com\r\n";
            $headers .= "Content-type: text/html\r\n";

            // Send the email
            mail($to, $subject, $html_message, $headers);
      
    }

	if(isset($_SESSION['pay_method']) && $_SESSION['pay_method']=="COD")
    {
     	 $sql_order= "INSERT INTO Orders (Cust_ID, Payment_Method,Shipping_Address,Billing_Address,Order_Date,Price,Discounted_Price,Price_With_Shipping,Tracking_ID,Status) VALUES ($cust_id, 'COD', '$shipping_address','$billing_address','$date',$price, $discount_price, $shipped_price, '$tracking_id','In Process')";
      	if($conn->query($sql_order)==TRUE){
          	$sql_order= "SELECT * FROM Orders WHERE Cust_ID = $cust_id ORDER BY Order_ID DESC LIMIT 1";  // selecting the current order as it is placed in the end of table
          	$result= $conn->query($sql_order);
          	if ($result->num_rows > 0) {
    			$row = mysqli_fetch_assoc($result);
     			$order_id= $row['Order_ID'];
              	// Inserting each cart items in Order_Items table
                foreach ($_SESSION['cart'] as $product_id => $product) {
                    $product_cost = $product['cost'];
                    $product_qty = $product['qty'];
                    $product_total = $product_qty * $product_cost;
                  
                  	// Update the product quantity in the Product table 
                  	$sql_select= "SELECT * FROM Product WHERE Product_ID= $product_id";
                  	$result_select= $conn->query($sql_select);
                  	$row_select = mysqli_fetch_assoc($result_select);
                  	$stock_status= $row_select['Stock_Status'];
                  	$stock_qty= $row_select['Stock_Qty'];
                  	$new_qty= $stock_qty - $product_qty;
                  	if($new_qty == 0){
                     	$update_sql = "UPDATE Product SET Stock_Qty = $new_qty, Stock_Status= 'Out of Stock' WHERE Product_ID = $product_id";
                  		$result = mysqli_query($conn, $update_sql);
                      
                    } else {
    					$update_sql = "UPDATE Product SET Stock_Qty = $new_qty WHERE Product_ID = $product_id";
                  		$result = mysqli_query($conn, $update_sql);
                      
                    }
                  
                    $sql_products= "INSERT INTO Order_Items (Order_ID, Product_ID, Quantity, Price) VALUES ($order_id, $product_id, $product_qty, $product_total)";
                  	$conn->query($sql_products);
                  
            		//sendEmailOrderConfirmation($conn, $cust_id,$order_id,$tracking_id,$shipping_address,$billing_address,$price,$discount_price,$shipping,$shipped_price);
                  
                } // for each end
              } // if result end
            } // if query end
      		else {
               echo "Error: " . $sql_order . "<br>" . $conn->error;
            }
         } // if isset end
		else if(isset($_SESSION['pay_method']) && $_SESSION['pay_method']=="Stripe")
    	{
     	 $sql_order= "INSERT INTO Orders (Cust_ID,Payment_Method,Transaction_ID,Shipping_Address,Billing_Address,Order_Date,Price,Discounted_Price,Price_With_Shipping,Tracking_ID,Status) VALUES ($cust_id, 'Stripe', {$_SESSION['Transaction_ID']}, '$shipping_address','$billing_address','$date',$price, $discount_price, $shipped_price, '$tracking_id','Paid')";
      	if($conn->query($sql_order)==TRUE){
          	$sql_order= "SELECT * FROM Orders WHERE Cust_ID = $cust_id ORDER BY Order_ID DESC LIMIT 1";  // selecting the current order as it is placed in the end of table
          	$result= $conn->query($sql_order);
          	if ($result->num_rows > 0) {
    			$row = mysqli_fetch_assoc($result);
     			$order_id= $row['Order_ID'];
              	// Inserting each cart items in Order_Items table
                foreach ($_SESSION['cart'] as $product_id => $product) {
                    $product_cost = $product['cost'];
                    $product_qty = $product['qty'];
                    $product_total = $product_qty * $product_cost;
                  
                  	// Update the product quantity in the Product table 
                  	$sql_select= "SELECT * FROM Product WHERE Product_ID= $product_id";
                  	$result_select= $conn->query($sql_select);
                  	$row_select = mysqli_fetch_assoc($result_select);
                  	$stock_status= $row_select['Stock_Status'];
                  	$stock_qty= $row_select['Stock_Qty'];
                  	$new_qty= $stock_qty - $product_qty;
                  	if($new_qty == 0){
                     	$update_sql = "UPDATE Product SET Stock_Qty = $new_qty, Stock_Status= 'Out of Stock' WHERE Product_ID = $product_id";
                  		$result = mysqli_query($conn, $update_sql);
                      
                    } else {
    					$update_sql = "UPDATE Product SET Stock_Qty = $new_qty WHERE Product_ID = $product_id";
                  		$result = mysqli_query($conn, $update_sql);
                      
                    }
                  
                  
                    $sql_products= "INSERT INTO Order_Items (Order_ID, Product_ID, Quantity, Price) VALUES ($order_id, $product_id, $product_qty, $product_total)";
                  	$conn->query($sql_products);
                  
                  	//sendEmailOrderConfirmation($conn, $cust_id,$order_id,$tracking_id,$shipping_address,$billing_address,$price,$discount_price,$shipping,$shipped_price);
                  	
                } // for each end
              } // if result end
            } // if query end
      		else {
               echo "Error: " . $sql_order . "<br>" . $conn->error;
            }
         } // if isset end 
          
    ?>
<head>
  <style>
       .cont {
  text-align: center;
}

.progress-container {
  display: flex;
  justify-content: space-between;
  position: relative;
  margin-bottom: 60px;
  max-width: 100%;
}

.progress-container::before {
  content: "";
  background-color: #C4C1C1;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  height: 4px;
  width: 100%;
  z-index: -1;
}

.progress {
  background-color: #e87316 !important;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  height: 4px;
  width: 0%;
  z-index: -1;
  transition: 0.4s ease;
}

.circle {
  background: #C4C1C1;
  color: #C4C1C1;
  border-radius: 50%;
  height: 10px;
  width: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 3px solid #C4C1C1;
  transition: 0.4s ease;
}

.circle.active {
  border-color: #e87316;
  background-color: #fff;
  color: #e87316;
  scale: 1.1;
}

.circle .icon {
  position: absolute;
  font-size: 25px;
  bottom: 25px;
}
.circle .caption {
  position: absolute;
  font-size: 14px;
  font-weight: bolder;
  bottom: -30px;
}


@media only screen and (max-width: 400px) {
  .cont {
    width: 85%;
  }
}

  </style>
</head>


    <!-- Order Success Section Start -->
    <section class="pt-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="success-icon">
                        <div class="main-container">
                            <div class="check-container">
                                <div class="check-background">
                                    <svg viewBox="0 0 65 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 25L27.3077 44L58.5 7" stroke="white" stroke-width="13"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="check-shadow"></div>
                            </div>
                        </div>

                        <div class="success-contain">
                            <h4>Order Success</h4>
                            <h5 class="font-light">Your Order is Successfully Completed</h5>
                            <h6 class="theme-color">Tracking ID: <?php echo $tracking_id ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Success Section End -->

<section>
        <div class="container mt-3">
          <div class-="row g-4">
            <div class="col">
              <div class="container cont">
                <div class="progress-container">
                  <div class="progress" id="progress"></div>
                  <div class="circle active">
                    <i data-feather="shopping-cart" class="icon"></i>
                    <div class="caption">Cart</div>
                  </div>
                  <div class="circle active">
                    <i data-feather="truck" class="icon"></i>
                    <div class="caption">Shipping</div>
                  </div>
                  <div class="circle active">
                    <i data-feather="credit-card" class="icon"></i>
                    <div class="caption">Billing</div>
                  </div>
                  <div class="circle active">
                    <i data-feather="check-circle" class="icon"></i>
                    <div class="caption">Confirmation</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  			</div>
          </section>

    <!-- Oder Details Section Start -->
    <section class="section-b-space cart-section order-details-table">
        <div class="container">
            <div class="title title1 title-effect mb-1 title-left">
                <h2 class="mb-3">Order Details</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="col-sm-12 table-responsive">
                        <table class="table cart-table table-borderless">
                            <tbody>
                              	<?php
  									foreach ($_SESSION['cart'] as $product_id => $product) {
                                      $product_name = $product['name'];
                                      $product_image = $product['image'];
                                      $product_qty = $product['qty'];
                                      $product_cost = $product['cost'];
                                      $product_total = $product_qty * $product_cost;
                                    
  								?>
                                <tr class="table-order">
                                    <td>
                                      <img src="admin/assets/images/products/<?php echo $product_image; ?>" class="img-fluid blur-up lazyload" alt="">
                                    </td>
                                    <td>
                                        <p>Product Name</p>
                                        <h5><?php echo $product_name; ?></h5>
                                    </td>
                                    <td>
                                        <p>Quantity</p>
                                        <h5><?php echo $product_qty; ?></h5>
                                    </td>
                                    <td>
                                        <p>Price</p>
                                        <h5><?php echo "Rs. ".$product_cost; ?></h5>
                                    </td>
                                </tr>
								<?php  } ?>
                                
                            </tbody>
                            <tfoot>
                                <tr class="table-order">
                                    <td colspan="3">
                                        <h5 class="font-light">Subtotal :</h5>
                                    </td>
                                    <td>
                                        <h4><?php echo $_SESSION['price']['total'] ?> </h4>
                                    </td>
                                </tr>
                                                              
								<tr class="table-order">
                                    <td colspan="3">
                                        <h5 class="font-light">Discounted Price :</h5>
                                    </td>
                                    <td>
                                        <h4><?php echo $_SESSION['price']['final'] ?></h4>
                                    </td>
                                </tr>
                              
                              	<tr class="table-order">
                                    <td colspan="3">
                                        <h5 class="font-light">Shipping :</h5>
                                    </td>
                                    <td>
                                        <h4><?php echo "+ Rs. ".$_SESSION['price']['shipping'] ?></h4>
                                    </td>
                                </tr>
                              
                                <tr class="table-order">
                                    <td colspan="3">
                                        <h5 class="font-light">Final Price :</h5>
                                    </td>
                                    <td>
                                        <h4><?php echo $_SESSION['price']['total_order'] ?></h4>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="order-success">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <h4>summary</h4>
                                <ul class="order-details">
                                    <li>Order ID: <?php echo $order_id ?></li>
                                    <li>Order Date: <?php echo $date ?></li>
                                    <li>Order Total: <?php echo $_SESSION['price']['total_order'] ?></li>
                                </ul>
                            </div>

                            <div class="col-sm-6">
                                <h4>shipping address</h4>
                                <ul class="order-details">
                                    <li><?php echo $shipping_address= $_SESSION['shipping']['address']; ?></li>
                                </ul>
                            </div>

                            <div class="col-12">
                                <div class="payment-mode">
                                    <h4>payment method</h4>
                                    <p><?php echo $_SESSION['pay_method'] ?></p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="delivery-sec">
                                    <h3>Delivery within 7-8 working Days</h3>
                                </div>
                            </div>
                          	
                          	<div class="col-sm-6">
                               <button class="btn btn-solid-default mt-4" onclick="window.location.href='order-tracking?tracking-id=<?php echo $tracking_id ?>'" style="width: 90%">Track Order</button>
                            </div>
                          	<div class="col-sm-6">
                               <button class="btn btn-solid-default mt-4" onclick="window.location.href='user-dashboard'" style="width: 90%">Go to Your Dashboard</button>
                            </div>
                          
                          	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Details Section End -->

   <?php include("footer.php") ;
  		// unset the cart session
  		unset($_SESSION['cart']);

	?>



    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

</body>

</html>