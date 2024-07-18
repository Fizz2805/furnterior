<?php
$page_title = 'Home';
require_once "header-new.php";
require_once "navbar.php";
require_once "admin/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="manifest" href="manifest.json" />
    <link rel="icon" href="assets/images/favicon/4.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="assets/images/favicon/4.png" />
    <meta name="theme-color" content="#e22454" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Furnterior" />
    <meta name="msapplication-TileImage" content="assets/images/favicon/4.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Voxo">
    <meta name="keywords" content="Voxo">
    <meta name="author" content="Voxo">
    <link rel="icon" href="assets/images/favicon/4.png" type="image/x-icon" />
  <title>Furnterior</title>
	<style>
      @media (max-width: 991px){
        .discount-image-details-1 {
            display: block;
            height: fit-content !important;
        }
       }
     .banner-left .mb-0 a:hover{
        color: #000;
     }
      .poster-section .poster-image img{
        margin-top: 0;
      }
      .product-style-3 {
  width: 100% !important; /* Set the width to 100% */
  margin: 0 auto !important; /* Center align the element */
        
}
.product-style-3 {
  display: flex;
  justify-content: center;
  align-items: center;
}

.product-title a {
  text-align: center !important; /* Center align the text inside the link */
}
@keyframes popup {
    0% {
        transform: scale(1);
        opacity: 0.7;
    }
    50% {
        transform: scale(1.1);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: 0.7;
    }
}

#popup-button {
    animation: popup 5s infinite;
}

  </style>
</head>

