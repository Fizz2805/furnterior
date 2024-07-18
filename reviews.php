<?php
$page_title = 'Reviews';
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
                    <h3>Reviews</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i> /
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Reviews</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- Review Section Start -->
    <section class="review-section section-b-space">
        <div class="container">          
            <div class="row g-4 grid">
            <?php
                $sql = "SELECT * FROM Reviews";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $name= $row['Name'];
                        $mssg= $row['Message'];
                        $star= $row['Rating'];
            ?>
                <div class="grid-item col-lg-4 col-sm-6">
                  
                    <div class="review-box">
                        <div class="review-name">
                            <p> <?php echo $mssg; ?></p>
                        </div>
                        <div class="review-image">
                      
                            <i class="fas fa-quote-right"></i>
                            <div class="image-name">
                                <h3><?php echo $name; ?></h3>
                                <ul class="rating">
                                  <?php
                            		$count= 0;
                            		while($count<$star){
                                      echo "<li>
                                        	<i class='fas fa-star theme-color'></i>
                                    		</li>";  
                                      $count= $count + 1;
                                    }
                            		
                            	  ?>
                                    
                                    
                                </ul>
                            </div>
               
                        </div>
               
                    </div>
                         
                </div>
                <?php  }
               }
             ?>
            </div>
               
        </div>
    </section>
    <!-- Review Section End -->



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