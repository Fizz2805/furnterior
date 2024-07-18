<?php
$page_title = 'Our Blog';
require_once "header-new.php";
require_once "navbar.php";
require_once "admin/config.php";
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
                    <h3>Blog</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>/
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Masonary Blog Section Start -->
    <section class="masonary-blog-section section-b-space">
        <div class="container">
            <div class="row g-4 filter-gallery mt-3 grid">

                <?php
                    $admin_sql= "SELECT * FROM Admin";
                    $admin_result = $conn->query($admin_sql);
                    $admin_row = $admin_result->fetch_assoc();
                    $author= $admin_row['Name'];
                    $author_imgurl= $admin_row['Photo'];
                    $author_target_dir= 'admin/';
                    $author_img= $author_target_dir.$author_imgurl;

                    $sql= "SELECT * FROM Blog";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) {
                            $blog_id= $row['Blog_ID'];
                            $blog_title= $row['Title'];
                            $blog_excerpt= substr($row['Blog_Data'], 0, 80)."...";
                            $blog_date= $row['Date'];
                            // Getting Featured Image                                                          	
                            $imageURL = $row['Featured_Img'];
                            $target_dir= 'admin/assets/images/blog-featured/';
                            $featured_img= $target_dir.$imageURL;
                ?>
                <div class="grid-item col-lg-3 col-md-4 col-sm-6">
                    <div class="card masonary-blog">
                        <a href="blog-post?title=<?php echo urlencode($blog_title); ?>">
                            <img src="<?php echo $featured_img; ?>" alt="blog-featured-image"
                                class="card-img-top blur-up lazyload">
                        </a>
                        <div class="card-body">
                            <a href="blog-post?title=<?php echo urlencode($blog_title); ?>">
                                <h2 class="card-title"><?php echo $blog_title; ?></h2>
                            </a>
                            <p class="font-light"><?php echo $blog_excerpt; ?></p>
                            <div class="blog-profile">
                                <div class="image-profile">
                                    <img src="<?php echo $author_img ?>" class="img-fluid blur-up lazyload" alt="">
                                </div>

                                <div class="image-name">
                                    <h3><?php echo $author; ?></h3>
                                    <h6><?php echo $blog_date; ?></h6>
                                </div>
                            </div>
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
    <!-- Masonary Blog Section End -->

    <?php include("footer.php"); ?>

 
    <!-- tap to top Section Start -->
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- tap to top Section End -->

    <div class="bg-overlay"></div>