<body class="theme-color4 light ltr">
  	<?php
  		$slider_sql= "SELECT * FROM Slider_Products";
  		$result= $conn->query($slider_sql);
  		$row = mysqli_fetch_assoc($result);
  		$product1_id = $row['Product1_ID'];
      	$product2_id = $row['Product2_ID'];
      	$product3_id = $row['Product3_ID'];   
  		
  		// getting Product 1 data
  		$sql = "SELECT * FROM Product WHERE Product_ID= $product1_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                	$row = mysqli_fetch_assoc($result);
                    $name1= $row['Name'];
                    $cost1= $row['Cost'];
                    $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $product1_id LIMIT 1";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $image_data = $row2['Img_Url'];
                    $img_dir= "admin/assets/images/products/";
                    $img_url1= $img_dir.$image_data;
            }
  		// getting Product 2 data
  		$sql = "SELECT * FROM Product WHERE Product_ID= $product2_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                	$row = mysqli_fetch_assoc($result);
                    $name2= $row['Name'];
                    $cost2= $row['Cost'];
                    $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $product2_id LIMIT 1";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $image_data = $row2['Img_Url'];
                    $img_dir= "admin/assets/images/products/";
                    $img_url2= $img_dir.$image_data;
            }
  		// getting Product 3 data
  		$sql = "SELECT * FROM Product WHERE Product_ID= $product3_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                	$row = mysqli_fetch_assoc($result);
                    $name3= $row['Name'];
                    $cost3= $row['Cost'];
                    $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $product3_id LIMIT 1";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $image_data = $row2['Img_Url'];
                    $img_dir= "admin/assets/images/products/";
                    $img_url3= $img_dir.$image_data;
            }
                   
  	?>
    <!-- home slider start -->
    <section class="pt-0 poster-section">
        <div class="poster-image slider-for custome-arrow classic-arrow">
            <div>
                <img src="<?php echo $img_url1; ?>" class="img-fluid blur-up lazyload" alt="">
            </div>
            <div>
                <img src="<?php echo $img_url2; ?>" class="img-fluid blur-up lazyload" alt="">
            </div>
            <div>
                <img src="<?php echo $img_url3; ?>" class="img-fluid blur-up lazyload" alt="">
            </div>
        </div>
        <div class="slider-nav image-show">
            <div>
                <div class="poster-img">
                    <img src="<?php echo $img_url1; ?>" class="img-fluid blur-up lazyload" alt="" style="width: 100px; height: 100px">
                    <div class="overlay-color">
                        <i class="fas fa-plus theme-color"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="poster-img">
                    <img src="<?php echo $img_url2; ?>" class="img-fluid blur-up lazyload" alt="" style="width: 100px; height: 100px">
                    <div class="overlay-color">
                        <i class="fas fa-plus theme-color"></i>
                    </div>
                </div>

            </div>
            <div>
                <div class="poster-img">
                    <img src="<?php echo $img_url3; ?>" class="img-fluid blur-up lazyload" alt="" style="width: 100px; height: 100px">
                    <div class="overlay-color">
                        <i class="fas fa-plus theme-color"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="left-side-contain">
            <div class="banner-left">
              <h1>Transform your home</h1>              
              <p class="mb-0"><span class="poster-details">Design your room using our</span> <span class="theme-color"><a href="interior-designing">INTERIOR DESIGNING</a></span><br> <span class="poster-details">View Products in your own Space using</span> <span class="theme-color"><a href="product-category-ar">AUGMENTED REALITY</a></span></p>
            </div>
        </div>

        <!--<div class="right-side-contain">
            <div class="social-image">
                <h6>Facebook</h6>
            </div>

            <div class="social-image">
                <h6>Instagram</h6>
            </div>

            <div class="social-image">
                <h6>Twitter</h6>
            </div>
        </div>-->
    </section>
    <!-- home slider end -->

    <!-- banner image start -->
    <section class="banner-section pt-4">
        <div>
            <div class="container-fluid">
                <div class="row g-1">
                    <!-- <div class="col-lg-2 col-md-6" style="background-color: #e87316;">
                        <div class="banner-image">                        
                                <img src="assets/images/banner/category-banner.png" class="w-100 blur-up lazyload"
                                    alt="">                                                        
                        </div>
                    </div> -->
                    <div class="col-lg-2 col-md-6">
                        <div class="banner-image">
                            <a href="product-category-sofas">
                                <img src="assets/images/banner/sofa-banner.jpg" class="w-100 blur-up lazyload"
                                    alt="">
                            </a>
                            <div class="banner-details">
                                <span class="heart-button" style="color: #fff">1</span>                                
                                <div class="banner-price">
                                    <h2>Sofas</h2>
                                </div>
                            </div>

                            <a href="product-category-sofas" class="banner-shop text-center">
                                <div>
                                    <h5>DISCOVER NOW</h5>
                                    <p class="mb-0 mt-2">Exclusive Collection</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="banner-image">
                            <a href="product-category-chairs">
                                <img src="assets/images/banner/chair-banner.jpg" class="w-100 blur-up lazyload"
                                    alt="">
                            </a>
                            <div class="banner-details">
                                <span class="heart-button" style="color: #fff">2</span>       
                                <div class="banner-price">
                                    <h2>Chairs</h2>
                                </div>
                            </div>

                            <a href="product-category-chairs" class="banner-shop text-center">
                                <div>
                                    <h5>DISCOVER NOW</h5>
                                    <p class="mb-0 mt-2">Exclusive Collection</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="banner-image">
                            <a href="product-category-beds">
                                <img src="assets/images/banner/bed-banner.jpg" class="w-100 blur-up lazyload"
                                    alt="">
                            </a>
                            <div class="banner-details">
                                <span class="heart-button" style="color: #fff">3</span>  
                                <div class="banner-price">
                                    <h2>Beds</h2>
                                </div>
                            </div>

                            <a href="product-category-beds" class="banner-shop text-center">
                                <div>
                                    <h5>DISCOVER NOW</h5>
                                    <p class="mb-0 mt-2">Exclusive Collection</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="banner-image">
                            <a href="product-category-tables">
                                <img src="assets/images/banner/table-banner.jpg" class="w-100 blur-up lazyload"
                                    alt="">
                            </a>
                            <div class="banner-details">
                                <span class="heart-button" style="color: #fff">4</span>    
                                <div class="banner-price">
                                    <h2>Tables</h2>
                                </div>
                            </div>

                            <a href="product-category-tables" class="banner-shop text-center">
                                <div>
                                    <h5>DISCOVER NOW</h5>
                                    <p class="mb-0 mt-2">Exclusive Collection</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="banner-image">
                            <a href="product-category-ar">
                                <img src="assets/images/banner/360-banner.jpg" class="w-100 blur-up lazyload"
                                    alt="">
                            </a>
                            <div class="banner-details">
                                <span class="heart-button" style="color: #fff">5</span>  
                                <div class="banner-price">
                                    <h2>3D View</h2>
                                </div>
                            </div>

                            <a href="product-category-ar" class="banner-shop text-center">
                                <div>
                                    <h5>DISCOVER NOW</h5>
                                    <p class="mb-0 mt-2">Exclusive Collection</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="banner-image">
                            <a href="product-category-sets">
                                <img src="assets/images/banner/sets-banner.jpg" class="w-100 blur-up lazyload"
                                    alt="">
                            </a>
                            <div class="banner-details">
                                <span class="heart-button" style="color: #fff">6</span>                                
                                <div class="banner-price">
                                    <h2>Sets</h2>
                                </div>
                            </div>

                            <a href="product-category-sets" class="banner-shop text-center">
                                <div>
                                    <h5>DISCOVER NOW</h5>
                                    <p class="mb-0 mt-2">Exclusive Collection</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- banner image end -->

    <!-- New Arrival Section Start -->
    <section class="ratio_asos overflow-hidden">
        <div class="container p-sm-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="title-3 text-center" style="margin-bottom: 10px">
                        <h2>New Arrival</h2>
                        <h5 class="theme-color">All Collection</h5>
                    </div>
                </div>
            </div>
            <div
            class="row g-sm-4 g-3 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 gx-sm-4 gx-3 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section" id="product-list">
            
            <?php
            $sql = "SELECT * FROM Product ORDER BY Product_ID DESC LIMIT 10 ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) { 
                    $id = $row['Product_ID'];
                    $name= $row['Name'];
                    $cost= $row['Cost'];
                  	$stock=$row['Stock_Status'];
                  	$featured=$row['Is_Featured'];
                  	$weight=$row['Weight'];
                  	$dim=$row['Dimensions'];
                  	$cat=$row['Category'];
                  	switch($cat){
                     	case 1: $cat="Sofa"; break;
                        case 2: $cat="Chair"; break;
                        case 3: $cat="Bed"; break;
                        case 4: $cat="Table"; break;
                        case 5: $cat="Augmented Reality"; break;
                    }
                    // getting image from Images table for the current product
                    $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $id LIMIT 1";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $image_data = $row2['Img_Url'];
                    $img_dir= "admin/assets/images/products/";
                    $img_url= $img_dir.$image_data;

                    ?>
                 <div>
                    <div class="product-box">
                        <div class="img-wrapper">
                            <a href="product?id=<?php echo $id; ?>">

                                <img src='<?php echo $img_url; ?>'
                                class="w-100 bg-img blur-up lazyload" alt="">
                            </a>
                            <div class="circle-shape"></div>
                            <span class="background-text">Furnterior</span>
                            <div class="label-block">
                             <?php 
                             if($stock=="Out of Stock")
                              echo '<span class="label label-black">Out of Stock</span>';
                  			  if($featured=='Y')
                                echo '<span class="label label-theme"><i data-feather="star"></i></span>';
                          	 ?>
                      </div>
                      <div class="cart-wrap">
                        <ul>
                            <?php if ($stock!="Out of Stock"): ?>
                                <li>
                                    <a href="javascript:void(0)" class="addtocart-btn"
                                    data-bs-toggle="modal" data-bs-target="#addtocart-id-<?php echo $id; ?>" data-product-id="<?php echo $id; ?>" >
                                    <i data-feather="shopping-bag"></i>
                                </a>
                            </li>


                        <?php endif ?>

                        <li>
                            <a href="javascript:void(0)" class="quick-view-btn" data-bs-toggle="modal"
                            data-bs-target="#quick-view-id-<?php echo $id; ?>" data-product-id="<?php echo $id; ?>">
                            <i data-feather="eye"></i>
                        </a>
                    </li>

                    <li>
                        <a  class="wishlist" data-product-id="<?php echo $id; ?>">
                            <i data-feather="heart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-style-3 product-style-chair">
            <div class="product-title d-block mb-0">
                <!--<p class="font-light mb-sm-2 mb-0">Fully Comfortale</p>-->
                <a href="product?id=<?php echo $id; ?>" class="font-default">
                    <h5 class="title" style="margin-bottom: 10px"><?php echo $name?></h5>
                    <h3 class="theme-color" style="text-align: center">Rs. <?php echo $cost?></h3>
                </a>
            </div>                    
        </div>
    </div>
