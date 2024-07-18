<?php
$page_title = 'About Us';
require_once "header-new.php";
require_once "navbar.php";
require_once "admin/config.php";
?>

<head>

<style>
      .slick-slide{
       height: 80% !important; 
      }
  </style>
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
                    <h3>About Us</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

 <!-- team leader section Start -->
    <section class="overflow-hidden">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-5 offset-xl-1">
                    <div class="row g-3">
                        <div class="col-md-6">
                           <img src="assets/images/inner-page/about/11.jpg"
                                class="img-fluid rounded-3 about-image" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="assets/images/inner-page/about/22.jfif"
                                class="img-fluid rounded-3 about-image" alt="">
                        </div>
                        <div class="col-12 ratio_40">
                            <div>
                                <img src="assets/images/inner-page/about/44.png"
                                    class="img-fluid rounded-3 team-image bg-img" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="about-details">
                        <div>
                            <h2>WHO WE ARE</h2>
                            <h3>Largest Furniture Store</h3>
                            <p> Welcome to our interior design-inspired e-commerce furniture website! We are dedicated to bringing you the latest and greatest in furniture design, curated by our team of interior design experts. </p>
                            <p> Whether you're looking for that perfect accent piece or a complete room makeover, we've got you covered. With a wide selection of styles and prices, our goal is to make it easy and fun to create your dream home. So come explore our site and let us help you bring your vision to life!
                            </p>
                            <button onclick="location.href = 'shop';" type="button"
                                class="btn btn-solid-default">Shop Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team leader section End --> 

    <!-- service section start -->
    <section class="service-section about-page service-style-2 section-b-space">
        <div class="container">
            <div class="row g-4 g-sm-3">
                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#customer"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Customer Servcies</h3>
                            <span class="font-light">Top notch customer service.</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#shop"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Pickup At Any Store</h3>
                            <span class="font-light">Free shipping on orders over $65.</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#secure-payment"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Secured Payment</h3>
                            <span class="font-light">We accept all major credit cards.</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#return"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Free Returns</h3>
                            <span class="font-light">30-days free return policy.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->

    <!-- Leader section start -->
    <!-- <section class="section-b-space team-leader-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title title1 text-center">
                        <h2>Meet Our Team</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero assumenda hic porro odio
                            voluptas qui quod sed.</p>
                    </div>
                </div>
            </div>
            <div class="product-wrapper leader-section slick-lg-space slide-5_1 ratio_asos">
                <div>
                    <div class="leader-contain">
                        <div class="leader-image">
                            <img src="assets/images/inner-page/review-image/1.jpg" class="img-fluid bg-img" alt="">
                            <ul class="social-media">
                                <li>
                                    <a href="www.facebook.html">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="www.twitter.html">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="www.google.html">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="leader-contain">
                            <h3>Jonathan Warner</h3>
                            <h6>CEO</h6>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="leader-contain">
                        <div class="leader-image">
                            <img src="assets/images/inner-page/review-image/2.jpg" class="img-fluid bg-img" alt="">
                            <ul class="social-media">
                                <li>
                                    <a href="www.facebook.html">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="www.twitter.html">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="www.google.html">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="leader-contain">
                            <h3>Jonathan Warner</h3>
                            <h6>CEO</h6>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="leader-contain">
                        <div class="leader-image">
                            <img src="assets/images/inner-page/review-image/3.jpg" class="img-fluid bg-img" alt="">
                            <ul class="social-media">
                                <li>
                                    <a href="www.facebook.html">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="www.twitter.html">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="www.google.html">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="leader-contain">
                            <h3>Jonathan Warner</h3>
                            <h6>CEO</h6>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="leader-contain">
                        <div class="leader-image">
                            <img src="assets/images/inner-page/review-image/4.jpg" class="img-fluid bg-img" alt="">
                            <ul class="social-media">
                                <li>
                                    <a href="www.facebook.html">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="www.twitter.html">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="www.google.html">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="leader-contain">
                            <h3>Jonathan Warner</h3>
                            <h6>CEO</h6>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="leader-contain">
                        <div class="leader-image">
                            <img src="assets/images/inner-page/review-image/5.jpg" class="img-fluid bg-img" alt="">
                            <ul class="social-media">
                                <li>
                                    <a href="www.facebook.html">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="www.twitter.html">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="www.google.html">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="leader-contain">
                            <h3>Jonathan Warner</h3>
                            <h6>CEO</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- leader section End -->

    <!-- testimonial section start -->
    <section class="testimonial-section section-b-space" style="margin-bottom: 170px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title title1 text-center">
                        <h2>Testimonials</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider product-wrapper slide-3-1 slick-lg-space">
                <?php
                    $sql = "SELECT * FROM Reviews";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $name = $row["Name"]; 
                            $mssg = $row["Message"]; 
                            $star= $row["Rating"];
                ?>
                <div>
                    <div class="testimonial-contain">
                       <!-- <div class="textimonial-image">
                            <img src="assets/images/inner-page/review-image/1.jpg" class="img-fluid" alt="">
                        </div> -->
                        <h5><strong><?php echo $name;  ?></strong> </h5>
                        <div class="testimonial-details">
                            <ul class="rating">
                    <?php
                            switch($star){ 
                                case 1:
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";
                                  echo "<li><i class='fas fa-star'></i></li>";   
                                  echo "<li><i class='fas fa-star'></i></li>"; 
                                  echo "<li><i class='fas fa-star'></i></li>"; 
                                  echo "<li><i class='fas fa-star'></i></li>"; 
                                case 2:
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";  
                                  echo "<li><i class='fas fa-star theme-color'></i></li>"; 
                                  echo "<li><i class='fas fa-star'></i></li>"; 
                                  echo "<li><i class='fas fa-star'></i></li>"; 
                                  echo "<li><i class='fas fa-star'></i></li>"; 
                                  break;
                                case 3:
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";  
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";
                                  echo "<li><i class='fas fa-star'></i></li>"; 
                                  echo "<li><i class='fas fa-star'></i></li>"; 
                                  break;
                                case 4:
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";  
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";  
                                  echo "<li><i class='fas fa-star theme-color'></i></li>"; 
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";
                                  echo "<li><i class='fas fa-star'></i></li>"; 
                                  break;
                                case 5:
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";  
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";  
                                  echo "<li><i class='fas fa-star theme-color'></i></li>"; 
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";
                                  echo "<li><i class='fas fa-star theme-color'></i></li>";
                                  break;
                              }
                    ?>
                            </ul>
                            <h5 class="details-images"><i class="fas fa-quote-left"></i><?php echo $mssg; ?><i class="fas fa-quote-right"></i></h5>
                            
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }

                ?>
            </div>
        </div>
    </section>
    <!-- testimonial section end -->


 <!-- FAQ Section Start -->
 <section class="faq-section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title title1 text-center">
                    <h2>FAQ</h2>
                </div>
            </div>
        </div>
        <!--<div class="row g-lg-5 g-4">
            <div class="col-md-4 zi-1">
                <div class="faq-contain">
                    <div class="faq-image">
                        <img src="assets/images/inner-page/faq/guides.png" class="img-fluid blur-up lazyload"
                            alt="">
                    </div>
                    <h2>Guides</h2>
                    <h5>Guides related to buying products, latest trends, upcoming products.</h5>
                </div>
            </div>

            <div class="col-md-4 zi-1">
                <div class="faq-contain">
                    <div class="faq-image">
                        <img src="assets/images/inner-page/faq/faq.png" class="img-fluid blur-up lazyload" alt="">
                    </div>
                    <h2>FAQ</h2>
                    <h5>Need some help with your order or gor a question that you need answered.</h5>
                </div>
            </div>

            <div class="col-md-4 zi-1">
                <div class="faq-contain">
                    <div class="faq-image">
                        <img src="assets/images/inner-page/faq/community.png" class="img-fluid blur-up lazyload"
                            alt="">
                    </div>
                    <h2>Community</h2>
                    <h5>Join our large community who will help you in any query.</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ Section End -->

