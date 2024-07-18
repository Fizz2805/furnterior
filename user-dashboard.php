<?php
$page_title = 'User Dashboard';
require_once "header-new.php";
require_once "navbar.php";
require_once "admin/config.php";

if(!(isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn'] == TRUE)){
 	echo '<script> window.location.href= "log-in"; </script>';
  	exit;
}

$user_id= $_SESSION["userID"];
$sql= "SELECT * FROM Customer WHERE Cust_ID = $user_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
    $user_name= $row['Full_Name'];
    $uemail= $row['Email'];    
    $password= $row['Password'];    
    $phone= $row['Phone_No']; 
    $image_data = $row['Image'];
    $address= $row['Address'];
}

?>

<body class="theme-color2 light ltr">
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
                    <h3>User Dashboard</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i> /
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- user dashboard section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs custome-nav-tabs flex-column category-option" id="myTab">
                        <li class="nav-item mb-2">
                            <button class="nav-link font-light active" id="tab" data-bs-toggle="tab"
                            data-bs-target="#dash" type="button"><i
                            class="fas fa-angle-right"></i>Dashboard</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="1-tab" data-bs-toggle="tab" data-bs-target="#order"
                            type="button"><i class="fas fa-angle-right"></i>Orders</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="2-tab" data-bs-toggle="tab"
                            data-bs-target="#wishlist" type="button"><i
                            class="fas fa-angle-right"></i>Wishlist</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="3-tab" data-bs-toggle="tab" data-bs-target="#save"
                            type="button"><i class="fas fa-angle-right"></i>Saved
                        Address</button>
                    </li>

                    <!--<li class="nav-item mb-2">
                        <button class="nav-link font-light" id="4-tab" data-bs-toggle="tab" data-bs-target="#pay"
                        type="button"><i class="fas fa-angle-right"></i>Payment</button>
                    </li>-->

                    <li class="nav-item mb-2">
                        <button class="nav-link font-light" id="5-tab" data-bs-toggle="tab"
                        data-bs-target="#profile" type="button"><i
                        class="fas fa-angle-right"></i>Profile</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link font-light" id="6-tab" data-bs-toggle="tab"
                        data-bs-target="#security" type="button"><i
                        class="fas fa-angle-right"></i>Security</button>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="filter-button dash-filter dashboard">
                    <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dash">
                        <div class="dashboard-right">
                            <div class="dashboard">
                                <div class="page-title title title1 title-effect">
                                    <h2>My Dashboard</h2>
                                </div>
                                <div class="welcome-msg">
                                    <h6 class="font-light">Hello, <span><?php echo $user_name; ?> !</span></h6>
                                    <p class="font-light">From your My Account Dashboard you have the ability to
                                        view a snapshot of your recent account activity and update your account
                                    information. </p>
                                </div>

                                <div class="order-box-contain my-4">
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="order-box">
                                                <div class="order-box-image">
                                                    <img src="assets/images/svg/sent.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                                <div class="order-box-contain">
                                                    <img src="assets/images/svg/sent1.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                    <div>
                                                        <h5 class="font-light">Completed orders</h5>
                                                        <?php 
                                                            $sql_order = "SELECT COUNT(*) AS count_o FROM Orders WHERE Cust_ID = $user_id && Status='Delivered'";
                                                            $result_o = $conn->query($sql_order);

                                                            if ($result_o && $result_o->num_rows > 0) {
                                                                $row_o = $result_o->fetch_assoc();
                                                                echo '<h3>'.$row_o['count_o'].'</h3>';
                                                            } else {
                                                                echo '<h3>0</h3>';
                                                            }
                                                      	?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-6">
                                            <div class="order-box">
                                                <div class="order-box-image">
                                                    <img src="assets/images/svg/box.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                                <div class="order-box-contain">
                                                    <img src="assets/images/svg/box1.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                    <div>
                                                        <h5 class="font-light">pending orders</h5>
                                                        <?php 
                                                            $sql_pending = "SELECT COUNT(*) AS count_p FROM Orders WHERE Cust_ID = $user_id && (Status='In Process' || Status='Paid')";
                                                            $result_p = $conn->query($sql_pending);

                                                            if ($result_p && $result_p->num_rows > 0) {
                                                                $row_p = $result_p->fetch_assoc();
                                                                echo '<h3>'.$row_p['count_p'].'</h3>';
                                                            } else {
                                                                echo '<h3>0</h3>';
                                                            }
                                                      	?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-6">
                                            <div class="order-box">
                                                <div class="order-box-image">
                                                    <img src="assets/images/svg/wishlist.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                                <div class="order-box-contain">
                                                    <img src="assets/images/svg/wishlist1.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                    <div>
                                                        <h5 class="font-light">wishlist</h5>
                                                      	<?php 
                                                      		// Query the database to count the number of wishlist items 
                                                            $sql_wishlist = "SELECT COUNT(*) AS count FROM Customer_Wishlist WHERE Cust_ID = $user_id";
                                                            $result_w = $conn->query($sql_wishlist);

                                                            if ($result_w && $result_w->num_rows > 0) {
                                                                $row_w = $result_w->fetch_assoc();
                                                                echo '<h3>'.$row_w['count'].'</h3>';
                                                            } else {
                                                                echo '<h3>0</h3>';
                                                            }
                                                      	?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-account box-info">
                                    <div class="box-head">
                                        <h3>Account Information</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                  <h4>Contact Information</h4>
                                              </div>
                                              <div class="box-content">
                                                <h6 class="font-light"><?php echo $user_name; ?></h6>
                                                <h6 class="font-light"><?php echo $uemail; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box">
                                            <div class="box-title">
                                                <h4>Newsletters</h4>
                                            </div>
                                          	<?php
                                          		$sql = "SELECT * FROM Subscribers WHERE Email = '$uemail'";
                                                $result = $conn->query($sql);

                                                if ($result && $result->num_rows > 0) {
                                                  $row= $result->fetch_assoc();
                                                  $sub_id= $row['Sub_ID'];
                                                  echo '<div class="box-content">
                                                			<h6 class="font-light">You are subscribed to our newsletter.</h6>
                                            			</div>';
                                          		  echo '<a href="unsubscribe?id='.$sub_id.'">Unsubscribe</a>';
                                                  }
                                          		else
                                                  echo '<div class="box-content">
                                                			<h6 class="font-light">You are not subscribed to our newsletter.</h6>
                                            			</div>';
                                          	?>
                                            
                                        </div>
                                    </div>
                                </div>
                                  
                                <div class="box-account box-info">
                                    <div class="box-head">
                                        <h3>Saved Addresses</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                  <h4>Shipping Address</h4>
                                              </div>
                                              <?php
                                                $sql= "SELECT * FROM Customer_Shipping_Details WHERE Cust_ID= $user_id";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    $addr= $row['Address1'];
                                                    $phone= $row['Phone_No'];                                          
                                               ?>
                                              <div class="box-content">
                                                <h6 class="font-light"><?php echo $addr; ?></h6>
                                                <h6 class="font-light"><?php echo $phone; ?></h6>
                                            </div>
                                              <?php } 
                                              	else echo '<div class="box-content">
                                                <h6 class="font-light"> No Saved Shipping Address </h6> </div>';
                                              ?> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                  <h4>Billing Address</h4>
                                              </div>
                                              <?php
                                                $sql= "SELECT * FROM Customer_Billing_Details WHERE Cust_ID= $user_id";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    $addr= $row['Address1'];
                                                    $phone= $row['Phone_No'];                                          
                                               ?>
                                              <div class="box-content">
                                                <h6 class="font-light"><?php echo $addr; ?></h6>
                                                <h6 class="font-light"><?php echo $phone; ?></h6>
                                            </div>
                                              <?php } 
                                              	else echo '<div class="box-content">
                                                <h6 class="font-light"> No Saved Billing Address </h6> </div>';
                                              ?> 
                                        </div>
                                </div>
                                
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="order">
                    <div class="box-head mb-3">
                        <h3>My Order</h3>
                    </div>

                    <div class="table-responsive">
                        <table class="table cart-table">
                            <thead> <tr class="table-head">
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Price With Shipping</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Tracking ID</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Track Order</th>
                            </tr>
                            </thead>
                          
                            <tbody>
                            <?php
            $sql1 = "SELECT * FROM Orders WHERE Cust_ID=$user_id";
            $result = $conn->query($sql1);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) { 
                  $orderstatus=$row['Status'];
                  echo "<tr>";
                  echo "<td>" . $row['Order_ID'] . "</td>";
                  echo "<td>" . $row['Order_Date'] . "</td>";
                  echo "<td>" . $row['Price_With_Shipping'] . "</td>";
                  echo "<td>" . $row['Payment_Method'] . "</td>";
                  echo "<td>" . $row['Tracking_ID'] . "</td>";
                  if($orderstatus=="Delivered") echo "<td> <p class='success-button btn btn-sm'>" . $orderstatus . "</p></td>";
                  else if($orderstatus=="In Process") echo "<td> <p class='success-button btn btn-sm' style='background-color: #919690 !important'>" . $orderstatus . "</p></td>";
                  else if($orderstatus=="Paid") echo "<td> <p class='success-button btn btn-sm' style='background-color: #4291e5 !important'> " . $orderstatus . "</p></td>";
                  else if($orderstatus=="Shipped") echo "<td> <p class='success-button btn btn-sm' background-color=' #fce42a !important'>" . $orderstatus . "</p></td>";
                  else echo "<td> <p class='danger-button btn btn-sm'>" . $orderstatus . "</p></td>"; // for order cancellation
                  echo "<td>
                                        <a href='order-tracking?tracking-id=$row[Tracking_ID]'>
                                            <i class='far fa-eye'></i>
                                        </a>
                                    </td>";
                  echo "</tr>";
                  
 }} else {echo "No results found.";}
