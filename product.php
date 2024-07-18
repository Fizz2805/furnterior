<?php
$page_title = 'Product';
require_once "header-new.php";
require_once "navbar.php";
require_once "admin/config.php";

$product_id= $_GET['id'];
$sql = "SELECT * FROM Product WHERE Product_ID='$product_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = $row['Product_ID'];
$name= $row["Name"];
$sku= $row["SKU"];
$category= $row["Category"];
$price= $row["Cost"];
$desc= $row["Description"];
$weight= $row["Weight"];
$dim= $row["Dimensions"];
$stock_status= $row["Stock_Status"];
$stock_qty= $row["Stock_Qty"];
$model= $row["3D_Model"];

$sql_count= "SELECT COUNT(*) AS total_reviews FROM Product_Review WHERE Product_ID = $product_id";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_reviews = $row_count['total_reviews'];

?>

<head>
    <!-- Import the component for AR webviewer-->
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <style>
      .image-360 {
        position: relative;
        overflow: hidden;
    }

    .image-360::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(ellipse at center, transparent 0%, transparent 50%, #e87316 51%, transparent 100%);
        opacity: 0;
        animation: rays 0.9s linear infinite;
    }

    @keyframes rays {
       0% {
        opacity: 0;
        transform: scale(0);
    }
    20% {
        opacity: 1;
        transform: scale(1);
    }
    100% {
        opacity: 0;
        transform: scale(2);
    }
}
.details-items .details-image .product-image-tag img{
    background-color: #b8c6db;
    background-image: linear-gradient(315deg, #b8c6db 0%, #f5f7fa 74%);   
}
#ar-button {
    background-image: url(https://modelviewer.dev/assets/ic_view_in_ar_new_googblue_48dp.png);
    background-repeat: no-repeat;
    background-size: 20px 20px;
    background-position: 12px 50%;
    background-color: #fff;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    white-space: nowrap;
    bottom: 132px;
    padding: 0px 16px 0px 40px;
    font-family: Roboto Regular, Helvetica Neue, sans-serif;
    font-size: 14px;
    color:#4285f4;
    height: 36px;
    line-height: 36px;
    border-radius: 18px;
    border: 1px solid #DADCE0;
}

.add-btn .outline-button{margin-right: 50px;}
</style>
<!-- Star Rating css -->
<link rel="stylesheet" type="text/css" href="assets/css/vendors/starability-grow.min.css">
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
                    <h3><?php echo $name; ?></h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i> /
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Shop Section start -->
    <section>
        <div class="container">
            <div class="row gx-4 gy-5">
                <div class="col-lg-12 col-12">
                    <div class="details-items">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="degree-section">
                                    <div class="details-image ratio_asos">
                                        <div>
                                            <?php
                                            $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $product_id LIMIT 1";
                                            $result2 = mysqli_query($conn, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            $image_data = $row2['Img_Url'];
                                            $img_dir= "admin/assets/images/products/";
                                            $img_url= $img_dir.$image_data;
                                            ?>
                                            <div class="product-image-tag">
                                                <img src="<?php echo $img_url; ?>" id="zoom_01"
                                                data-zoom-image="<?php echo $img_url; ?>"
                                                class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="">

                                                <div class="label-tag">
                                                    <h6><i class="fas fa-star"></i> <?php echo $total_reviews; ?> </h6>
                                                </div>
                                            </div>
                                        </div>                                                                               
                                    </div>

                                    <?php
                                    if($category==5){
                                        echo '<div class="image-360" data-bs-toggle="modal" data-bs-target="#product-modal">
                                        <img src="assets/images/360-icon.png" alt="" class="img-fluid blur-up lazyload"> 
                                        </div>';
                                    }
                                    
                                    ?>

                                   <!--<div class="details-image-option black-slide mt-4 rounded">
                                     <?php
                                     	/*$sql3 = "SELECT Img_Url 
                                         FROM Images 
                                         WHERE Product_ID = $product_id";
                                            $result3 = mysqli_query($conn, $sql3);
                                     		if(mysqli_num_rows($result3)>0) {
                                              while($row3 = mysqli_fetch_assoc($result3)) {
                                              $image_data = $row3['Img_Url'];
                                              $img_dir= "admin/assets/images/products/";
                                              $img_url= $img_dir.$image_data; */
                                     ?>
                                        <div>
                                            <img src="<? //php echo $img_url; ?>" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </div>
                                     <?php //}} ?> 
                                    </div>  -->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="cloth-details-size">
                                    <!--<div class="product-count">
                                        <ul>
                                            <li>
                                                <img src="assets/images/gif/fire.gif" class="img-fluid blur-up lazyload"
                                                    alt="image">
                                                <span class="p-counter">37</span>
                                                <span class="lang">orders in last 24 hours</span>
                                            </li>
                                            <li>
                                                <img src="assets/images/gif/person.gif" class="img-fluid user_img"
                                                    alt="image">
                                                <span class="p-counter">44</span>
                                                <span class="lang">active view this</span>
                                            </li>
                                        </ul>
                                    </div> -->

                                    <div class="details-image-concept">
                                        <h2><?php echo $name; ?></h2>
                                    </div>

                                    <div class="label-section">
                                        <span class="badge badge-grey-color"><?php 
                                        switch($category){ 
                                            case 1:
                                            echo "<td> Sofa </td>";
                                            break;
                                            case 2:
                                            echo "<td> Chair </td>";
                                            break;
                                            case 3:
                                            echo "<td> Bed </td>";
                                            break;
                                            case 4:
                                            echo "<td> Table </td>";
                                            break;
                                            case 5:
                                            echo "<td> Augmented Reality </td>";
                                            break;
                                        }
                                        
                                    ?></span>
                                </div>

                                <!--<h3 class="price-detail">Rs. 32.96 <del>Rs. 459.00</del><span>55% off</span></h3>-->
                                <h3 class="price-detail">Rs. <?php echo $price ;?> </h3>

                                    <!--<div class="color-image">
                                        <div class="image-select">
                                            <h5>Color :</h5>
                                            <ul class="image-section">
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <img src="assets/images/furniture-images/new-arrival/5.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <img src="assets/images/furniture-images/new-arrival/8.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <img src="assets/images/furniture-images/new-arrival/7.jpg"
                                                            class="img-fluid blur-up lazyload" alt="">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->

                                    <div id="selectSize" class="addeffect-section product-description border-product">
                                       <!-- <h6 class="product-title size-text">select size
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#sizemodal">size chart</a>
                                        </h6>

                                        <h6 class="error-message">please select size</h6>

                                        <div class="size-box">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)">s</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">m</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">l</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">xl</a>
                                                </li>
                                            </ul>
                                        </div> -->
                                        
                                        <div class="mt-2 mt-md-3">
                                            <script> 
                                          // using it for stock button
                                          // so that it does not increment if value exceeds th limit
                                                var stockQty = <?php echo $stock_qty; ?>;
                                            </script>
                                            <?php
                                            if($stock_qty > 0){
                                              ?>
                                              <h6 class="product-title hurry-title d-block">Left <span> <?php echo $stock_qty ?></span>
                                              in stock</h6>
                                              <?php
                                                // Calculate the percentage of stock remaining
                                              $percent_remaining = ($stock_qty / 100) * 100;

                                                // Set a minimum width for the progress bar to prevent it from disappearing when stock is low
                                              $min_width = 10;

                                                // Calculate the width of the progress bar, with a minimum of $min_width
                                              $bar_width = max($min_width, $percent_remaining);

                                              echo '<div class="progress">
                                              <div class="progress-bar" role="progressbar" style="width:'.$bar_width.'%"></div>
                                              </div>';
                                          }

                                          else
                                            echo '<h6 class="product-title hurry-title d-block"><span>Out of Stock</span></h6>';

                                        ?>
                                        
                                        <!--<div class="font-light timer-5">
                                            <h5>Order in the next to get</h5>
                                            <ul class="timer1">
                                                <li class="counter">
                                                    <h5 id="days">&#9251;</h5> Days :
                                                </li>
                                                <li class="counter">
                                                    <h5 id="hours">&#9251;</h5> Hour :
                                                </li>
                                                <li class="counter">
                                                    <h5 id="minutes">&#9251;</h5> Min :
                                                </li>
                                                <li class="counter">
                                                    <h5 id="seconds">&#9251;</h5> Sec
                                                </li>
                                            </ul>
                                        </div> -->
                                    </div>

                                    <?php
                                    if ($stock_qty > 0) {
                                                // product is in stock, enable add to cart button
                                        ?>
                                        <h6 class="product-title product-title-2 d-block">quantity</h6>
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-left-minus"
                                                    data-type="minus" data-field="">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quantity" class="form-control input-number"
                                            value="1" >
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn quantity-right-plus"
                                                data-type="plus" data-field="">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </span>                                                    
                                    </div>
                                </div> 
                                <?php    
                            } 
                            ?>

                        </div>

                        <?php 
                        if($stock_qty>0){

                           ?>
                           <div class="product-buttons product-box">
                            <a class="btn btn-solid wishlist" data-product-id="<?php echo $product_id; ?>">
                                <i class="fa fa-heart fz-16 me-2"></i>
                                <span>Wishlist</span>
                            </a>
                            <a id="cartEffect" class="addtocart-btn btn btn-solid hover-solid btn-animation" data-bs-toggle="modal" data-bs-target="#addtocart-id-<?php echo $product_id; ?>" data-product-id="<?php echo $product_id; ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Add To Cart</span>
                            </a>
                        </div>
                        <?php
                    }
                    ?>

                    <ul class="product-count shipping-order">
                        <li>
                            <img src="assets/images/gif/truck.png" class="img-fluid blur-up lazyload"
                            alt="image">
                            <span class="lang">10% Discount for orders above Rs. 99999</span>
                        </li>
                    </ul>


                    <div class="border-product">
                        <h6 class="product-title d-block">share it</h6>
                        <div class="product-icon">
                            <ul class="product-social">
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>                                                
                                <li>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/create/story?url=<?php echo urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="cloth-review">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                data-bs-target="#desc" type="button">Description</button>

                <button class="nav-link" id="nav-speci-tab" data-bs-toggle="tab" data-bs-target="#speci"
                type="button">Specifications</button>

                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                data-bs-target="#review" type="button">Reviews</button>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="desc">
                <div class="shipping-chart">
                    <div class="part">
                        <!--<h4 class="inner-title mb-2">Give you a complete account of the system</h4>-->
                        <p class="font-light"><?php echo $desc; ?>
                    </p>
                </div>

                                    <!--<div class="row g-3 align-items-center">
                                        <div class="col-lg-8">
                                            <p class="font-light">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing
                                                elit.
                                                Ab, autem nemo? Tempora vitae assumenda laudantium unde magni,
                                                soluta
                                                repudiandae quam, neque voluptate deleniti consequatur laboriosam
                                                veritatis?
                                                Tempore dolor molestias voluptatum! Minima possimus, pariatur sed,
                                                quasi
                                                provident dolorum unde molestias, assumenda consequuntur odit magni
                                                blanditiis obcaecati? Ea corporis odit dolorem fuga, fugiat soluta
                                                consequuntur magni.</p>

                                            <div class="part mt-3">
                                                <h5 class="inner-title mb-2">fabric:</h5>
                                                <p class="font-light">Art silk is manufactured by synthetic fibres
                                                    like
                                                    rayon. It's light in weight and is soft on the skin for comfort
                                                    in
                                                    summers.Art silk is manufactured by synthetic fibres like rayon.
                                                    It's
                                                    light in weight and is soft on the skin for comfort in summers.
                                                </p>
                                                <p class="font-light">Lorem Ipsum is simply dummy text of the
                                                    printing
                                                    and typesetting industry. Lorem Ipsum has been the industry's
                                                    standard dummy text ever since the 1500s</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <img src="assets/images/furniture-images/new-arrival/slider/1.jpg"
                                                class="img-fluid rounded blur-up lazyload" alt="">
                                        </div>

                                        <div class="col-lg-8 order-lg-2 mt-4">
                                            <p class="font-light">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing
                                                elit.
                                                Ab, autem nemo? Tempora vitae assumenda laudantium unde magni,
                                                soluta
                                                repudiandae quam, neque voluptate deleniti consequatur laboriosam
                                                veritatis?
                                                Tempore dolor molestias voluptatum! Minima possimus, pariatur sed,
                                                quasi
                                                provident dolorum unde molestias, assumenda consequuntur odit magni
                                                blanditiis obcaecati? Ea corporis odit dolorem fuga, fugiat soluta
                                                consequuntur magni.</p>
                                            <div class="part mt-3">
                                                <p class="font-light">Lorem ipsum, dolor sit amet consectetur
                                                    adipisicing
                                                    elit. Odio repellat numquam perspiciatis eum quis ab, sed dicta
                                                    tenetur
                                                    fugit culpa, aut distinctio deserunt quisquam ipsam
                                                    reprehenderit
                                                    iure?
                                                    Adipisci, optio enim? Voluptates voluptatum neque id ad commodi
                                                    quisquam
                                                    dolorem vitae inventore quasi! Officiis facere, iusto tempore
                                                    atque
                                                    magnam voluptas. Architecto laboriosam deleniti hic veritatis
                                                    nesciunt.
                                                    Aut officia quasi inventore et. Debitis.</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 order-lg-0 mt-4">
                                            <img src="assets/images/furniture-images/new-arrival/slider/2.jpg"
                                                class="img-fluid rounded blur-up lazyload" alt="">
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div class="tab-pane fade" id="speci">
                                <div class="pro mb-4">
                                    <!--<p class="font-light">The Model is wearing a white blouse from our stylist's
                                        collection, see the image for a mock-up of what the actual blouse would look
                                        like.it has text written on it in a black cursive language which looks great
                                    on a white color.</p> -->
                                    <div class="table-responsive">
                                        <table class="table table-part">
                                            <tr>
                                                <th>SKU</th>
                                                <td><?php echo $sku; ?></td>
                                            </tr>                                            
                                            <tr>
                                                <th>Category</th>
                                                <?php
                                                switch($category){ 
                                                    case 1:
                                                    echo "<td> Sofa </td>";
                                                    break;
                                                    case 2:
                                                    echo "<td> Chair </td>";
                                                    break;
                                                    case 3:
                                                    echo "<td> Bed </td>";
                                                    break;
                                                    case 4:
                                                    echo "<td> Table </td>";
                                                    break;
                                                    case 5:
                                                    echo "<td> Augmented Reality </td>";
                                                    break;
                                                }

                                                ?>
                                            </tr>
                                            <tr>
                                                <th>Dimensions (LxWxH)</th>
                                                <td><?php echo $dim; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Weight (kg)</th>
                                                <td><?php echo $weight; ?></td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!--<div class="tab-pane fade overflow-auto" id="nav-guide">
                                <div class="table-responsive">
                                    <table class="table table-pane mb-0">
                                        <tbody>
                                            <tr class="bg-color">
                                                <th class="my-2">US Sizes</th>
                                                <td>6</td>
                                                <td>6.5</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>8.5</td>
                                                <td>9</td>
                                                <td>9.5</td>
                                                <td>10</td>
                                                <td>10.5</td>
                                                <td>11</td>
                                            </tr>

                                            <tr>
                                                <th>Euro Sizes</th>
                                                <td>39</td>
                                                <td>39</td>
                                                <td>40</td>
                                                <td>40-41</td>
                                                <td>41</td>
                                                <td>41-42</td>
                                                <td>42</td>
                                                <td>42-43</td>
                                                <td>43</td>
                                                <td>43-44</td>
                                            </tr>

                                            <tr class="bg-color">
                                                <th>UK Sizes</th>
                                                <td>5.5</td>
                                                <td>6</td>
                                                <td>6.5</td>
                                                <td>7</td>
                                                <td>7.5</td>
                                                <td>8</td>
                                                <td>8.5</td>
                                                <td>9</td>
                                                <td>10.5</td>
                                                <td>11</td>
                                            </tr>

                                            <tr>
                                                <th>Inches</th>
                                                <td>9.25"</td>
                                                <td>9.5"</td>
                                                <td>9.625"</td>
                                                <td>9.75"</td>
                                                <td>9.9735"</td>
                                                <td>10.125"</td>
                                                <td>10.25"</td>
                                                <td>10.5"</td>
                                                <td>10.765"</td>
                                                <td>10.85</td>
                                            </tr>

                                            <tr class="bg-color">
                                                <th>CM</th>
                                                <td>23.5</td>
                                                <td>24.1</td>
                                                <td>24.4</td>
                                                <td>25.4</td>
                                                <td>25.7</td>
                                                <td>26</td>
                                                <td>26.7</td>
                                                <td>27</td>
                                                <td>27.3</td>
                                                <td>27.5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> -->

                            <!--<div class="tab-pane fade" id="question">
                                <div class="question-answer">
                                    <ul>
                                        <li>
                                            <div class="que">
                                                <i class="fas fa-question"></i>
                                                <div class="que-details">
                                                    <h6>Is it compatible with all WordPress themes?</h6>
                                                    <p class="font-light">If you want to see a demonstration version of
                                                        the premium plugin, you can see that in this page. If you want
                                                        to see a demonstration version of the premium plugin, you can
                                                        see that in this page. If you want to see a demonstration
                                                        version of the premium plugin, you can see that in this page.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="que">
                                                <i class="fas fa-question"></i>
                                                <div class="que-details">
                                                    <h6>How can I try the full-featured plugin? </h6>
                                                    <p class="font-light">Compatibility with all themes is impossible,
                                                        because they are too many, but generally if themes are developed
                                                        according to WordPress and WooCommerce guidelines, YITH plugins
                                                        are compatible with them. Compatibility with all themes is
                                                        impossible, because they are too many, but generally if themes
                                                        are developed according to WordPress and WooCommerce guidelines,
                                                        YITH plugins are compatible with them.</p>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="que">
                                                <i class="fas fa-question"></i>
                                                <div class="que-details">
                                                    <h6>Is it compatible with all WordPress themes?</h6>
                                                    <p class="font-light">If you want to see a demonstration version of
                                                        the premium plugin, you can see that in this page. If you want
                                                        to see a demonstration version of the premium plugin, you can
                                                        see that in this page. If you want to see a demonstration
                                                        version of the premium plugin, you can see that in this page.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->



                            <div class="tab-pane fade" id="review">
                                <div class="row g-4">   
                                 <?php
                                 $sql = "SELECT * FROM Product_Review WHERE Product_ID=$product_id";
                                 $result = $conn->query($sql);
                                 if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                     $rev_name= $row['Name'];
                                     $stars= $row['Stars'];
                                     $comment= $row['Comment'];
                                     $date= $row['Date'];
                                     ?>
                                     <div class="col-12 mt-4">
                                        <div class="customer-review-box">
                                            <div class="customer-section">                                                
                                                <div class="customer-details">
                                                    <h5><?php echo $rev_name; ?> </h5><br>
                                                    <?php
                                                    switch($stars){ 
                                                      case 1:
                                                      echo "<td><i class='fas fa-star theme-color'></i></td>";  
                                                      case 2:
                                                      echo "<td><i class='fas fa-star theme-color'></i>";  
                                                      echo "<i class='fas fa-star theme-color'></i></td>"; 
                                                      break;
                                                      case 3:
                                                      echo "<td><i class='fas fa-star theme-color'></i>";  
                                                      echo "<i class='fas fa-star theme-color'></i>";
                                                      echo "<i class='fas fa-star theme-color'></i></td>";
                                                      break;
                                                      case 4:
                                                      echo "<td><i class='fas fa-star theme-color'></i>";  
                                                      echo "<i class='fas fa-star theme-color'></i>";  
                                                      echo "<i class='fas fa-star theme-color'></i>"; 
                                                      echo "<i class='fas fa-star theme-color'></i></td>";
                                                      break;
                                                      case 5:
                                                      echo "<td><i class='fas fa-star theme-color'></i>";  
                                                      echo "<i class='fas fa-star theme-color'></i>";  
                                                      echo "<i class='fas fa-star theme-color'></i>"; 
                                                      echo "<i class='fas fa-star theme-color'></i>";
                                                      echo "<i class='fas fa-star theme-color'></i></td>";
                                                      break;
                                                  }    
                                                  ?>                                                    
                                                  <br><br><p class="font-light"><?php echo $comment; ?></p>

                                                  <p class="date-custo font-light">- <?php  echo $date; ?></p>
                                              </div>
                                              
                                          </div>
                                      </div>
                                  </div>
                                  <?php
                              }
                          }
                          ?>
                          <div class="col-lg-8">
                            <div class="review-box">
                                <h2>Submit your Review</h2>
                                <p>Your Email will not be published</p><br><br>

                                <form class="row g-4" action="submit-review.php" method="post">                                          
                                   <div class="col-12">
                                      <label class="mb-1" for="rate">Rating *</label>
                                      <div class="starability-grow"> 
                                          <input type="radio" id="rate1" name="rating" value="1"/>
                                          <label for="rate1" title="Terrible">1 star</label>
                                          <input type="radio" id="rate2" name="rating" value="2" />
                                          <label for="rate2" title="Not good">2 stars</label>
                                          <input type="radio" id="rate3" name="rating" value="3" />
                                          <label for="rate3" title="Average">3 stars</label>
                                          <input type="radio" id="rate4" name="rating" value="4" />
                                          <label for="rate4" title="Very good">4 stars</label>
                                          <input type="radio" id="rate5" name="rating" value="5" />
                                          <label for="rate5" title="Amazing">5 stars</label>                                                

                                      </div>  
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <label class="mb-1" for="name">Name *</label>
                                    <input type="text" class="form-control" name="name"
                                    placeholder="Enter your name" required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="mb-1" for="id">Email Address *</label>
                                    <input type="email" class="form-control" name="email"
                                    placeholder="Email Address" required>
                                </div>

                                <div class="col-12">
                                    <label class="mb-1" for="comments">Comments</label>
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                    name="comment" style="height: 100px"></textarea>
                                </div>


                                <div class="col-12">
                                 <input type="text" name="id" value="<?php echo $product_id; ?>" hidden>
                                 <button type="submit"
                                 class="btn default-light-theme default-theme default-theme-2">Submit</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