</div>
<!-- Quick view modal start -->

<div class="modal fade quick-view-modal" id="quick-view-id-<?php echo $id; ?>">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="quick-view-image">
                            <div class="quick-view-slider">
                                <?php 
                                $sql3 = "SELECT Img_Url FROM Images WHERE Product_ID = $id";
                                $result3 = mysqli_query($conn, $sql3);
                                if ($result3->num_rows > 0)
                                {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        $image_data = $row3['Img_Url'];
                                        $img_dir= "admin/assets/images/products/";
                                        $img_url= $img_dir.$image_data;


                                        ?>
                                        <div>
                                            <img src="<?php echo $img_url; ?>"
                                            class="img-fluid blur-up lazyload" alt="<?php echo $id; ?>">
                                        </div>
                                    <?php }} ?>                                            
                                </div>
                                <div class="quick-nav">
                                    <?php 
                                    $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $id";
                                    $result2 = mysqli_query($conn, $sql2);
                                    if ($result2->num_rows > 0)
                                    {                                              	
                                        while ($row2 = mysqli_fetch_assoc($result2)) {

                                            $image_data = $row2['Img_Url'];
                                            $img_dir= "admin/assets/images/products/";
                                            $img_url= $img_dir.$image_data;


                                            ?>
                                            <div>
                                                <img src="<?php echo $img_url; ?>"
                                                class="img-fluid blur-up lazyload" alt="<?php echo $id; ?>">
                                            </div>
                                        <?php }} ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-right">
                                    <h2 class="mb-2"><?php echo $name?></h2>                                    
                                    <li class="font-light"><?php echo $stock; ?></li>                                   
                                    <div class="price mt-3">
                                        <h3>Rs. <?php echo $cost?></h3>
                                    </div>

                                    <div class="product-details">
                                        <h4>Product details</h4>
                                        <ul>
                                            <li>
                                                <span class="font-light">Category :</span> <?php echo $cat; ?>
                                            </li>
                                            <li>
                                                <span class="font-light">Weight :</span> <?php echo $weight; ?>
                                            </li>
                                            <li>
                                                <span class="font-light">Dimensions :</span> <?php echo $dim; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-btns">
                                      	<?php if($stock!="Out of Stock") ?>
                                        <button type="button" class="addtocart-btn btn btn-solid-default btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#addtocart-id-<?php echo $id; ?>" data-product-id="<?php echo $id; ?>" >Add to cart</button>
                                        <button type="button" class="btn btn-solid-default btn-sm" onclick="window.location.href='product?id=<?php echo $id; ?>'">View details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick view modal end -->

        <!-- Cart Successful Start -->
        <div class="modal fade cart-modal" id="addtocart-id-<?php echo $id; ?>" tabindex="-1" role="dialog" aria-label="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="modal-contain">
                            <div>
                                <div class="modal-messages">
                                    <i class="fas fa-check"></i> Furniture item <b> <?php echo $name?></b> has been successfully added to
                                    your cart.
                                </div>
                                <div class="modal-product">
                                    <div class="modal-contain-img">
                                        <img src="<?php echo $img_url; ?>" class="img-fluid blur-up lazyload"
                                        alt="<?php echo $name; ?>">
                                    </div>
                                    <div class="modal-contain-details">
                                        <h4><?php echo $name?></h4>
                                        <!-- <p class="font-light my-2">Black, Qty : 1</p> -->
                                        <p class="font-light my-2">Qty : 1</p>
                                        <div class="product-total">
                                            <h5>TOTAL : <span>Rs. <?php echo $cost?></span></h5>
                                        </div>
                                        <div class="shop-cart-button mt-3">
                                            <a href="/"class="btn default-light-theme conti-button default-theme default-theme-2 rounded">CONTINUE
                                        SHOPPING</a>
                                        <a href="cart" class="btn default-light-theme conti-button default-theme default-theme-2 rounded">VIEW
                                    CART</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Cart Successful End -->
<?php
}     

} else {
    echo "No results found.";
}


