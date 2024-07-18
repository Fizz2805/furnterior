<?php
$page_title = 'Furniture Sets';
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

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" href="assets/css/vendors/ion.rangeSlider.min.css" />

    <!-- animation css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick-theme.css">

    <!-- Theme css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo4.css">

</head>

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
                 <h3>Furniture Sets</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            &nbsp;&nbsp;/
                          <li class="breadcrumb-item">
                                <a href="shop">
                                    Shop
                                </a>
                            </li>
                            &nbsp;&nbsp;/<li class="breadcrumb-item active" aria-current="page">Furniture Sets</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Shop Section start -->
    <!-- Shop Section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 ratio_30">
                    <div class="banner-deatils">
                        <div class="banner-image">
                            <img src="assets/images/banner/shop-banner.jpg" class="img-fluid bg-img blur-up lazyload"
                                alt="">
                            <div class="banner-content">
                                <div>
                                    <h3>Shop The Latest Trends</h3>
                                    <p style="color: #000;">Shop the latest furniture trends with our collection of what's new in online at
                                        Furnterior. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <!-- filter button -->
                    <div class="hide-button mb-3">
                        <button class="danger-button danger-center btn btn-sm" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample"><i class="me-2"
                                data-feather="align-left"></i>Filter</button>
                    </div>
                    <!-- filter button -->
                    <div class="row g-4">
                        <!-- label and featured section -->
                        
                        <div class="col-12">
                            <div class="filter-options">
                                <div class="select-options">
                                    <div class="page-view-filter">
                                        <div class="dropdown select-featured">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Sort By
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0)">Alphabetically
                                                        A-Z</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0)">Alphabetically
                                                        Z-A</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0)">Price, High To
                                                        Low</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0)">Price, Low To
                                                        High</a>
                                                </li>                                                
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="grid-options d-sm-inline-block d-none">
                                    <ul class="d-flex">
                                        <li class="two-grid">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/grid-2.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="three-grid d-md-inline-block d-none">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/grid-3.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="grid-btn d-lg-inline-block d-none">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/grid.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="five-grid active d-xl-inline-block d-none">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/grid-5.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="list-btn">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/list.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- label and featured section -->


                    <!-- Product section -->
            <div
            class="row g-sm-4 g-3 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 gx-sm-4 gx-3 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section" id="product-list">
            <?php
            $sql = "SELECT * FROM Product where Category=6";
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
                    $cat="Table";
                  

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
                            <span class="background-text">Furniture</span>
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
                    <h3 class="theme-color">Rs. <?php echo $cost?></h3>
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
                                        <button type="button" class="btn btn-solid-default btn-sm addtocart-btn" data-bs-toggle="modal" data-bs-target="#addtocart-id-<?php echo $id; ?>" data-product-id="<?php echo $id; ?>">Add to cart</button>
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
                                            <a href="shop"class="btn default-light-theme conti-button default-theme default-theme-2 rounded">CONTINUE
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
    </section>
    <!-- Shop Section end -->

    
    <!-- footer start -->
    <?php include("footer.php"); ?>
    <!-- footer end -->

    <div class="bg-overlay"></div>

    <!-- Offcanvas Section Start -->
    <div class="offcanvas custome-offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body">
            <div data-bs-dismiss="offcanvas" aria-label="Close" class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Close</h5>
                <button type="button" class="btn-close text-reset"></button>
            </div>
            <div class="category-option">
                <div class="accordion category-name" id="accordionExample">

                    <div class="accordion-item category-rating">
                        
                    <!-- <div class="accordion-item category-color">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree">
                                Color
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="category-list">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
 -->

 <div class="accordion-item category-rating">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseOne">
            Category
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
        <div class="accordion-body category-scroll">
            <ul class="category-list">
                <li>
                    <div class="form-check ps-0 custome-form-check">
                        <input class="checkbox_animated check-it" type="checkbox"
                            id="flexCheckDefault10">
                        <label class="form-check-label" for="flexCheckDefault10">Sofas</label>
                        <p class="font-light">(25)</p>
                    </div>
                </li>
                <li>
                    <div class="form-check ps-0 custome-form-check">
                        <input class="checkbox_animated check-it" type="checkbox"
                            id="flexCheckDefault11">
                        <label class="form-check-label" for="flexCheckDefault11">Chairs</label>
                        <p class="font-light">(25)</p>
                    </div>
                </li>
                <li>
                    <div class="form-check ps-0 custome-form-check">
                        <input class="checkbox_animated check-it" type="checkbox"
                            id="flexCheckDefault12">
                        <label class="form-check-label" for="flexCheckDefault12">Tables</label>
                        <p class="font-light">(25)</p>
                    </div>
                </li>
                <li>
                    <div class="form-check ps-0 custome-form-check">
                        <input class="checkbox_animated check-it" type="checkbox"
                            id="flexCheckDefault13">
                        <label class="form-check-label" for="flexCheckDefault13">Beds</label>
                        <p class="font-light">(25)</p>
                    </div>
                </li>
                <li>
                    <div class="form-check ps-0 custome-form-check">
                        <input class="checkbox_animated check-it" type="checkbox"
                            id="flexCheckDefault14">
                        <label class="form-check-label" for="flexCheckDefault14">Augmented Reality</label>
                        <p class="font-light">(25)</p>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</div>
                    <div class="accordion-item category-price">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour">
                                Price
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="range-slider category-list">
                                    <input type="text" class="js-range-slider" value="" />
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offcanvas Section End -->

    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- Add To Home js -->
    <script src="assets/js/pwa.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather/feather.min.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/slick-animation.min.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- Notify js-->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- Price Filter js -->
    <script src="assets/js/price-filter.js"></script>

    <!--Plugin JavaScript file-->
    <script src="assets/js/ion.rangeSlider.min.js"></script>

    <!-- Filter Hide and show Js -->
    <script src="assets/js/filter.js"></script>

    <!-- Notify js-->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>