<!-- FAQ details start -->
<section class="faq-details section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="faq-link-box">
                    <ul>
                        <li>
                            <a href="#1">
                                <h4>1.</h4>
                                <h5>How does it work?</h5>
                            </a>
                        </li>
                        <li>
                            <a href="#2">
                                <h4>2.</h4>
                                <h5> How can I track my order?</h5>
                            </a>
                        </li>
                        <li>
                            <a href="#3">
                                <h4>3.</h4>
                                <h5>What materials are your furniture pieces made from?</h5>
                            </a>
                        </li>
                        <li>
                            <a href="#4">
                                <h4>4.</h4>
                                <h5>Do you offer assembly or installation services?</h5>
                            </a>
                        </li>
                        <li>
                            <a href="#5">
                                <h4>5.</h4>
                                <h5>Can I return or exchange my furniture?</h5>
                            </a>
                        </li>
                        <li>
                            <a href="#6">
                                <h4>6.</h4>
                                <h5>How long will it take for my furniture to be delivered?</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-8">
                <div class="faq-heading" id="1">
                    <i data-feather="help-circle" class="theme-color"></i>
                    <div class="faq-option">
                        <h3>How does it work?</h3>
                        <h6 class="font-light">When choosing a static caravan you will probably look for the holiday
                            park which meets
                            your requirements and the move onto the caravan selection the right holiday park is
                            vital to ensure a long term ownership.</h6>
                    </div>
                </div>

                <div class="faq-heading" id="2">
                    <i data-feather="help-circle" class="theme-color"></i>
                    <div class="faq-option">
                        <h3>How can I track my order?</h3>
                        <h6 class="font-light">Once your order has been processed and shipped, you'll receive an email with tracking information. You can also log in to your account to view the status of your order and track its delivery. If you have any questions about your order's status, please contact our customer service team.</h6>
                    </div>
                </div>

                <div class="faq-heading" id="3">
                    <i data-feather="help-circle" class="theme-color"></i>
                    <div class="faq-option">
                        <h3> What materials are your furniture pieces made from?</h3>
                        <h6 class="font-light">Our furniture is made from a variety of materials, including wood, metal, glass, and plastic. Each item's material is listed in its product description. If you have questions about a specific item's materials, please contact our customer service team.</h6>
                    </div>
                </div>

                <div class="faq-heading" id="4">
                    <i data-feather="help-circle" class="theme-color"></i>
                    <div class="faq-option">
                        <h3>Do you offer assembly or installation services?</h3>
                        <h6 class="font-light">We offer assembly services for select items. If assembly is available for the item you've purchased, you'll see an option to add it to your cart during checkout. We do not offer installation services for any items..</h6>
                    </div>
                </div>

                <div class="faq-heading" id="5">
                    <i data-feather="help-circle" class="theme-color"></i>
                    <div class="faq-option">
                        <h3>Can I return or exchange my furniture?</h3>
                        <h6 class="font-light">Yes, we have a 30-day return policy for most items. If you're not completely satisfied with your purchase, you can return it for a refund or exchange.</h6>
                    </div>
                </div>

                <div class="faq-heading" id="6">
                    <i data-feather="help-circle" class="theme-color"></i>
                    <div class="faq-option">
                        <h3>How long will it take for my furniture to be delivered?</h3>
                        <h6 class="font-light"> Delivery times vary depending on your location and the type of furniture you've ordered. Once your order has been processed and shipped, you'll receive an email with tracking information.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ details end -->

      <!-- footer start -->
      <?php include("footer.php"); ?>
    <!-- footer end -->


    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>