$conn->close();
?>
<!-- Prodcut setion -->
</div>
</div>
</div>
</div>
</div>
</section>
    <!-- New Arrival Section End -->

    <!-- Deal Month Section Start -->
    <section class="deal-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="discount-image-details-1">
                        <div class="discount-images">
                            <div class="theme-circle"></div>
                            <img src="assets/images/banner/banner-product.png"
                                class="img-fluid shoes-images blur-up lazyload" alt="">
                        </div>

                        <div class="discunt-details mt-xl-0 mt-4">
                            <div>
                                <div class="heart-button">
                                    <i data-feather="heart"></i>
                                </div>

                                <div class="discount-shop">
                                    <h2 class="text-spacing">Design Now</h2>
                                    <h6>VIEW HOW YOUR ROOM LOOKS</h6>
                                </div>

                                
                                  <h3 class="my-2 deal-text">DESIGN YOUR <br><span class="theme-color">  ROOM INTERIOR</span>
                                  <h5 class="mt-3">Upload a picture of your room and start placing Furnterior products.<br> Get an idea of look & feel of your room.</h5>
                                </h3>
                                <!--<div class="timer-style-2 my-2 justify-content-center d-flex">
                                    <ul>
                                        <li>
                                            <div class="counter">
                                                <div>
                                                    <h2 id="days1" class="theme-color"></h2>Days
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div>
                                                    <h2 id="hours1" class="theme-color"></h2>Hour
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div>
                                                    <h2 id="minutes1" class="theme-color"></h2>Min
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div>
                                                    <h2 id="seconds1" class="theme-color"></h2>Sec
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>-->
                                <button id="popup-button" onclick="location.href = 'interior-designing';" type="button"
                                    class="btn default-light-theme default-theme mt-2" style="height: 60px; font-size:large;">Start Designing Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Deal Day Section end -->

    <!-- Product Slider Section Start -->
    <section class="product-slider overflow-hidden">
        <div>
            <div class="container">



                <div class="row g-3">

                
                    <div class="col-lg-6">
                        <div class="title-3 pb-4 title-border">
                            <h2>Featured Products</h2>
                            <h5 class="theme-color">All Collection</h5>
                        </div>

                        <div class="product-slider round-arrow">
                            <div>
                                <div class="row g-3">
                                <?php
                                     include('admin/config.php');
                                     $sql = "SELECT * FROM Product WHERE Is_Featured = 'Y' LIMIT 4";
                                     $result = $conn->query($sql);
                                     if ($result->num_rows > 0) {
                                         while ($row = mysqli_fetch_assoc($result)) 
                                 { 
                                             $id = $row['Product_ID'];
                                             $name= $row['Name'];
                                             $cost= $row['Cost'];
                                           	 $cat= $row['Category'];
                                             $stock=$row['Stock_Status'];
                                             $weight=$row['Weight'];
                                             $dim=$row['Dimensions'];
                                            
                                             switch($cat)
                                             {
                                               case 1: $cat="Sofa"; break;
                                               case 2: $cat="Chair"; break;
                                               case 3: $cat="Bed"; break;
                                               case 4: $cat="Table"; break;
                                               case 5: $cat="Augmented Reality"; break;
                                            }
                         
                                             // getting image from Images table for the current product
                                           $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $id LIMIT 1";
                                           $result2 = mysqli_query($conn, $sql2);
                                           $row2 = mysqli_fetch_assoc($result2);
                                           $image_data = $row2['Img_Url'];
                                           $img_dir= "admin/assets/images/products/";
                                           $img_url= $img_dir.$image_data;
                         
                                           ?>
                                                              <div class="col-lg-12 col-md-6 col-12">
                                    

                                        <div class="product-image">

                                        <a href="product?id=<?php echo $id; ?>">

                                    <img src='<?php echo $img_url; ?>'
                                    class="blur-up lazyload" alt="">
                                </a>
                                
                                            <div class="product-details">
                                                <!-- <a href="product-left-sidebar.html"> -->
                                                <a href="product?id=<?php echo $id; ?>" class="font-default">
                                                    <h6 class="font-light"><?php echo $cat; ?></h6>
                                                    <h3 class="title" style="margin-bottom: 10px"><?php echo $name?></h3>

                                                    
                                                   <!--  <h4 class="font-light mt-1"><del>Rs. 49.00</del> <span 
                                                            class="theme-color">Rs. 35.50</span>
                                                    </h4> -->
                                                    <h4 class="theme-color">Rs. <?php echo $cost?></h4>
                                                   
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                }     
                            
                            } 
                            else 
                            {
                                echo "No results found.";
                            }
                            
                            
                            ?>
                                   <!-- -->
                                </div>
                            </div>
                        </div>

                    </div>



