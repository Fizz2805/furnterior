<?php
$page_title = 'Blog post';
require_once "header-new.php";
require_once "navbar.php";
require_once "admin/config.php";

$sql = "SELECT * FROM Blog WHERE Title = '" . $conn->real_escape_string($_GET['title']) . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$title= $row['Title'];
$date= $row['Date'];
$feature_img= $row['Featured_Img'];
$path= "admin/assets/images/blog-featured/";
$featured_img_url= $path.$feature_img;
$data = nl2br($row['Blog_Data']);

?>
<head>
	<style>
      .slick-slide{
       height: 50% !important; 
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
                    <h3><?php echo $title; ?></h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i> /
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="our-blog"> Blog / </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Details Blog Section Start -->
    <section class="masonary-blog-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-9 col-md-8 order-md-1 ratio_square">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="blog-details">
                                <div class="blog-image-box">
                                    <img src='<?php echo $featured_img_url; ?>' alt="feature-image" class="card-img-top">
                                    <div class="blog-title">
                                        <div>
                                            <div class="social-media media-center">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" target="new">
                                                    <div class="social-icon-box social-color">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </div>
                                                </a>
                                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" target="new">
                                                    <div class="social-icon-box social-color">
                                                        <i class="fab fa-twitter"></i>
                                                    </div>
                                                </a>
                                                <a href="https://www.instagram.com/create/story?url=<?php echo urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" target="new">
                                                    <div class="social-icon-box social-color">
                                                        <i class="fab fa-instagram"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="blog-detail-contain">
                                    <span class="font-light"><?php echo $date; ?></span>
                                    <h2 class="card-title"><?php echo $title; ?> </h2>
                                    <p class="font-light firt-latter"><?php echo $data; ?> </p>
                                </div>
                            </div>
                          <?php
							$admin_sql= "SELECT * FROM Admin";
                            $admin_result = $conn->query($admin_sql);
                            $admin_row = $admin_result->fetch_assoc();
                            $author= $admin_row['Name'];
                            $author_imgurl= $admin_row['Photo'];
                            $author_target_dir= 'admin/';
                            $author_img= $author_target_dir.$author_imgurl;
                          
                          ?>
                            <div class="blog-profile box-center mb-lg-5 mb-4">
                                <div class="image-profile">
                                    <img src="<?php echo $author_img; ?>"
                                        class="img-fluid blur-up lazyload" alt="author">
                                </div>

                                <div class="image-name text-weight">
                                    <h3><?php echo $author; ?></h3>
                                    <h6><?php echo $date; ?></h6>
                                </div>
                            </div>

                          <!--  <div class="row g-2">
                                <div class="col-12">
                                    <div class="minus-spacing mb-2">
                                        <h3>Leave Comments</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="fname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Enter First Name"
                                        required>
                                </div>
                                <div class="col-lg-4">
                                    <label for="lname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Enter Last Name"
                                        required>
                                </div>

                                <div class="col-lg-4">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="example@example.com" required>
                                </div>

                                <div class="col-12">
                                    <label for="textarea" class="form-label">Comments</label>
                                    <textarea rows="3" class="form-control" id="textarea"
                                        placeholder="Leave a comment here" required></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-solid-default btn-spacing mt-2">Submit</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="left-side">
                        <!-- Search Bar Start 
                        <div class="search-section">
                            <div class="input-group search-bar">
                                <input type="search" class="form-control search-input" placeholder="Search">
                                <button class="input-group-text search-button" id="basic-addon3">
                                    <i class="fas fa-search text-color"></i>
                                </button>
                            </div>
                        </div> -->
                        <!-- Search Bar End -->

                        <!-- Recent Post Start -->
                        <div class="popular-post mt-4">
                            <div class="popular-title">
                                <h3>Recent Posts</h3>
                            </div>
                            <?php 
                                $count= 0; // for showing post number
                                $sql= "SELECT * FROM Blog ORDER BY Blog_ID DESC LIMIT 4";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                $title= $row['Title'];
                                $date= $row['Date'];
                                $count= $count+1;
                            ?>
                            <div class="popular-image">
                                <div class="popular-number">
                                    <h4 class="theme-color"><?php echo $count; ?></h4>
                                </div>
                                <div class="popular-contain">
                                    <h3><a href="blog-post?title=<?php echo urlencode($title); ?>"><?php echo $title; ?></a></h3>
                                    <div class="review-box">
                                        <span class="font-light clock-time"><i data-feather="clock"></i><?php echo $date; ?></span>                                        
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- Recent Post End -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Details Blog Section End -->

    <!-- related blog start -->
    <section class="section-b-space block-shadow-space ratio3_2">
        <div class="container">
            <div class="slide-4 product-wrapper slick-lg-space">
              <?php
              $sql = "SELECT * FROM Blog LIMIT 5";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()){
                $title= $row['Title'];
                $date= $row['Date'];
                $feature_img= $row['Featured_Img'];
                $path= "admin/assets/images/blog-featured/";
                $featured_img_url= $path.$feature_img;
                $data = nl2br($row['Blog_Data']);
              
              ?>
                <div>
                    <div class="card blog-categority">
                       <a href="blog-post?title=<?php echo urlencode($title); ?>" class="blog-img">
                            <img src="<?php echo $featured_img_url ?>" alt=""
                                class="card-img-top blur-up lazyload bg-img">
                        </a>
                        <div class="card-body">
                            <a href="blog-post?title=<?php echo urlencode($title); ?>">
                                <h2 class="card-title"><?php echo $title; ?>
                                </h2>
                            </a>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
        </div>
    </section>
    <!-- related blog end -->

    <!-- footer start -->
    <?php include("footer.php"); ?>


    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->