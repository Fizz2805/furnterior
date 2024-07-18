<?php
$page_title = 'Wishlist';
require_once "header-new.php";
require_once "navbar.php";
require_once "admin/config.php";
if(!(isset($_SESSION['userLoggedIn']))){
	echo '<script> window.location.href= "log-in";  </script>';
 	exit(); 
}
$user_id= $_SESSION["userID"];
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
                <h3>Wishlist</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <i class="fas fa-home"></i> /
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb section end -->

<!-- Cart Section Start -->
<section class="wish-list-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table cart-table wishlist-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">availability</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT *
                        FROM Customer_Wishlist
                        INNER JOIN Product ON Customer_Wishlist.Product_ID = Product.Product_ID
                        WHERE Customer_Wishlist.Cust_ID = $user_id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                         while ($row = mysqli_fetch_assoc($result)) {
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
                                    <a href="product?id=<?php echo $product_id;?>" class="font-light"><?php echo $name ?></a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <p><?php echo $row['Stock_Status'] ?></p>
                                        </div>
                                        <div class="col">
                                            <p class="fw-bold">Rs. <?php echo $cost ?></p>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="remove-wishlist-item?id=<?php echo $product_id; ?>" class="icon">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                            <h2 class="td-color">
                                                <a href="cart" class="icon">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-bold">Rs. <?php echo $cost ?></p>
                                </td>
                                <td>
                                    <p><?php echo $row['Stock_Status'] ?></p>
                                </td>
                                <td>
                                    <a href="remove-wishlist-item?id=<?php echo $product_id; ?>" class="icon">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                     echo "<tr><td colspan='5'>No items in wishlist</td></tr>";
                 }
                 ?>
             </tbody>
              </table> 
         </div>
     </div>
 </div>
</section>
<!-- Cart Section End -->

<!-- footer start -->
<?php  include('footer.php'); ?>
<!-- footer end -->


                    <!-- tap to top Section Start -->
                    <div class="tap-to-top">
                        <a href="#home">
                            <i class="fas fa-chevron-up"></i>
                        </a>
                    </div>
                    <!-- tap to top Section End -->

                    <div class="bg-overlay"></div>