<!--featured products-->
                    <div class="col-lg-6" >
                        <div class="title-3 pb-4 " style="margin-top: 60px !important">
                       
                        </div>

                        <div class="product-slider round-arrow">
                            <div>
                                <div class="row g-3">
                                <?php
                                     $sql = "SELECT * FROM Product WHERE Is_Featured = 'Y' ORDER BY Product_ID DESC LIMIT 4";
                                    //  $sql = "SELECT * FROM your_table ORDER BY id DESC LIMIT 4";
                                     $result = $conn->query($sql);
                                     if ($result->num_rows > 0) {
                                         while ($row = mysqli_fetch_assoc($result)) 
                                 { 
                                             $id = $row['Product_ID'];
                                             $name= $row['Name'];
                                             $cost= $row['Cost'];
                                           	 $cat= $row['Category'];
                                             $stock=$row['Stock_Status'];
                                             $weight=$row['Weight'];
                                             $dim=$row['Dimensions'];
                                            
                                             switch($cat)
                                             {
                                               case 1: $cat="Sofa"; break;
                                               case 2: $cat="Chair"; break;
                                               case 3: $cat="Bed"; break;
                                               case 4: $cat="Table"; break;
                                               case 5: $cat="Augmented Reality"; break;
                                            }
                         
                                             // getting image from Images table for the current product
                                           $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $id LIMIT 1";
                                           $result2 = mysqli_query($conn, $sql2);
                                           $row2 = mysqli_fetch_assoc($result2);
                                           $image_data = $row2['Img_Url'];
                                           $img_dir= "admin/assets/images/products/";
                                           $img_url= $img_dir.$image_data;
                         
                                           ?>
                                                              <div class="col-lg-12 col-md-6 col-12">
                                    

                                        <div class="product-image">

                                        <a href="product?id=<?php echo $id; ?>">

                                    <img src='<?php echo $img_url; ?>'
                                    class="blur-up lazyload" alt="">
                                </a>
                                
                                            <div class="product-details">
                                                <!-- <a href="product-left-sidebar.html"> -->
                                                <a href="product?id=<?php echo $id; ?>" class="font-default">
                                                    <h6 class="font-light"><?php echo $cat; ?></h6>
                                                    <h3 class="title" style="margin-bottom: 10px"><?php echo $name?></h3>

                                                    
                                                   <!--  <h4 class="font-light mt-1"><del>Rs. 49.00</del> <span 
                                                            class="theme-color">Rs. 35.50</span>
                                                    </h4> -->
                                                    <h4 class="theme-color">Rs. <?php echo $cost?></h4>
                                                   </a>
                                            </div>
                                        </div>
                                        
                                    </div>



                                    
                                    <?php
                                }     
                            
                            } 
                            else 
                            {
                                echo "No results found.";
                            }
                            
                            ?>
                                   <!-- -->
                                </div>
                            </div>
                        </div>




                    </div>
                </div> 

            </div>

           
        </div>
    </section>
    <!-- Product Slider Section End -->

   
    <!-- tab banner section start -->
    <section class="tab-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title-3 text-center">
                        <h2>All Collection</h2>
                        <h5 class="theme-color">Categories</h5>
                    </div>
                    <div class="tab-wrap">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <button class="nav-link" id="sofa-tab" data-bs-toggle="tab" data-bs-target="#Sofa"
                                    type="button">Sofas</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="chair-tab" data-bs-toggle="tab" data-bs-target="#Chair"
                                    type="button">Chairs</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="table-tab" data-bs-toggle="tab"
                                    data-bs-target="#Table" type="button">Tables</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="bed-tab" data-bs-toggle="tab"
                                    data-bs-target="#Bed" type="button">Beds</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link active" id="ar-tab" data-bs-toggle="tab" data-bs-target="#AR"
                                    type="button">AR</button>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="myTabContent">
                            <!-- sofa -->
                            <div class="tab-pane fade" id="Sofa" role="tabpanel">
                              <?php
                                include "admin/config.php";
                              	$sql_sofa = "SELECT * FROM Product WHERE Category=1 LIMIT 7";
                                $result_s = mysqli_query($conn,$sql_sofa);
                              	$sofa_items = array();
                                if ($result->num_rows > 0) {
                                    while ($row_s = mysqli_fetch_assoc($result_s)) { 
                                        $id = $row_s['Product_ID'];
                                        $name= $row_s['Name'];
                                        $cost= $row_s['Cost'];
                                      	$img = "SELECT Img_Url FROM Images WHERE Product_ID= $id LIMIT 1";
                                        $img_result = $conn->query($img);
                                        $img_row = $img_result->fetch_assoc();
                                        $imageURL = 'admin/assets/images/products/'.$img_row["Img_Url"]; 
                                                                
                                      // add the product data to the array
                                      $sofas[] = array(
                                         'id' => $id,
                                         'image' => $imageURL,
                                         'name' => $name,
                                         'cost' => $cost
                                      );
                                    }
                                } 
                                 
                              ?>
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                              <?php
                                              	// Get the first product from the array and remove it
                                                $firstProduct = array_shift($sofas);
                                                $id = $firstProduct['id'];
                                                $image = $firstProduct['image'];
                                                $name = $firstProduct['name'];
                                                $cost = $firstProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                              	<?php
                                              	// Get the first product from the array and remove it
                                                $firstProduct = array_shift($sofas);
                                                $id = $firstProduct['id'];
                                                $image = $firstProduct['image'];
                                                $name = $firstProduct['name'];
                                                $cost = $firstProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                              	<?php
                                              	// Get the first product from the array and remove it
                                                $firstProduct = array_shift($sofas);
                                                $id = $firstProduct['id'];
                                                $image = $firstProduct['image'];
                                                $name = $firstProduct['name'];
                                                $cost = $firstProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      	<?php
                                              	// Get the first product from the array and remove it
                                                $firstProduct = array_shift($sofas);
                                                $id = $firstProduct['id'];
                                                $image = $firstProduct['image'];
                                                $name = $firstProduct['name'];
                                                $cost = $firstProduct['cost'];
                                              ?>
                                        <div class="col-lg-4 order-lg-0 order-1">
                                            <div class="product-banner product-banner-circle">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="offer-end offer-end-demo4">
                                                            <h3>SOFAS </h3>
                                                            <h6>Our Products</h6>
                                                        </div>
                                                    </div>
                                                    <div class="product-details text-center">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="javascript:void(0)" class="font-default" tabindex="-1">
                                                            <h5 class="main-title"><?php echo $name ?></h5>
                                                        </a>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!-- bonus -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $firstProduct = array_shift($sofas);
                                                $id = $firstProduct['id'];
                                                $image = $firstProduct['image'];
                                                $name = $firstProduct['name'];
                                                $cost = $firstProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $firstProduct = array_shift($sofas);
                                                $id = $firstProduct['id'];
                                                $image = $firstProduct['image'];
                                                $name = $firstProduct['name'];
                                                $cost = $firstProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $firstProduct = array_shift($sofas);
                                                $id = $firstProduct['id'];
                                                $image = $firstProduct['image'];
                                                $name = $firstProduct['name'];
                                                $cost = $firstProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CHAIR SECTION -->
                            <div class="tab-pane fade" id="Chair" role="tabpanel">
                                 <?php
                                include "admin/config.php";
                              	$sql_chair = "SELECT * FROM Product WHERE Category=2 LIMIT 7";
                                $result_c = mysqli_query($conn,$sql_chair);
                              	$chair_items = array();
                                if ($result->num_rows > 0) {
                                    while ($row_ch = mysqli_fetch_assoc($result_c)) { 
                                        $id = $row_ch['Product_ID'];
                                        $name= $row_ch['Name'];
                                        $cost= $row_ch['Cost'];
                                      	$img = "SELECT Img_Url FROM Images WHERE Product_ID= $id LIMIT 1";
                                        $img_result = $conn->query($img);
                                        $img_row = $img_result->fetch_assoc();
                                        $imageURL = 'admin/assets/images/products/'.$img_row["Img_Url"]; 
                                                                
                                      // add the product data to the array
                                      $chair[] = array(
                                         'id' => $id,
                                         'image' => $imageURL,
                                         'name' => $name,
                                         'cost' => $cost
                                      );
                                    }
                                } 
                                 
                              ?>
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                            <?php
                                              	// Get the first product from the array and remove it
                                                $secondProduct = array_shift($chair);
                                                $id = $secondProduct ['id'];
                                                $image = $secondProduct ['image'];
                                                $name = $secondProduct ['name'];
                                                $cost = $secondProduct ['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $secondProduct  = array_shift($chair);
                                                $id = $secondProduct ['id'];
                                                $image = $secondProduct ['image'];
                                                $name = $secondProduct ['name'];
                                                $cost = $secondProduct ['cost'];
                                              ?>

                                                <div class="product-box product-box1">

                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $secondProduct  = array_shift($chair);
                                                $id = $secondProduct ['id'];
                                                $image = $secondProduct ['image'];
                                                $name = $secondProduct ['name'];
                                                $cost = $secondProduct ['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                              	// Get the first product from the array and remove it
                                                $secondProduct  = array_shift($chair);
                                                $id = $secondProduct ['id'];
                                                $image = $secondProduct ['image'];
                                                $name = $secondProduct ['name'];
                                                $cost = $secondProduct ['cost'];
                                              ?>

                                        <div class="col-lg-4 order-lg-0 order-1">
                                            <div class="product-banner product-banner-circle">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                       
                                                        <div class="circle-shape">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="product-details text-center">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- conus -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                            <?php
                                              	// Get the first product from the array and remove it
                                                $secondProduct  = array_shift($chair);
                                                $id = $secondProduct ['id'];
                                                $image = $secondProduct ['image'];
                                                $name = $secondProduct ['name'];
                                                $cost = $secondProduct ['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                      
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $secondProduct  = array_shift($chair);
                                                $id = $secondProduct ['id'];
                                                $image = $secondProduct ['image'];
                                                $name = $secondProduct ['name'];
                                                $cost = $secondProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                       
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $secondProduct = array_shift($chair);
                                                $id = $secondProduct['id'];
                                                $image = $secondProduct['image'];
                                                $name = $secondProduct['name'];
                                                $cost = $secondProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- table -->
                            <div class="tab-pane fade" id="Table" role="tabpanel">
                                <?php
                                include "admin/config.php";
                              	$sql_table = "SELECT * FROM Product WHERE Category=4 LIMIT 7";
                                $result_t = mysqli_query($conn,$sql_table);
                              	$table_items = array();
                                if ($result->num_rows > 0) {
                                    while ($row_t = mysqli_fetch_assoc($result_t)) { 
                                        $id = $row_t['Product_ID'];
                                        $name= $row_t['Name'];
                                        $cost= $row_t['Cost'];
                                      	$img = "SELECT Img_Url FROM Images WHERE Product_ID= $id LIMIT 1";
                                        $img_result = $conn->query($img);
                                        $img_row = $img_result->fetch_assoc();
                                        $imageURL = 'admin/assets/images/products/'.$img_row["Img_Url"]; 
                                                                
                                      // add the product data to the array
                                      $table[] = array(
                                         'id' => $id,
                                         'image' => $imageURL,
                                         'name' => $name,
                                         'cost' => $cost
                                      );
                                    }
                                } 
                                 
                              ?>
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                            <?php
                                              	// Get the first product from the array and remove it
                                                $thirdProduct = array_shift($table);
                                                $id = $thirdProduct ['id'];
                                                $image = $thirdProduct ['image'];
                                                $name = $thirdProduct ['name'];
                                                $cost = $thirdProduct ['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $thirdProduct  = array_shift($table);
                                                $id = $thirdProduct ['id'];
                                                $image = $thirdProduct ['image'];
                                                $name = $thirdProduct ['name'];
                                                $cost = $thirdProduct ['cost'];
                                              ?>

                                                <div class="product-box product-box1">

                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $thirdProduct  = array_shift($table);
                                                $id = $thirdProduct ['id'];
                                                $image = $thirdProduct ['image'];
                                                $name = $thirdProduct ['name'];
                                                $cost = $thirdProduct ['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                              	// Get the first product from the array and remove it
                                                $thirdProduct  = array_shift($table);
                                                $id = $thirdProduct ['id'];
                                                $image = $thirdProduct ['image'];
                                                $name = $thirdProduct ['name'];
                                                $cost = $thirdProduct ['cost'];
                                              ?>

                                        <div class="col-lg-4 order-lg-0 order-1">
                                            <div class="product-banner product-banner-circle">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                       
                                                        <div class="circle-shape">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="product-details text-center">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- conus -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                            <?php
                                              	// Get the first product from the array and remove it
                                                $thirdProduct  = array_shift($table);
                                                $id = $thirdProduct ['id'];
                                                $image = $thirdProduct ['image'];
                                                $name = $thirdProduct ['name'];
                                                $cost = $thirdProduct ['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                      
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $thirdProduct  = array_shift($table);
                                                $id = $thirdProduct ['id'];
                                                $image = $thirdProduct ['image'];
                                                $name = $thirdProduct ['name'];
                                                $cost = $thirdProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                       
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $thirdProduct = array_shift($table);
                                                $id = $thirdProduct['id'];
                                                $image = $thirdProduct['image'];
                                                $name = $thirdProduct['name'];
                                                $cost = $thirdProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- BED SECTION START -->


                            <div class="tab-pane fade" id="Bed" role="tabpanel">
                                 <?php
                                include "admin/config.php";
                              	$sql_bed = "SELECT * FROM Product WHERE Category=3 LIMIT 7";
                                $result_b = mysqli_query($conn,$sql_bed);
                              	$bed_items = array();
                                if ($result->num_rows > 0) {
                                    while ($row_b = mysqli_fetch_assoc($result_b)) { 
                                        $id = $row_b['Product_ID'];
                                        $name= $row_b['Name'];
                                        $cost= $row_b['Cost'];
                                      	$img = "SELECT Img_Url FROM Images WHERE Product_ID= $id LIMIT 1";
                                        $img_result = $conn->query($img);
                                        $img_row = $img_result->fetch_assoc();
                                        $imageURL = 'admin/assets/images/products/'.$img_row["Img_Url"]; 
                                                                
                                      // add the product data to the array
                                      $bed[] = array(
                                         'id' => $id,
                                         'image' => $imageURL,
                                         'name' => $name,
                                         'cost' => $cost
                                      );
                                    }
                                } 
                                 
                              ?>
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                            <?php
                                              	// Get the first product from the array and remove it
                                                $fourthProduct = array_shift($bed);
                                                $id = $fourthProduct ['id'];
                                                $image = $fourthProduct ['image'];
                                                $name = $fourthProduct ['name'];
                                                $cost = $fourthProduct ['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $fourthProduct  = array_shift($bed);
                                                $id = $fourthProduct ['id'];
                                                $image = $fourthProduct ['image'];
                                                $name = $fourthProduct ['name'];
                                                $cost = $fourthProduct ['cost'];
                                              ?>

                                                <div class="product-box product-box1">

                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $fourthProduct  = array_shift($bed);
                                                $id = $fourthProduct ['id'];
                                                $image = $fourthProduct ['image'];
                                                $name = $fourthProduct ['name'];
                                                $cost = $fourthProduct ['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                              	// Get the first product from the array and remove it
                                                $fourthProduct  = array_shift($bed);
                                                $id = $fourthProduct ['id'];
                                                $image = $fourthProduct ['image'];
                                                $name = $fourthProduct ['name'];
                                                $cost = $fourthProduct ['cost'];
                                              ?>

                                        <div class="col-lg-4 order-lg-0 order-1">
                                            <div class="product-banner product-banner-circle">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                       
                                                        <div class="circle-shape">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="product-details text-center">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- conus -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                            <?php
                                              	// Get the first product from the array and remove it
                                                $fourthProduct  = array_shift($bed);
                                                $id = $fourthProduct ['id'];
                                                $image = $fourthProduct ['image'];
                                                $name = $fourthProduct ['name'];
                                                $cost = $fourthProduct ['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                      
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $fourthProduct  = array_shift($bed);
                                                $id = $fourthProduct ['id'];
                                                $image = $fourthProduct ['image'];
                                                $name = $fourthProduct ['name'];
                                                $cost = $fourthProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                       
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $fourthProduct = array_shift($bed);
                                                $id = $fourthProduct['id'];
                                                $image = $fourthProduct['image'];
                                                $name = $fourthProduct['name'];
                                                $cost = $fourthProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                    <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                    <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- BED END -->

							<!-- AR section -->
                              
                               <div class="tab-pane fade" id="AR" role="tabpanel">
                              <?php
                                include "admin/config.php";
                              	$sql_AR = "SELECT * FROM Product WHERE Category=5 LIMIT 7";
                                $result_AR = mysqli_query($conn,$sql_AR);
                              	$AR_items = array();
                                if ($result->num_rows > 0) {
                                    while ($row_AR = mysqli_fetch_assoc($result_AR)) { 
                                        $id = $row_AR ['Product_ID'];
                                        $name= $row_AR ['Name'];
                                        $cost= $row_AR ['Cost'];
                                      	$img = "SELECT Img_Url FROM Images WHERE Product_ID= $id LIMIT 1";
                                        $img_result = $conn->query($img);
                                        $img_row = $img_result->fetch_assoc();
                                        $imageURL = 'admin/assets/images/products/'.$img_row["Img_Url"]; 
                                                                
                                      // add the product data to the array
                                      $argum[] = array(
                                         'id' => $id,
                                         'image' => $imageURL,
                                         'name' => $name,
                                         'cost' => $cost
                                      );
                                    }
                                } 
                                 
                              ?>
                                <div class="offer-wrap product-style-1">
                                    <div class="row g-xl-4 g-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                              <?php
                                              	// Get the first product from the array and remove it
                                                $fifthProduct = array_shift($argum);
                                                $id = $fifthProduct['id'];
                                                $image = $fifthProduct['image'];
                                                $name = $fifthProduct['name'];
                                                $cost = $fifthProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                              	<?php
                                              	// Get the first product from the array and remove it
                                                $fifthProduct = array_shift($argum);
                                                $id = $fifthProduct['id'];
                                                $image = $fifthProduct['image'];
                                                $name = $fifthProduct['name'];
                                                $cost = $fifthProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                              	<?php
                                              	// Get the first product from the array and remove it
                                             // $firstProduct = array_shift($sofas);
                                               // $id = $firstProduct['id'];
                                              //  $image = $firstProduct['image'];
                                              //  $name = $firstProduct['name'];
                                              //  $cost = $firstProduct['cost'];
                                             $fifthProduct = array_shift($argum);
                                                $id = $fifthProduct['id'];
                                                $image = $fifthProduct['image'];
                                                $name = $fifthProduct['name'];
                                                $cost = $fifthProduct['cost'];
                                                           
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      	<?php
                                              	// Get the first product from the array and remove it
                                                $fifthProduct = array_shift($argum);
                                                $id = $fifthProduct['id'];
                                                $image = $fifthProduct['image'];
                                                $name = $fifthProduct['name'];
                                                $cost = $fifthProduct['cost'];
                                              ?>
                                        <div class="col-lg-4 order-lg-0 order-1">
                                            <div class="product-banner product-banner-circle">
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="offer-end offer-end-demo4">
                                                            <h3>Hurry Up </h3>
                                                            <h6>Check our models</h6>
                                                        </div>
                                                    </div>
                                                    <div class="product-details text-center">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="javascript:void(0)" class="font-default" tabindex="-1">
                                                            <h5 class="main-title"><?php echo $name ?></h5>
                                                        </a>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <!-- bonus -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="product-list">
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $fifthProduct = array_shift($argum);
                                                $id = $fifthProduct['id'];
                                                $image = $fifthProduct['image'];
                                                $name = $fifthProduct['name'];
                                                $cost = $fifthProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $fifthProduct = array_shift($argum);
                                                $id = $fifthProduct['id'];
                                                $image = $fifthProduct['image'];
                                                $name = $fifthProduct['name'];
                                                $cost = $fifthProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php
                                              	// Get the first product from the array and remove it
                                                $fifthProduct = array_shift($argum);
                                                $id = $fifthProduct['id'];
                                                $image = $fifthProduct['image'];
                                                $name = $fifthProduct['name'];
                                                $cost = $fifthProduct['cost'];
                                              ?>
                                                <div class="product-box product-box1">
                                                    <div class="img-wrapper">
                                                        <a href="product?id=<?php echo $id ?>" class="text-center">
                                                            <img src="<?php echo $image ?>"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>
                                                        <div class="circle-shape"></div>
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="theme-color">Rs. <?php echo $cost ?></h3>
                                                        <a href="product?id=<?php echo $id ?>" class="font-default">
                                                            <h5><?php echo $name ?></h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- AR End
                             -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tab banner section end -->
    


    <!-- footer start -->
  <?php include("footer.php"); ?>
    <!-- footer end -->

    <!-- Quick view modal start -->
    <div class="modal fade quick-view-modal" id="quick-view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="quick-view-image ">
                                <div class="quick-view-slider ratio_medium">
                                    <div>
                                        <img src="assets/images/furniture-images/new-arrival/1.jpg"
                                            class="img-fluid bg-img blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/furniture-images/new-arrival/2.jpg"
                                            class="img-fluid bg-img blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/furniture-images/new-arrival/3.jpg"
                                            class="img-fluid bg-img blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/furniture-images/new-arrival/4.jpg"
                                            class="img-fluid bg-img blur-up lazyload" alt="product">
                                    </div>
                                </div>
                                <div class="quick-nav">
                                    <div>
                                        <img src="assets/images/furniture-images/new-arrival/1.jpg"
                                            class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/furniture-images/new-arrival/2.jpg"
                                            class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/furniture-images/new-arrival/3.jpg"
                                            class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                    <div>
                                        <img src="assets/images/furniture-images/new-arrival/4.jpg"
                                            class="img-fluid blur-up lazyload" alt="product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-right">
                                <h2 class="mb-2">Orange Arm Chair2</h2>
                                <h6 class="font-light mb-1">Fully Confirtable</h6>
                                <ul class="rating">
                                    <li>
                                        <i class="fas fa-star theme-color"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star theme-color"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star theme-color"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                    </li>
                                </ul>
                                <div class="price mt-3">
                                    <h3>Rs. 49.68</h3>
                                </div>
                                <div class="color-types">
                                    <h4>colors</h4>
                                    <ul class="color-variant mb-0">
                                        <li class="bg-half-light selected">
                                        </li>
                                        <li class="bg-light1"></li>
                                        <li class="bg-blue1"></li>
                                        <li class="bg-black1"></li>
                                    </ul>
                                </div>
                                <div class="product-details">
                                    <h4>product details</h4>
                                    <ul>
                                        <li>
                                            <span class="font-light">Display type :</span> Chair
                                        </li>
                                        <li>
                                            <span class="font-light">Mechanism:</span> Tilt Angle
                                        </li>
                                        <li>
                                            <span class="font-light">Warranty:</span> 8 Months
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-btns">
                                    <a href="cart" class="btn btn-solid-default btn-sm">Add
                                        to cart</a>
                                    <a href="product-left-sidebar.html" class="btn btn-solid-default btn-sm">View details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->

    <!-- Newsletter modal start -->
    <div class="modal fade newletter-modal" id="newsletter">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <img src="assets/images/newletter-icon.png" class="img-fluid blur-up lazyload" alt="">
                    <div class="modal-title">
                        <h2 class="tt-title">Sign up for our Newsletter!</h2>
                        <p class="font-light">Never miss any new updates or products we reveal, stay up to date.</p>
                        <p class="font-light">Oh, and it's free!</p>

                        <div class="input-group mb-3">
                            <input placeholder="Email" class="form-control" type="text">
                        </div>

                        <div class="cancel-button text-center">
                            <button class="btn default-theme w-100" data-bs-dismiss="modal"
                                type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter modal end -->

    
    <!-- Cookie Section Start -->
<div class="cookie-bar-section">
    <div class="content">
        <img src="assets/images/cookie.png" alt="">
        <p class="font-light">This website use cookies to ensure you get the best experience on our website.</p>
        <div class="cookie-buttons">
            <button class="btn default-theme" id="button">I understand</button>
        </div>
    </div>
</div>

<script>
    document.getElementById("button").addEventListener("click", function() {
        localStorage.setItem("cookieConsent", "true");
      	document.querySelector(".cookie-bar-section").style.display = "none";
    });
    
    if (localStorage.getItem("cookieConsent")) {
        document.querySelector(".cookie-bar-section").style.display = "none";
    }
</script>
<!-- Cookie Section End -->


    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

 
    <script>
        $ (function () {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>