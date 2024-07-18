<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$parts = explode("=", $url);
$order_id = $parts[1];

include "config.php";
$sql = "SELECT * FROM Orders WHERE Order_ID='$order_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cust_id=$row['Cust_ID'];
$order_date=$row['Order_Date'];
$price=$row['Price'];
$discounted=$row['Discounted_Price'];
$totalprice=$row['Price_With_Shipping'];
$shipping_address=$row['Shipping_Address'];


// Get customer details
    $cust_que = "SELECT Full_Name, Email FROM Customer WHERE Cust_ID = $cust_id";
    $result_cust = $conn->query($cust_que);
    $row_cust = $result_cust->fetch_assoc();
    $cust_email = $row_cust['Email'];
    $cust_name = $row_cust['Full_Name'];
  
       
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
    <title>Furnterior | Invoice </title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="assets/css/invoice-style.css">

</head>

<body class="theme-color2 bg-light">

    <!-- invoice start -->
    <section class="theme-invoice-3 section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 m-auto">
                    <div class="invoice-wrapper">
                        <div class="invoice-header">
                            <ul>
                                <li style="width:30%">
                                    <img src="/admin/email-templates/images/logo-transparent.png" class="img-fluid" alt="logo" >
                                </li>
                                <li style="width: 40%;">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <h4>furnterior@codemply.com</h4>
                                </li>
                            </ul>
                        </div>
                        <div class="invoice-body">
                            <div class="top-sec">
                                <div class="address-detail">
                                    <h2>invoice</h2>
                                    <div class="mt-3 row">
                                        <div class="col-lg-6 col-sm-6">
                                          	<h4 class="mb-2"><?php echo $cust_name ?></h4>
                                            <h4 class="mb-2"><?php echo $shipping_address ?></h4>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 mt-md-0 mt-2">
                                            <ul class="date-detail">
                                                <li><span>issue date :</span>
                                                    <h4><?php echo $order_date ?></h4>
                                                </li>
                                                <li><span>Order no :</span>
                                                    <h4> <?php echo $order_id ?></h4>
                                                </li>
                                                <li><span>email:</span>
                                                    <h4><?php echo $cust_email ?></h4>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive-md">
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">price</th>
                                            <th scope="col">Qty.</th>
                                            <th scope="col">total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
  									  // Get order items
                                      $items_que= "SELECT *  FROM Order_Items INNER JOIN Product ON Order_Items.Product_ID = Product.Product_ID WHERE Order_Items.Order_ID = $order_id;";
                                      $result_items = $conn->query($items_que);

                                      $count= 1;
                                      while ($row = $result_items->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<th scope="row">' . $count . '</th>';
                                        echo ' <td>' . $row['Name'] . '</td>';
                                        echo ' <td>' . intval($row['Price'] / $row['Quantity']) . '</td>';
                                        echo ' <td>' . $row['Quantity'] . '</td>';
                                        echo ' <td>' . $row['Price'] . '</td>';
                                        echo '</tr>';
                                        $count += 1;
                                    }
                                   ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-bold text-dark" colspan="2">SUB TOTAL</td>
                                            <td class="font-bold text-theme">Rs. <?php echo $price ?></td>
                                        </tr>
                                      	<tr>
                                            <td colspan="2"></td>
                                            <td class="font-bold text-dark" colspan="2">DISCOUNTED PRICE</td>
                                            <td class="font-bold text-theme">Rs. <?php echo $discounted ?></td>
                                        </tr>
                                      	<tr>
                                            <td colspan="2"></td>
                                            <td class="font-bold text-dark" colspan="2">GRAND TOTAL (with Shipping)</td>
                                            <td class="font-bold text-theme">Rs. <?php echo $totalprice ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                      	<!--
                        <div class="invoice-footer pt-0">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" class="btn btn-solid-default rounded-2" onclick="window.print();">export as PDF</a>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="#" class="btn btn-solid-dark rounded-2" onclick="window.print();">print</a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- invoice end -->

</body>
  <script>
// After the page has loaded, trigger the print dialog
window.onload = function() {
  window.print();
};
  </script>
</html>