</div>
</div>
</section>
<br>
<br>
<!-- Shop Section end -->

<!--<a href="intent://arvr.google.com/scene-viewer/1.0?file=https://raw.githubusercontent.com/KhronosGroup/glTF-Sample-Models/master/2.0/Avocado/glTF/Avocado.gltf#Intent;scheme=https;package=com.google.android.googlequicksearchbox;action=android.intent.action.VIEW;S.browser_fallback_url=https://developers.google.com/ar;end;">Avocado</a> -->

<!-- footer start -->
<?php include("footer.php"); ?>
<!-- footer end -->

<!-- sticky cart bottom start -->
<div class="sticky-bottom-cart">
    <div class="container">
        <div class="cart-content">
            <div class="product-image">
                <img src="<?php echo $img_url ?>" class="img-fluid blur-up lazyload" alt="">
                <div class="content">
                    <h5><?php echo $name ?></h5>
                    <h6><?php echo $price ?></h6>
                </div>
            </div>
                <!--<div class="selection-section">
                    <div class="form-group mb-0">
                        <select id="inputState" class="form-control form-select">
                            <option disabled selected>Choose color...</option>
                            <option>Pink</option>
                            <option>Blue</option>
                            <option>Grey</option>
                            <option>Pink</option>
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <select id="input-state" class="form-control form-select">
                            <option selected disabled>Choose size...</option>
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>Extra Large</option>
                        </select>
                    </div>
                </div>-->
                <?php
                if($stock_qty> 0){
                    echo '
                    <div class="add-btn">
                    <a class="btn default-light-theme default-theme default-theme-2 outline-button wishlist-btn"
                    data-product-id="<?php echo $product_id; ?>"><i class="fa fa-bookmark"></i> Wishlist</a>
                    <a class="btn default-light-theme default-theme default-theme-2 outline-button" data-bs-toggle="modal" data-bs-target="#addtocart-id-<?php echo $product_id; ?>" data-product-id="<?php echo $product_id; ?>"><i
                    class="fas fa-shopping-cart"></i> Add To Cart</a>
                    </div>
                    ';
                }
                ?>
                
            </div>
        </div>
    </div>
    <!-- sticky cart bottom end -->

    <!-- recently purchase product -->
    <!-- <div class="recently-purchase d-md-flex d-none">
        <img src="assets/images/furniture-images/new-arrival/instagram/3.jpg" class="img-fluid blur-up lazyload" alt="">
        <div class="media-body">
            <div>
                <h4>Some recently purchase this item</h4>
                <a href="javascript:void(0)">
                    <span class="product-name">
                        Floral Dress
                    </span>
                </a>
                <small class="timeAgo">50 minutes ago</small>
            </div>
        </div>
        <a href="javascript:void(0)" class="close-popup fa fa-times"></a>
    </div> -->
    <!-- recently purchase product -->


    <!-- Cart Successful Start 
    <div class="modal fade cart-modal" id="addtocart-id-<?php //echo $id; ?>" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="modal-contain">
                        <div>
                            <div class="modal-messages">
                                <i class="fas fa-check"></i> 3-stripes full-zip hoodie successfully added to your cart.
                            </div>
                            <div class="modal-product">
                                <div class="modal-contain-img">
                                    <img src="assets/images/furniture-images/new-arrival/instagram/4.jpg" class="img-fluid blur-up lazyload"
                                        alt="">
                                </div>
                                <div class="modal-contain-details">
                                    <h4>Premier Cropped Skinny Jean</h4>
                                    <p class="font-light my-2">Yellow, Qty : 3</p>
                                    <div class="product-total">
                                        <h5>TOTAL : <span>Rs. 1,140.00</span></h5>
                                    </div>
                                    <div class="shop-cart-button mt-3">
                                        <a href="shop-left-sidebar.html"
                                            class="btn default-light-theme conti-button default-theme default-theme-2 rounded">CONTINUE
                                            SHOPPING</a>
                                        <a href="cart.html"
                                            class="btn default-light-theme conti-button default-theme default-theme-2 rounded">VIEW
                                            CART</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ratio_asos mt-4">
                        <div class="container">
                            <div class="row m-0">
                                <div class="col-sm-12 p-0">
                                    <div
                                        class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space spacing-slider">
                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="product-left-sidebar.html">
                                                            <img src="assets/images/furniture-images/new-arrival/1.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">Rs. 78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="product-left-sidebar.html">
                                                            <img src="assets/images/furniture-images/new-arrival/product/front/2.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">Rs. 78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="product-left-sidebar.html">
                                                            <img src="assets/images/furniture-images/new-arrival/product/front/3.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">Rs. 78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="product-left-sidebar.html">
                                                            <img src="assets/images/furniture-images/new-arrival/product/front/4.jpg"
                                                                class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">Rs. 78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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


    <!-- 360 Degree Start -->
    <div class="modal fade shipping-modal" id="product-modal" tabindex="-1" aria-label="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel" style="padding:10px; background:#e87316"><?php echo $name ?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <div class="modal-body">
                <div class="wrapper">
                    <?php $model_url= "admin/assets/3D-models/".$model ?>
                    <model-viewer src="<?php echo $model_url ?>"
                      poster="<?php echo $img_url ?>"
                      ios-src="<?php echo $model_url ?>"
                      alt="A 3D model of an astronaut"
                      ar ar-modes="webxr scene-viewer" shadow-intensity="1" touch-action="pan-y" 
                      auto-rotate
                      camera-controls
                      style="width: 100%; height: 500px;"></model-viewer>
                        <!-- <div id="threesixty"></div> 
                        <div class="buttons-wrapper">
                            <button class="button" id="prev">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="button" id="next">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 360 Degree End -->


    <!-- Size Modal Start -->
    <div class="modal modal-size fade" id="sizemodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="assets/images/size-chart.jpg" alt="" class="img-fluid blur-up lazyload">
                </div>
            </div>
        </div>
    </div>
    <!-- Size Modal End -->

    <!-- Add To Cart Notification -->
    <div class="added-notification">
        <img src="<?php echo $img_url ?>" class="img-fluid blur-up lazyload" alt="">
        <h3><?php echo $name ?> Added to cart</h3>
    </div>
    <!-- Add To Cart Notification -->



    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>

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
                                                <h5>TOTAL : <span>Rs. <?php echo $price?></span></h5>
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

    <!-- timer js 
        <script src="assets/js/timer.js"></script> -->

        <!-- sticky cart bottom js-->
        <script src="assets/js/sticky-cart-bottom.js"></script>

        <!-- sticky cart bottom js-->
        <script src="assets/js/check-box-select.js"></script>

        <!-- 360 View Js -->
        <script src='assets/js/threesixty.js'></script>
        <script src='assets/js/custome-threesixty.js'></script>

        <!-- Zoom Js -->
        <script src="assets/js/jquery.elevatezoom.js"></script>
        <script src="assets/js/zoom-filter.js"></script>

        <!--Plugin JavaScript file-->
        <script src="assets/js/ion.rangeSlider.min.js"></script>

        <!-- Filter Hide and show Js -->
        <script src="assets/js/filter.js"></script>

        <!-- add to cart modal resize -->
        <script src="assets/js/cart_modal_resize.js"></script>

        <!-- Notify js-->
        <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>


    </body>
    </html>