?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="wishlist">
                    <div class="box-head mb-3">
                        <h3>My Wishlist</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table cart-table">
                            <thead>
                                <tr class="table-head">
                                    <th scope="col">image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                  $sql_w = "SELECT *
                                  FROM Customer_Wishlist
                                  INNER JOIN Product ON Customer_Wishlist.Product_ID = Product.Product_ID
                                  WHERE Customer_Wishlist.Cust_ID = $user_id";
                                  $result_w = $conn->query($sql_w);
                                  if ($result_w->num_rows > 0) {
                                   while ($row = mysqli_fetch_assoc($result_w)) {
                                       $product_id = $row['Product_ID'];
                                       $name = $row['Name'];
                                       $cost = $row['Cost'];

                                      $img = "SELECT Img_Url FROM Images WHERE Product_ID= $product_id LIMIT 1";
                                      $img_result = $conn->query($img);
                                      $img_row = $img_result->fetch_assoc();
                                      $imageURL = 'admin/assets/images/products/'.$img_row["Img_Url"];
                                  ?>
                                <tr>
                                    <td>
                                      <a href="product?id=<?php echo $product_id;?>">
                                          <img src="<?php echo $imageURL; ?>" class=" blur-up lazyload"
                                          alt="">
                                      </a>
                                	</td>
                                    <td>
                                        <p class="m-0"><?php echo $name; ?> </p>
                                    </td>
                                    <td>
                                        <p class="fs-6 m-0">Rs. <?php echo $cost; ?></p>
                                    </td>
                                  
                                  </tr>
                              <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- SAVED ADDRESSES -->
                    <div class="tab-pane fade dashboard" id="save">
                       <!-- <div class="box-head">
                            <h3>Save Address</h3>
                            <button class="btn btn-solid-default btn-sm fw-bold ms-auto testing" data-bs-toggle="modal"
                            data-bs-target="#add_address_modal"><i class="fas fa-plus"></i>
                        Add New Address</button>
                    </div> -->

                    <div class="save-details-box">
                        <div class="row g-3">
                            <?php
                            $sql= "SELECT * FROM Customer_Shipping_Details WHERE Cust_ID= $user_id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = mysqli_fetch_assoc($result);
                              	$shipping_id= $row['Shipping_ID'];
                                $fname= $row['First_Name'];
                                $lname= $row['Last_Name'];
                                $addr= $row['Address1'];
                                $phone= $row['Phone_No']; 
                                $city= $row['City'];
                                $zip= $row['Zip'];
                            
                            ?>
                                <div class="col-xl-4 col-md-6">
                                    <div class="save-details">
                                        <div class="save-name">
                                            <h5><?php echo $fname." "; echo $lname; ?></h5>
                                            <div class="save-position">
                                                <h6>Shipping</h6>
                                            </div>
                                        </div>

                                        <div class="save-address" style="margin-top: 50px">
                                            <p class="font-light"><?php echo $addr; ?></p>
                                        </div>                                        
                                      
                                      	<div class="city">
                                            <p class="font-light city">City: <?php echo $city; ?></p>
                                        </div>
                                      	
                                      	<div class="zip">
                                            <p class="font-light zip">Zip: <?php echo $zip; ?></p>
                                        </div>
                                      
                                      	<div class="mobile">
                                            <p class="font-light mobile">Mobile No: <?php echo $phone; ?></p>
                                        </div>

                                        <div class="button">
                                            <a class="btn btn-sm ms-auto edit_address_modal " data-bs-toggle="modal" data-bs-target="#edit_address_modal" 
                                            data-address-id="<?php echo $shipping_id; ?>"
                                            data-address-address="<?php echo $addr; ?>"
                                            data-address-phone="<?php echo $phone; ?>"
                                            data-address-city="<?php echo $city; ?>"
                                            data-address-zip="<?php echo $zip; ?>"
                                            data-address-fname="<?php echo $fname; ?>"
                                            data-address-lname="<?php echo $lname; ?>"
                                            >Edit</a>
                                            <a href="delete-address.php?ship-addr=<?php echo $shipping_id?>" class="btn btn-sm">Remove</a>
                                        </div>
                                    </div>

                                </div> <?php } ?>
                          
                           <?php
                            $sql_2= "SELECT * FROM Customer_Billing_Details WHERE Cust_ID= $user_id";
                            $result_2 = $conn->query($sql_2);
                            if ($result_2->num_rows > 0) {
                                $row_2 = mysqli_fetch_assoc($result_2);
                              	$billing_id= $row_2['Billing_ID'];
                                $fname_2= $row_2['First_Name'];
                                $lname_2= $row_2['Last_Name'];
                                $addr_2= $row_2['Address1'];
                                $phone_2= $row_2['Phone_No']; 
                                $city_2= $row_2['City'];
                                $zip_2= $row_2['Zip'];
                            
                            ?>
                          <div class="col-xl-4 col-md-6">
                                    <div class="save-details">
                                        <div class="save-name">
                                            <h5><?php echo $fname_2." "; echo $lname_2; ?></h5>
                                            <div class="save-position">
                                                <h6>Billing</h6>
                                            </div>
                                        </div>

                                        <div class="save-address" style="margin-top: 50px">
                                            <p class="font-light"><?php echo $addr_2; ?></p>
                                        </div>                                        
                                      
                                      	<div class="city">
                                            <p class="font-light city">City: <?php echo $city_2; ?></p>
                                        </div>
                                      	
                                      	<div class="zip">
                                            <p class="font-light zip">Zip: <?php echo $zip_2; ?></p>
                                        </div>
                                      
                                      	<div class="mobile">
                                            <p class="font-light mobile">Mobile No: <?php echo $phone_2; ?></p>
                                        </div>

                                        <div class="button">
                                            <a class="btn btn-sm ms-auto edit_billing_address_modal " data-bs-toggle="modal" data-bs-target="#edit_billing_address_modal" 
                                            data-address-id="<?php echo $billing_id; ?>"
                                            data-address-address="<?php echo $addr_2; ?>"
                                            data-address-phone="<?php echo $phone_2; ?>"
                                            data-address-city="<?php echo $city_2; ?>"
                                            data-address-zip="<?php echo $zip_2; ?>"
                                            data-address-fname="<?php echo $fname_2; ?>"
                                            data-address-lname="<?php echo $lname_2; ?>"
                                            >Edit</a>
                                            <a href="delete-address.php?bill-addr=<?php echo $billing_id?>" class="btn btn-sm">Remove</a>
                                        </div>
                                    </div>

                                </div> <?php } ?>
                    </div>

                </div>

            </div>
<!--
            <div class="tab-pane fade dashboard" id="pay">
                <div class="box-head">
                    <h3>Card & Payment</h3>
                    <button class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal"
                    data-bs-target="#addPayment"><i class="fas fa-plus"></i>
                Add New Card</button>
            </div>

            <div class="card-details-section">
                <div class="row g-4">
                    <div class="col-lg-4 col-sm-6">
                        <div class="payment-card-detail">
                            <div class="card-details">
                                <div class="card-number">
                                    <h4>XXXX - XXXX - XXXX - 2548</h4>
                                </div>

                                <div class="valid-detail">
                                    <div class="title">
                                        <span>valid</span>
                                        <span>thru</span>
                                    </div>
                                    <div class="date">
                                        <h3>12/23</h3>
                                    </div>
                                    <div class="primary">
                                        <span class="badge bg-pill badge-light">primary</span>
                                    </div>
                                </div>

                                <div class="name-detail">
                                    <div class="name">
                                        <h5>mark jecno</h5>
                                    </div>
                                    <div class="card-img">
                                        <img src="assets/images/payment-icon/1.jpg"
                                        class="img-fluid blur-up lazyloaded" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="edit-card">
                                <a data-bs-toggle="modal" data-bs-target="#addPayment"
                                href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                delete</a>
                            </div>
                        </div>

                        <div class="edit-card-mobile">
                            <a data-bs-toggle="modal" data-bs-target="#addPayment"
                            href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                            <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                            delete</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="payment-card-detail">
                            <div class="card-details card-visa">
                                <div class="card-number">
                                    <h4>XXXX - XXXX - XXXX - 2548</h4>
                                </div>

                                <div class="valid-detail">
                                    <div class="title">
                                        <span>valid</span>
                                        <span>thru</span>
                                    </div>
                                    <div class="date">
                                        <h3>12/23</h3>
                                    </div>
                                    <div class="primary">
                                        <span class="badge bg-pill badge-light">primary</span>
                                    </div>
                                </div>

                                <div class="name-detail">
                                    <div class="name">
                                        <h5>mark jecno</h5>
                                    </div>
                                    <div class="card-img">
                                        <img src="assets/images/payment-icon/2.jpg"
                                        class="img-fluid blur-up lazyloaded" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="edit-card">
                                <a data-bs-toggle="modal" data-bs-target="#addPayment"
                                href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                delete</a>
                            </div>
                        </div>

                        <div class="edit-card-mobile">
                            <a data-bs-toggle="modal" data-bs-target="#addPayment"
                            href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                            <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                            delete</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="payment-card-detail">
                            <div class="card-details dabit-card">
                                <div class="card-number">
                                    <h4>XXXX - XXXX - XXXX - 2548</h4>
                                </div>

                                <div class="valid-detail">
                                    <div class="title">
                                        <span>valid</span>
                                        <span>thru</span>
                                    </div>
                                    <div class="date">
                                        <h3>12/23</h3>
                                    </div>
                                    <div class="primary">
                                        <span class="badge bg-pill badge-light">primary</span>
                                    </div>
                                </div>

                                <div class="name-detail">
                                    <div class="name">
                                        <h5>mark jecno</h5>
                                    </div>
                                    <div class="card-img">
                                        <img src="assets/images/payment-icon/3.jpg"
                                        class="img-fluid blur-up lazyloaded" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="edit-card">
                                <a data-bs-toggle="modal" data-bs-target="#addPayment"
                                href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                delete</a>
                            </div>
                        </div>

                        <div class="edit-card-mobile">
                            <a data-bs-toggle="modal" data-bs-target="#addPayment"
                            href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                            <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                            delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

        <div class="tab-pane fade dashboard-profile dashboard" id="profile">
            <div class="box-head">
                <h3>Profile</h3>
                <a href="javascript:void(0)" data-bs-toggle="modal"
                data-bs-target="#update_profile_modal">Edit</a>
            </div>
            <p id="message" class="text-dark font-weight-bold" style="display: none; background: #60c081; padding: 10px 0 10px 0"> </p><br>

            <ul class="dash-profile">
                <li>

                    <div class="mb-4 row align-items-center">
                        <div class="col-sm-10">
                            <?php
                            $img_dir= "admin/customer-profile/";
                            $img_url= $img_dir.$image_data;
                            ?>
                            <img src="<?php echo $img_url; ?>" width="150" style="border-radius: 150px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        </div>
                    </div>
                </li>

                <li>  
                </li>


                <li>
                    <div class="left">
                        <h6 class="font-light">Name</h6>
                    </div>
                    <?php echo $user_name; ?>
                </li>

                <li>
                    <div class="left">
                        <h6 class="font-light">Address</h6>
                    </div>
                    <?php  echo $address; ?></li>

                    <li>
                        <div class="left">
                            <h6 class="font-light">Phone No</h6>
                        </div>
                        <?php echo $phone; ?>

                    </li>
                </ul>

                <div class="box-head mt-lg-5 mt-3">
                    <h3>Login Details</h3>
                    <a href="javascript:void(0)" data-bs-toggle="modal"
                    data-bs-target="#update_login_details_modal">Edit</a>
                </div>

                <ul class="dash-profile">
                    <li>
                        <div class="left">
                            <h6 class="font-light">Email Address</h6>
                        </div>
                        <?php echo $uemail; ?>
                    </li>

                    <li class="mb-0">
                        <div class="left">
                            <h6 class="font-light">Password</h6>
                        </div>
                        Your Password is protected by encryption.
                    </li>
                </ul>
            </div>

            <div class="tab-pane fade dashboard-security dashboard" id="security">
                <div class="box-head">
                    <h3>Delete Your Account</h3>
                </div>
                <div class="security-details">
                    <h5 class="font-light mt-3">Hi <span><?php echo $user_name; ?>,</span>
                    </h5>
                    <p class="font-light mt-1">We Are Sorry To Here You Would Like To Delete Your Account.
                    </p>
                </div>

                <div class="security-details-1 mb-0">
                    <div class="page-title">
                        <h4 class="fw-bold">Note</h4>
                    </div>
                    <p class="font-light">Deleting your account will permanently remove your profile,
                        personal settings, and all other associated information. Once your account is
                    deleted, You will be logged out and will be unable to log back in.</p>

                    <p class="font-light mb-4">If you understand and agree to the above statement, and would
                    still like to delete your account, than click below</p>

                    <button class="btn btn-solid-default btn-sm fw-bold rounded" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">Delete Your Account</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<!-- user dashboard section end -->


<!-- footer start -->
<?php include('footer.php'); ?>
<!-- footer end -->

<!-- codeupdatelog start -->
<!-- Profile Modal Start -->
<div class="modal fade reset-email-modal" id="update_profile_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="profile_edit">Edit Profile</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pt-3">
                <form method="post" id="update_profile_form" >
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label font-light">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user_name; ?>">
                    </div>
                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label font-light">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
                    </div>
                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label font-light">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label font-light">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $uemail; ?>">
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label font-light">Photo</label>
                      <input name="image" id="image" class="form-control form-choose" type="file" accept = "image/*" value="<?php echo $image_data; ?>">
                  </div>
                  <div class="modal-footer pt-0">
                    <button class="btn bg-secondary rounded-1 modal-close-button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-solid-default rounded-1"  name="update_profile" id="update_profile" type="submit">Save changes</button>

                </div>
            </form>
        </div>

    </div>
</div>
</div>
<!-- Profile Edit Modal End -->
<!-- codeupdatelog end -->

<!-- Update Login Details Modal Start -->
<div class="modal fade reset-email-modal" id="update_login_details_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Change Login Details</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pt-3">
                <form  method="post" id="update_login_details_form" autocomplete="off" >
                    <div class="mb-3">
                        <label for="email" class="form-label font-light">Email address</label>
                        <input type="email" class="form-control" id="login_email" name="login_email" value="<?php echo $uemail ?>">
                    </div>
                    <div>
                        <label for="password" class="form-label font-light">Password</label>
                        <input type="password" class="form-control" id="login_password" name="login_password" placeholder="Enter your password" autocomplete="new-password">
                    </div>
                </form>
            </div>
            <div class="modal-footer pt-0">
                <button class="btn bg-secondary rounded-1 modal-close-button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-solid-default rounded-1" data-bs-dismiss="modal" id="update_login_details_btn">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Reset Password Modal End -->

<!-- Add Address Modal Start 
<div class="modal fade add-address-modal" id="add_address_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="add_address_form">
                    <div class="mb-3">
                        <label for="name" class="form-label font-light">Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label font-light">Full Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Your Address">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label font-light">Label</label>
                        <select class="form-control w-100" name="label">
                          <option value="Home" selected> Home</option>
                          <option value="Office"> Office</option>
                          <option value="Other"> Other</option>
                      </select>
                  </div>
                  <div>
                    <label for="phone" class="form-label font-light">Mobile</label>
                    <input type="text" class="form-control" name="phone" placeholder="0XXXXXXXXXXX">
                </div>                
                <div class="modal-footer pt-0 text-end d-block">
                    <button type="button" class="btn bg-secondary text-white rounded-1 modal-close-button"
                    data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-solid-default rounded-1" type="submit" id="add_address_btn">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Add Address Modal End -->

<!-- Edit Shipping Address Modal Start -->
<div class="modal fade add-address-modal" id="edit_address_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form method="post" id="edit_address_form">
                <div class="mb-3">
                    <label for="name" class="form-label font-light">First Name</label>
                    <input value="" type="text" class="form-control" id="edit_fname" name="edit_fname" >
                    <!-- used for updating address -->
                    <input value="" type="hidden" class="form-control" id="address_id" name="address_id" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label font-light">Last Name</label>
                    <input value="" type="text" class="form-control" id="edit_lname" name="edit_lname" >
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label font-light">Address</label>
                    <input value="" type="text" class="form-control" id="edit_address" name="edit_address" >
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label font-light">City</label>
                    <input value="" type="text" class="form-control" id="edit_city" name="edit_city" >
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label font-light">Zip</label>
                    <input value="" type="text" class="form-control" id="edit_zip" name="edit_zip" >
                </div>
              <div>
                <label for="phone" class="form-label font-light">Mobile</label>
                <input value="" type="text" class="form-control" id="edit_phone" name="edit_phone" >
            </div>
        </form>
    </div>
    <div class="modal-footer pt-0 text-end d-block">
        <button type="button" class="btn bg-secondary text-white rounded-1 modal-close-button"
        data-bs-dismiss="modal">Close</button>
        <button class="btn btn-solid-default rounded-1" id="edit_address_btn" type="submit">Save Address</button>
    </div>
</div>
</div>
</div>
<!-- Edit Address Modal End -->
  
  
<!-- Edit Billing Address Modal Start -->
<div class="modal fade add-address-modal" id="edit_billing_address_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form method="post" id="edit_billing_address_form">
                <div class="mb-3">
                    <label for="name" class="form-label font-light">First Name</label>
                    <input value="" type="text" class="form-control" id="edit_fname" name="edit_fname" >
                    <!-- used for updating address -->
                    <input value="" type="hidden" class="form-control" id="address_id" name="address_id" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label font-light">Last Name</label>
                    <input value="" type="text" class="form-control" id="edit_lname" name="edit_lname" >
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label font-light">Address</label>
                    <input value="" type="text" class="form-control" id="edit_address" name="edit_address" >
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label font-light">City</label>
                    <input value="" type="text" class="form-control" id="edit_city" name="edit_city" >
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label font-light">Zip</label>
                    <input value="" type="text" class="form-control" id="edit_zip" name="edit_zip" >
                </div>
              <div>
                <label for="phone" class="form-label font-light">Mobile</label>
                <input value="" type="text" class="form-control" id="edit_phone" name="edit_phone" >
            </div>
        </form>
    </div>
    <div class="modal-footer pt-0 text-end d-block">
        <button type="button" class="btn bg-secondary text-white rounded-1 modal-close-button"
        data-bs-dismiss="modal">Close</button>
        <button class="btn btn-solid-default rounded-1" id="edit_billing_address_btn" type="submit">Save Address</button>
    </div>
</div>
</div>
</div>
<!-- Edit Address Modal End -->

<!-- Add Payment Modal Start -->
<div class="modal fade payment-modal" id="addPayment">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <label for="name" class="form-label">Card Type</label>
                    <select class="form-select form-select-lg mb-4">
                        <option selected disabled>Choose Your Card</option>
                        <option value="1">Creadit Card</option>
                        <option value="2">Debit Card</option>
                        <option value="3">Debit Card and ATM</option>
                    </select>

                    <div class="mb-4">
                        <label for="card" class="form-label">Name On Card</label>
                        <input type="text" class="form-control" id="card" placeholder="Name card">
                    </div>
                    <div class="mb-4">
                        <label for="cAddress" class="form-label">Card Number</label>
                        <input type="number" class="form-control" id="cAddress" placeholder="XXXX-XXXX-XXXX-XXXX">
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-4">
                            <label for="expiry" class="form-label">Expiry Date</label>
                            <input type="date" class="form-control font-light" id="expiry">
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="number" class="form-control" id="cvv" placeholder="XX9">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer pt-0 text-end d-block">
                <button type="button" class="btn bg-secondary text-white rounded-1 modal-close-button"
                data-bs-dismiss="modal">Close</button>
                <button class="btn btn-solid-default rounded-1" data-bs-dismiss="modal">Save Card Details</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Payment Modal End -->

<!-- Comfirm Delete Modal Start -->
<div class="modal delete-account-modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pb-3 text-center mt-4">
                <h4>Are you sure you want to delete your account?</h4>
            </div>
            <div class="modal-footer d-block text-center mb-4">
                <button class="btn btn-solid-default btn-sm fw-bold rounded" data-bs-target="#doneModal"
                data-bs-toggle="modal" data-bs-dismiss="modal" onclick="window.location.href='delete-useraccount.php'">Yes Delete account</button>
            </div>
        </div>
    </div>
</div>
<div class="modal delete-account-modal fade" id="doneModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pb-3 text-center mt-4">
                <h4>Done!!! Delete Your Account</h4>
            </div>
            <div class="modal-footer d-block text-center mb-4">
                <button class="btn btn-solid-default btn-sm fw-bold rounded" data-bs-target="#exampleModalToggle"
                data-bs-toggle="modal" data-bs-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>
<!-- Comfirm Delete Modal End -->

<!-- tap to top Section Start -->
<div class="tap-to-top">
    <a href="#home">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!-- tap to top Section End -->


<!-- codeupdatelog start -->
<script type="text/javascript">
    $(document).on("click", "#update_profile", function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = new FormData(document.getElementById("update_profile_form"));
        // var formData = new FormData(this);

        // Perform the AJAX form submission
        $.ajax({
            url: "ajax.php?action=update_profile", // Replace with the correct URL of your PHP script
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response); // Log the response from the PHP script
                $('#update_profile_modal').modal('hide');
                document.getElementById('message').innerHTML = response;
                document.getElementById('message').style.display= 'block';
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Log any error messages
                document.getElementById('message').innerHTML = 'Sorry, there was an error processing your request. Please try again later.';
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).on("click", "#update_login_details_btn", function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = new FormData(document.getElementById("update_login_details_form"));
        // var formData = new FormData(this);

        // Perform the AJAX form submission
        $.ajax({
            url: "ajax.php?action=update_login_details", // Replace with the correct URL of your PHP script
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response); // Log the response from the PHP script
                $('#update_login_details_modal').modal('hide');
                document.getElementById('message').innerHTML = response;
                document.getElementById('message').style.display= 'block';
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Log any error messages
                document.getElementById('message').innerHTML = 'Sorry, there was an error processing your request. Please try again later.';
            }
        });
    });
