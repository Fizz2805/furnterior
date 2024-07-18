<?php
$page_title = 'Shop';
require_once "header-new.php";
require_once "navbar.php";
require_once "admin/config.php";
?>

<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if category field is set in the form submission
    if (isset($_POST['category'])) {
        // Store the selected categories in the session variable
        $_SESSION['category'] = $_POST['category'];
    }

    // Check if price field is set in the form submission
    if (isset($_POST['price'])) {
        // Store the price value in the session variable
        $_SESSION['price'] = $_POST['price'];
    }
}
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
               <h3>Furnterior Shop</h3>
               <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    &nbsp;&nbsp;/<li class="breadcrumb-item active" aria-current="page">Shop</li>
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
                        <ul class="short-name">
                            <?php
                            // Check if the PHP session variable is set
                            if (isset($_SESSION['category'])) {
                                // Loop through the available categories
                                foreach ($_SESSION['category'] as $category) {
                                    // Show label-tag only for the categories in the session variable
                                    if ($category == 'Sofas') {
                                        echo '
                                        <li>
                                        <div class="label-tag">
                                        <span>Sofas</span>
                                        </div>
                                        </li>';
                                    } elseif ($category == 'Chairs') {
                                        echo '
                                        <li>
                                        <div class="label-tag">
                                        <span>Chairs</span>
                                        </div>
                                        </li>';
                                    } elseif ($category == 'Tables') {
                                        echo '
                                        <li>
                                        <div class="label-tag">
                                        <span>Tables</span>
                                        </div>
                                        </li>';
                                    } elseif ($category == 'Beds') {
                                        echo '
                                        <li>
                                        <div class="label-tag">
                                        <span>Beds</span>
                                        </div>
                                        </li>';
                                    } elseif ($category == 'Augmented Reality') {
                                        echo '
                                        <li>
                                        <div class="label-tag">
                                        <span>Augmented Reality</span>
                                        </div>
                                        </li>';
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </div>


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
                                            <a class="dropdown-item" href="javascript:void(0)" data-sort="price-high" onclick="sortProducts('Price, High To Low')">Price, High To
                                            Low</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)" data-sort="price-low" onclick="sortProducts('Price, Low To High')">Price, Low To
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
            
           $sql = "SELECT `Product`.*, `Product_Category`.`Cat_ID`, `Product_Category`.`Name` AS `Cat_Name` FROM `Product` JOIN `Product_Category` ON `Product`.`Category` = `Product_Category`.`Cat_ID`";

            if (isset($_SESSION['category'])) {
                $category = $_SESSION['category'];
                $categoryStr = implode("', '", $category);
                $sql .= " WHERE `Product_Category`.`Name` IN ('$categoryStr')";
            }
            if (isset($_SESSION['price'])) {
                $price = $_SESSION['price'];
                $priceArr = explode(";", $price);
                if (count($priceArr) == 2) {
                    $minPrice = $priceArr[0] ;
                    $maxPrice = $priceArr[1] ;
                } else {
                    $minPrice = $price;
                    $maxPrice = $price;
                }

                $sql .= " AND `Product`.`Cost` >= $minPrice AND `Product`.`Cost` <= $maxPrice";
            }

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
                                    <a class="addtocart-btn" data-bs-toggle="modal" data-bs-target="#addtocart-id-<?php echo $id; ?>" data-product-id="<?php echo $id; ?>" >
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
                        <h3 class="theme-color furniture-price">Rs. <?php echo $cost?></h3>
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
<!--
<nav class="page-section">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                <span aria-hidden="true">
                    <i class="fas fa-chevron-left"></i>
                </span>
            </a>
        </li>
        <li class="page-item active">
            <a class="page-link" href="javascript:void(0)">1</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="javascript:void(0)">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="javascript:void(0)">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" aria-label="Next">
                <span aria-hidden="true">
                    <i class="fas fa-chevron-right"></i>
                </span>
            </a>
        </li>
    </ul>
</nav> -->
</div>
</div>
</div>
</section>
<!-- Shop Section end -->


<!-- footer start -->
<?php // include("footer.php"); ?>
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
                <form method="post">
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
                                        <input class="checkbox_animated check-it" value="Sofas" name="category[]" type="checkbox"
                                        id="flexCheckDefault10" <?php if (isset($_SESSION['category']) && in_array('Sofas', $_SESSION['category'])) echo 'checked'; ?>>
                                        <label class="form-check-label" for="flexCheckDefault10">Sofas</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check ps-0 custome-form-check">
                                        <input class="checkbox_animated check-it" value="Chairs" name="category[]" <?php if (isset($_SESSION['category']) && in_array('Chairs', $_SESSION['category'])) echo 'checked'; ?> type="checkbox"
                                        id="flexCheckDefault11">
                                        <label class="form-check-label" for="flexCheckDefault11">Chairs</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check ps-0 custome-form-check">
                                        <input class="checkbox_animated check-it" value="Tables" name="category[]" type="checkbox"
                                        id="flexCheckDefault12" <?php if (isset($_SESSION['category']) && in_array('Tables', $_SESSION['category'])) echo 'checked'; ?>>
                                        <label class="form-check-label" for="flexCheckDefault12">Tables</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check ps-0 custome-form-check">
                                        <input class="checkbox_animated check-it" value="Beds" name="category[]" type="checkbox"
                                        id="flexCheckDefault13" <?php if (isset($_SESSION['category']) && in_array('Beds', $_SESSION['category'])) echo 'checked'; ?>>
                                        <label class="form-check-label" for="flexCheckDefault13">Beds</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check ps-0 custome-form-check">
                                        <input class="checkbox_animated check-it" value="Augmented Reality" name="category[]" type="checkbox"
                                        id="flexCheckDefault14" <?php if (isset($_SESSION['category']) && in_array('Augmented Reality', $_SESSION['category'])) echo 'checked'; ?>>
                                        <label class="form-check-label" for="flexCheckDefault14">Augmented Reality</label>
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
                        <?php
                        $price = isset($_SESSION['price']) ? $_SESSION['price'] : '';
                        $priceValues = explode(';', $price);
                        $priceMin = isset($priceValues[0]) ? $priceValues[0] : '';
                        $priceMax = isset($priceValues[1]) ? $priceValues[1] : '';
                        ?>
                        <input type="text" name="price" class="js-range-slider"
                            value="<?php echo $price; ?>"
                            data-min="<?php echo $priceMin ? $priceMin : '0'; ?>"
                            data-to="<?php echo $priceMax ? $priceMax : '300000'; ?>"
                            data-max="500000"
                        />
                    </div>

                </div>
            </div>

        </div>



        <div class="accordion-item category-search">
          <button type="submit" class="btn btn-block btn-solid-default">Search</button>
          <button type="button" class="btn btn-block btn-solid-default" id="clear-filters-btn">Clear Filters</button>
      </div>
  </form>


</div>
</div>
</div>
</div>
</div>
<!-- Offcanvas Section End -->


<div id="quick-view-name"></div>


<!-- tap to top Section Start -->
<div class="tap-to-top">
    <a href="#home">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!-- tap to top Section End -->

<div class="bg-overlay"></div>

<?php include 'footer.php' ?>

<!--  SORTING PRODUCTS  -->
<script>
// Get the product list element
    const productList = document.querySelector('#product-list');

// Get the dropdown menu element
    const sortDropdown = document.querySelector('.select-featured');

// Listen for clicks on the dropdown menu
    sortDropdown.addEventListener('click', (event) => {
  // Check if a sorting option was clicked
      if (event.target.classList.contains('dropdown-item')) {
    // Get the selected sorting option
        const selectedOption = event.target.dataset.sort;

        if (selectedOption === 'price-high') {
      // Sort by price, high to low
          productList.innerHTML = sortProductsByPrice(productList.innerHTML, 'desc');
      } else if (selectedOption === 'price-low') {
      // Sort by price, low to high
          productList.innerHTML = sortProductsByPrice(productList.innerHTML, 'asc');
      }
  }
});

// Function to sort products by price
    function sortProductsByPrice(productsHTML, order) {
      const products = Array.from(productList.children);
      products.sort((a, b) => {
        // const aPrice = parseFloat(a.querySelector('h3').textContent.replace(/\D/g,''));
        // const bPrice = parseFloat(b.querySelector('h3').textContent.replace(/\D/g,''));
        const aPriceElement = a.querySelector('h3');
        const bPriceElement = b.querySelector('h3');
        const aPrice = aPriceElement ? parseFloat(aPriceElement.textContent.replace(/\D/g,'')) : 0;
        const bPrice = bPriceElement ? parseFloat(bPriceElement.textContent.replace(/\D/g,'')) : 0;
        if (order === 'asc') {
          return aPrice - bPrice;
      } else {
          return bPrice - aPrice;
      }
  });
      return products.map((product) => product.outerHTML).join('');
  }
  function sortProducts(sortBy) {
    // Update the button text with the selected sorting option
    document.querySelector('.dropdown-toggle').innerHTML = 'Sort By ' + sortBy;
}

</script>    
<script>
  $(document).ready(function() {
  $('#clear-filters-btn').click(function() {
    <?php
  		unset($_SESSION['category']);
		unset($_SESSION['price']);
  	?>
    window.location.href='shop';
  });
});

</script>