</script>
<!--  ADD NEW ADDRESS 
<script type="text/javascript">
    $(document).on("click", "#add_address_btn", function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = new FormData(document.getElementById("add_address_form"));
        // var formData = new FormData(this);

        // Perform the AJAX form submission
        $.ajax({
            url: "ajax.php?action=add_address", // Replace with the correct URL of your PHP script
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response); // Log the response from the PHP script
                $('#add_address_modal').modal('hide');
                document.getElementById('message').innerHTML = response;
                document.getElementById('message').style.display= 'block';
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Log any error messages
                document.getElementById('message').innerHTML = 'Sorry, there was an error processing your request. Please try again later.';
            }
        });
    });
</script> -->

<!--  EDIT SHIPPING ADDRESS -->
<script type="text/javascript">
    $(document).on("click", "#edit_address_btn", function(e) {
        e.preventDefault(); // Prevent the default form submission
        var addressId = $(this).data("address-id");
        var formData = new FormData(document.getElementById("edit_address_form"));
        // Perform the AJAX form submission
        $.ajax({
            url: "ajax.php?action=edit_address&address_id=" + addressId,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response); // Log the response from the PHP script
                $('#edit_address_modal').modal('hide');
                document.getElementById('message').innerHTML = response;
                document.getElementById('message').style.display= 'block';
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Log any error messages
                document.getElementById('message').innerHTML = 'Sorry, there was an error processing your request. Please try again later.';
            }
        });
    });
</script>
  
<script>
  $(document).ready(function() {
    // Handle the "Edit" button click
    $(document).on('click', '.edit_address_modal', function() {
      // Get the address ID from the button's data attribute
      var id       = $(this).data('address-id');
      var phone    = $(this).data('address-phone');
      var city    = $(this).data('address-city');
      var zip    = $(this).data('address-zip');
      var address  = $(this).data('address-address');
      var fname    = $(this).data('address-fname');
      var lname    = $(this).data('address-lname');
      
      // Set the modal form's input values with the address details
      $('#address_id').val(id);
      $('#edit_fname').val(fname);
      $('#edit_lname').val(lname);
      $('#edit_address').val(address);
      $('#edit_phone').val(phone);
      $('#edit_city').val(city);
      $('#edit_zip').val(zip);
      $('#edit_address_id').val(id);
  });
});
</script>
  
  <!--  EDIT BILLING ADDRESS -->
<script type="text/javascript">
    $(document).on("click", "#edit_billing_address_btn", function(e) {
        e.preventDefault(); // Prevent the default form submission
        var addressId = $(this).data("address-id");
        var formData = new FormData(document.getElementById("edit_billing_address_form"));
        // Perform the AJAX form submission
        $.ajax({
            url: "ajax.php?action=edit_billing_address&address_id=" + addressId,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response); // Log the response from the PHP script
                $('#edit_billing_address_modal').modal('hide');
                document.getElementById('message').innerHTML = response;
                document.getElementById('message').style.display= 'block';
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Log any error messages
                document.getElementById('message').innerHTML = 'Sorry, there was an error processing your request. Please try again later.';
            }
        });
    });
</script>

<script>
  $(document).ready(function() {
    // Handle the "Edit" button click
    $(document).on('click', '.edit_billing_address_modal', function() {
      // Get the address ID from the button's data attribute
      var id       = $(this).data('address-id');
      var phone    = $(this).data('address-phone');
      var city    = $(this).data('address-city');
      var zip    = $(this).data('address-zip');
      var address  = $(this).data('address-address');
      var fname    = $(this).data('address-fname');
      var lname    = $(this).data('address-lname');
      
      // Set the modal form's input values with the address details
      $('#address_id').val(id);
      $('#edit_fname').val(fname);
      $('#edit_lname').val(lname);
      $('#edit_address').val(address);
      $('#edit_phone').val(phone);
      $('#edit_city').val(city);
      $('#edit_zip').val(zip);
      $('#edit_billing_address_id').val(id);
  });
});
</script>
  
<!-- codeupdatelog end -->
