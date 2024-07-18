<?php
	$page_title= "Interior Designing";
	require_once "header-new.php";
	include "admin/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="assets/images/favicon/4.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/images/favicon/4.png">
    <meta name="theme-color" content="#e87316">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Voxo">
    <meta name="msapplication-TileImage" content="assets/images/favicon/4.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Furnterior">
    <meta name="keywords" content="Furnterior">
    <meta name="author" content="Furnterior">
    <link rel="icon" href="assets/images/favicon/4.png" type="image/x-icon">

    <!--Font Awesome 5.0-->
    <script src="https://kit.fontawesome.com/4138468106.js" crossorigin="anonymous"></script>
    <!-- Linear Icon css -->
    <link rel="stylesheet" href="admin/assets/css/linearicon.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/ratio.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/animate.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vector-map.css">

    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/slick-theme.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/style.css">

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/responsive.css">


    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- animation css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick-theme.css">

    <!-- Theme css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/demo4.css">
  
    <style>
        .page-body{
          margin-top: 50px !important;
        }
        .back{
          padding-left: 20px; padding-top: 5px;  
        }
        .back:hover{
          color: #fff;
        }
        img {
        margin-top: 20px;
        
        }
      	.image-container {
          background-size: cover;
        }
        .btn {
        display: block;
        margin: 30px auto 0 auto;
        }
      
        #imageInfoDiv {
        position: fixed;
        top: 10px;
        right: 10px;
        background-color: #fff;
        padding: 10px;
        border: 1px solid #ccc;
        z-index:999999;
        }

        .img-fluid:hover{
          background: #33363E;
        }

        .context-menu {
          position: absolute;
          z-index: 9999;
          background-color: #fff;
          border: 1px solid #ccc;
          box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .context-menu ul {
          list-style: none;
          padding: 0;
          margin: 0;
        }

        .context-menu li {
          display: block; /* Change from 'inline-block' to 'block' */
          padding: 5px 10px;
          cursor: pointer;
        }

        .context-menu li:hover {
          background-color: #f2f2f2;
        }

     /* @keyframes pulse {
        0% {
          transform: scale(1);
        }
        50% {
          transform: scale(1.1);
        }
        100% {
          transform: scale(1);
        }
      }*/

    </style>
    
</head>

<body class="theme-color4 light ltr">

        <!-- tap on top start -->
        <div class="tap-top">
            <span class="lnr lnr-chevron-up"></span>
        </div>
        <!-- tap on tap end -->
    
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">
           <!-- header start -->
			<!-- <div class="page-header">
            <div class="header-wrapper row m-0">
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                    </div>
                </div>
            </div>
            </div> -->
            <!-- Page Body Start-->
            <div class="page-body-wrapper">
              
                <!-- Page Sidebar Start-->
                <div class="sidebar-wrapper" style="z-index: 99999">                      
                <a href="http://localhost/furnterior/" class="back"> < Go Home </a>
                    <div>
                        <div class="logo-wrapper logo-wrapper-center" style="padding-top: 0px;">
                            <a href="http://localhost/furnterior/" data-bs-original-title="" title="">
                                <img class="img-fluid for-dark" src="assets/images/logo-transparent.png" alt="">
                            </a>
                            <div class="back-btn">
                                <i class="fa fa-angle-left"></i>
                            </div>
                            <!-- <div class="toggle-sidebar">
                                <i class="status_toggle middle idebar-toggle" data-feather="grid"></i>
                            </div> -->
                        </div>
                        <div class="logo-icon-wrapper">
                            <a href="http://localhost/furnterior/">
                                <img class="img-fluid main-logo" src="assets/images/logo/logo.png" alt="logo">
                            </a>
                        </div>
                        <nav class="sidebar-main">
                            <div class="left-arrow" id="left-arrow">
                                <i data-feather="arrow-left"></i>
                            </div>
    
                            <div id="sidebar-menu">
                                <ul class="sidebar-links" id="simple-bar">
                                    <li class="back-btn"></li>
                                    <li class="sidebar-main-title sidebar-main-title-3">
                                        <div>
                                            <h6 class="lan-1">Start Designing</h6>
                                            <p class="lan-2">Upload Image, Choose category,<br>Select Product and Drag & Drop<br>them on the uploaded image</p>
                                        </div>
                                    </li>
                                    <!--  SOFA -->
                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="fill:#fff !important" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 160C64 89.3 121.3 32 192 32H448c70.7 0 128 57.3 128 128v33.6c-36.5 7.4-64 39.7-64 78.4v48H128V272c0-38.7-27.5-71-64-78.4V160zM544 272c0-20.9 13.4-38.7 32-45.3c5-1.8 10.4-2.7 16-2.7c26.5 0 48 21.5 48 48V448c0 17.7-14.3 32-32 32H576c-17.7 0-32-14.3-32-32H96c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V272c0-26.5 21.5-48 48-48c5.6 0 11 1 16 2.7c18.6 6.6 32 24.4 32 45.3v48 32h32H512h32V320 272z"/></svg>
                                            <span>Sofa</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                        <li>
                                            <div class="container">
                                                <div id="image-gallery">
                                                    <div class="row sofa-row">
                                                        <?php
                                                        $sql_s = "SELECT p.Product_ID, i.Img_Url
                                                                  FROM Product p
                                                                  JOIN (
                                                                      SELECT Product_ID, MIN(image_id) AS Min_Image_ID
                                                                      FROM images
                                                                      GROUP BY Product_ID
                                                                  ) t ON p.Product_ID = t.Product_ID
                                                                  JOIN images i ON t.Product_ID = i.Product_ID AND t.Min_Image_ID = i.image_id
                                                                  WHERE p.Category = 1;
                                                                  ";
                                                        $result_s = $conn->query($sql_s);
                                                        if ($result_s->num_rows > 0) {
                                                            $img_path = "admin/assets/images/products/";
                                                            while ($row_s = $result_s->fetch_assoc()) {
                                                                $product_id = $row_s['Product_ID'];
                                                                $img_name = $row_s['Img_Url'];
                                                                $img_url = $img_path . $img_name;
                                                        ?>
                                                                <div id="widget" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                                                    <div class="image-container">
                                                                        <img src="<?php echo $img_url; ?>" alt="Image" id="active-product-<?php echo $product_id; ?>" class="img-fluid" onclick="showOtherSofas(<?php echo $product_id; ?>)" style="cursor: pointer" title="View More">
                                                                        <div id="other-sofas-container-<?php echo $product_id; ?>" style="display: none; background: #33363E" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                                                            <?php
                                                                            $sql_images = "SELECT Img_Url FROM images WHERE Product_ID = $product_id";
                                                                            $result_images = $conn->query($sql_images);
                                                                            while ($row_images = $result_images->fetch_assoc()) {
                                                                                $img_name_2 = $row_images['Img_Url'];
                                                                                $img_url_2 = $img_path . $img_name_2;
                                                                            ?>
                                                                                <img src="<?php echo $img_url_2; ?>" alt="Image" class="img-fluid" draggable="true" style="cursor: grab">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div><!-- End row -->
                                                </div><!-- End image gallery -->
                                            </div><!-- End container -->
                                        </li>
                                    </ul>

                                    <script>
                                        function showOtherSofas(productId) {
                                            var otherImagesContainer = document.getElementById("other-sofas-container-" + productId);
                                            var activeImage = document.getElementById("active-product-" + productId);
                                            // Show or hide the other images container
                                            if (otherImagesContainer.style.display === "none") {
                                                otherImagesContainer.style.display = "block";
                                                activeImage.style.border = '1px solid white';
                                                activeImage.style.borderRadius = '15px';
                                                activeImage.title="View Less";
                                            } else {
                                                otherImagesContainer.style.display = "none";
                                                activeImage.style.border = 'none';
                                                activeImage.title="View More";
                                            }
                                        }
                                    </script>
                       
                                    <!--  CHAIR -->
                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: #fff" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M248 48V256h48V58.7c23.9 13.8 40 39.7 40 69.3V256h48V128C384 57.3 326.7 0 256 0H192C121.3 0 64 57.3 64 128V256h48V128c0-29.6 16.1-55.5 40-69.3V256h48V48h48zM48 288c-12.1 0-23.2 6.8-28.6 17.7l-16 32c-5 9.9-4.4 21.7 1.4 31.1S20.9 384 32 384l0 96c0 17.7 14.3 32 32 32s32-14.3 32-32V384H352v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384c11.1 0 21.4-5.7 27.2-15.2s6.4-21.2 1.4-31.1l-16-32C423.2 294.8 412.1 288 400 288H48z"/></svg>
                                            <span>Chair</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                        <li>
                                            <div class="container">
                                                <div id="image-gallery">
                                                    <div class="row chair-row">
                                                        <?php
                                                        $sql_s = "SELECT p.Product_ID, i.Img_Url
                                                                  FROM Product p
                                                                  JOIN (
                                                                      SELECT Product_ID, MIN(image_id) AS Min_Image_ID
                                                                      FROM images
                                                                      GROUP BY Product_ID
                                                                  ) t ON p.Product_ID = t.Product_ID
                                                                  JOIN images i ON t.Product_ID = i.Product_ID AND t.Min_Image_ID = i.image_id
                                                                  WHERE p.Category = 2;
                                                                  ";
                                                        $result_s = $conn->query($sql_s);
                                                        if ($result_s->num_rows > 0) {
                                                            $img_path = "admin/assets/images/products/";
                                                            while ($row_s = $result_s->fetch_assoc()) {
                                                                $product_id = $row_s['Product_ID'];
                                                                $img_name = $row_s['Img_Url'];
                                                                $img_url = $img_path . $img_name;
                                                        ?>
                                                                <div id="widget" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                                                    <div class="image-container">
                                                                        <img src="<?php echo $img_url; ?>" alt="Image" id="active-product-<?php echo $product_id; ?>" class="img-fluid" onclick="showOtherChairs(<?php echo $product_id; ?>)" style="cursor: pointer" title="View More">
                                                                        <div id="other-chairs-container-<?php echo $product_id; ?>" style="display: none; background: #33363E" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                                                            <?php
                                                                            $sql_images = "SELECT Img_Url FROM images WHERE Product_ID = $product_id";
                                                                            $result_images = $conn->query($sql_images);
                                                                            while ($row_images = $result_images->fetch_assoc()) {
                                                                                $img_name_2 = $row_images['Img_Url'];
                                                                                $img_url_2 = $img_path . $img_name_2;
                                                                            ?>
                                                                                <img src="<?php echo $img_url_2; ?>" alt="Image" class="img-fluid" draggable="true" style="cursor: grab">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div><!-- End row -->
                                                </div><!-- End image gallery -->
                                            </div><!-- End container -->
                                        </li>
                                    </ul>

                                    <script>
                                        function showOtherChairs(productId) {
                                            var otherImagesContainer = document.getElementById("other-chairs-container-" + productId);
                                            var activeImage = document.getElementById("active-product-" + productId);
                                            // Show or hide the other images container
                                            if (otherImagesContainer.style.display === "none") {
                                                otherImagesContainer.style.display = "block";
                                                activeImage.style.border = '1px solid white';
                                                activeImage.style.borderRadius = '15px';
                                                activeImage.title="View Less";
                                            } else {
                                                otherImagesContainer.style.display = "none";
                                                activeImage.style.border = 'none';
                                                activeImage.title="View More";
                                            }
                                        }
                                    </script>
                       
                                        
                                    <!--  TABLE -->
                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: #fff" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm64 64V416H224V160H64zm384 0H288V416H448V160z"/></svg>
                                            <span>Table</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                        <li>
                                            <div class="container">
                                                <div id="image-gallery">
                                                    <div class="row table-row">
                                                        <?php
                                                        $sql_s = "SELECT p.Product_ID, i.Img_Url
                                                                  FROM Product p
                                                                  JOIN (
                                                                      SELECT Product_ID, MIN(image_id) AS Min_Image_ID
                                                                      FROM images
                                                                      GROUP BY Product_ID
                                                                  ) t ON p.Product_ID = t.Product_ID
                                                                  JOIN images i ON t.Product_ID = i.Product_ID AND t.Min_Image_ID = i.image_id
                                                                  WHERE p.Category = 4;
                                                                  ";
                                                        $result_s = $conn->query($sql_s);
                                                        if ($result_s->num_rows > 0) {
                                                            $img_path = "admin/assets/images/products/";
                                                            while ($row_s = $result_s->fetch_assoc()) {
                                                                $product_id = $row_s['Product_ID'];
                                                                $img_name = $row_s['Img_Url'];
                                                                $img_url = $img_path . $img_name;
                                                        ?>
                                                                <div id="widget" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                                                    <div class="image-container">
                                                                        <img src="<?php echo $img_url; ?>" alt="Image" id="active-product-<?php echo $product_id; ?>" class="img-fluid" onclick="showOtherTables(<?php echo $product_id; ?>)" style="cursor: pointer" title="View More">
                                                                        <div id="other-tables-container-<?php echo $product_id; ?>" style="display: none; background: #33363E" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                                                            <?php
                                                                            $sql_images = "SELECT Img_Url FROM images WHERE Product_ID = $product_id";
                                                                            $result_images = $conn->query($sql_images);
                                                                            while ($row_images = $result_images->fetch_assoc()) {
                                                                                $img_name_2 = $row_images['Img_Url'];
                                                                                $img_url_2 = $img_path . $img_name_2;
                                                                            ?>
                                                                                <img src="<?php echo $img_url_2; ?>" alt="Image" class="img-fluid" draggable="true" style="cursor: grab">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div><!-- End row -->
                                                </div><!-- End image gallery -->
                                            </div><!-- End container -->
                                        </li>
                                    </ul>

                                    <script>
                                        function showOtherTables(productId) {
                                            var otherImagesContainer = document.getElementById("other-tables-container-" + productId);
                                            var activeImage = document.getElementById("active-product-" + productId);
                                            // Show or hide the other images container
                                            if (otherImagesContainer.style.display === "none") {
                                                otherImagesContainer.style.display = "block";
                                                activeImage.style.border = '1px solid white';
                                                activeImage.style.borderRadius = '15px';
                                                activeImage.title="View Less";
                                            } else {
                                                otherImagesContainer.style.display = "none";
                                                activeImage.style.border = 'none';
                                                activeImage.title="View More";
                                            }
                                        }
                                    </script>
                                    
                                    <!--  BED -->
                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="fill:#fff" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zM176 288c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80z"/></svg>
                                            <span>Bed</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                        <li>
                                            <div class="container">
                                                <div id="image-gallery">
                                                    <div class="row bed-row">
                                                        <?php
                                                        $sql_s = "SELECT p.Product_ID, i.Img_Url
                                                                  FROM Product p
                                                                  JOIN (
                                                                      SELECT Product_ID, MIN(image_id) AS Min_Image_ID
                                                                      FROM images
                                                                      GROUP BY Product_ID
                                                                  ) t ON p.Product_ID = t.Product_ID
                                                                  JOIN images i ON t.Product_ID = i.Product_ID AND t.Min_Image_ID = i.image_id
                                                                  WHERE p.Category = 3;
                                                                  ";
                                                        $result_s = $conn->query($sql_s);
                                                        if ($result_s->num_rows > 0) {
                                                            $img_path = "admin/assets/images/products/";
                                                            while ($row_s = $result_s->fetch_assoc()) {
                                                                $product_id = $row_s['Product_ID'];
                                                                $img_name = $row_s['Img_Url'];
                                                                $img_url = $img_path . $img_name;
                                                        ?>
                                                                <div id="widget" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                                                    <div class="image-container">
                                                                        <img src="<?php echo $img_url; ?>" alt="Image" id="active-product-<?php echo $product_id; ?>" class="img-fluid" onclick="showOtherBeds(<?php echo $product_id; ?>)" style="cursor: pointer" title="View More">
                                                                        <div id="other-beds-container-<?php echo $product_id; ?>" style="display: none; background: #33363E" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                                                            <?php
                                                                            $sql_images = "SELECT Img_Url FROM images WHERE Product_ID = $product_id";
                                                                            $result_images = $conn->query($sql_images);
                                                                            while ($row_images = $result_images->fetch_assoc()) {
                                                                                $img_name_2 = $row_images['Img_Url'];
                                                                                $img_url_2 = $img_path . $img_name_2;
                                                                            ?>
                                                                                <img src="<?php echo $img_url_2; ?>" alt="Image" class="img-fluid" draggable="true" style="cursor: grab">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div><!-- End row -->
                                                </div><!-- End image gallery -->
                                            </div><!-- End container -->
                                        </li>
                                    </ul>

                                    <script>
                                        function showOtherBeds(productId) {
                                            var otherImagesContainer = document.getElementById("other-beds-container-" + productId);
                                            var activeImage = document.getElementById("active-product-" + productId);
                                            // Show or hide the other images container
                                            if (otherImagesContainer.style.display === "none") {
                                                otherImagesContainer.style.display = "block";
                                                activeImage.style.border = '1px solid white';
                                                activeImage.style.borderRadius = '15px';
                                                activeImage.title="View Less";
                                            } else {
                                                otherImagesContainer.style.display = "none";
                                                activeImage.style.border = 'none';
                                                activeImage.title="View More";
                                            }
                                        }
                                    </script>
                                    
                                    <!-- SETS -->
                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <svg xmlns="http://www.w3.org/2000/svg"  style="fill:#fff" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 48c0-26.5 21.5-48 48-48H592c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H381.3c1.8-5 2.7-10.4 2.7-16V253.3c18.6-6.6 32-24.4 32-45.3V176c0-26.5-21.5-48-48-48H256V48zM571.3 347.3c6.2-6.2 6.2-16.4 0-22.6l-64-64c-6.2-6.2-16.4-6.2-22.6 0l-64 64c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 310.6V432c0 8.8 7.2 16 16 16s16-7.2 16-16V310.6l36.7 36.7c6.2 6.2 16.4 6.2 22.6 0zM0 176c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H16c-8.8 0-16-7.2-16-16V176zm352 80V480c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V256H352zM144 320c-8.8 0-16 7.2-16 16s7.2 16 16 16h96c8.8 0 16-7.2 16-16s-7.2-16-16-16H144z"/></svg>
                                            <span>Furniture Sets</span>
                                        </a>
                                        <ul class="sidebar-submenu">
                                        <li>
                                            <div class="container">
                                                <div id="image-gallery">
                                                    <div class="row sets-row">
                                                        <?php
                                                        $sql_s = "SELECT p.Product_ID, i.Img_Url
                                                                  FROM Product p
                                                                  JOIN (
                                                                      SELECT Product_ID, MIN(image_id) AS Min_Image_ID
                                                                      FROM images
                                                                      GROUP BY Product_ID
                                                                  ) t ON p.Product_ID = t.Product_ID
                                                                  JOIN images i ON t.Product_ID = i.Product_ID AND t.Min_Image_ID = i.image_id
                                                                  WHERE p.Category = 6;
                                                                  ";
                                                        $result_s = $conn->query($sql_s);
                                                        if ($result_s->num_rows > 0) {
                                                            $img_path = "admin/assets/images/products/";
                                                            while ($row_s = $result_s->fetch_assoc()) {
                                                                $product_id = $row_s['Product_ID'];
                                                                $img_name = $row_s['Img_Url'];
                                                                $img_url = $img_path . $img_name;
                                                        ?>
                                                                <div id="widget" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                                                    <div class="image-container">
                                                                        <img src="<?php echo $img_url; ?>" alt="Image" id="active-product-<?php echo $product_id; ?>" class="img-fluid" onclick="showOtherSets(<?php echo $product_id; ?>)" style="cursor: pointer" title="View More">
                                                                        <div id="other-sets-container-<?php echo $product_id; ?>" style="display: none; background: #33363E" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                                                                            <?php
                                                                            $sql_images = "SELECT Img_Url FROM images WHERE Product_ID = $product_id";
                                                                            $result_images = $conn->query($sql_images);
                                                                            while ($row_images = $result_images->fetch_assoc()) {
                                                                                $img_name_2 = $row_images['Img_Url'];
                                                                                $img_url_2 = $img_path . $img_name_2;
                                                                            ?>
                                                                                <img src="<?php echo $img_url_2; ?>" alt="Image" class="img-fluid" draggable="true" style="cursor: grab">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div><!-- End row -->
                                                </div><!-- End image gallery -->
                                            </div><!-- End container -->
                                        </li>
                                    </ul>

                                    <script>
                                        function showOtherSets(productId) {
                                            var otherImagesContainer = document.getElementById("other-sets-container-" + productId);
                                            var activeImage = document.getElementById("active-product-" + productId);
                                            // Show or hide the other images container
                                            if (otherImagesContainer.style.display === "none") {
                                                otherImagesContainer.style.display = "block";
                                                activeImage.style.border = '1px solid white';
                                                activeImage.style.borderRadius = '15px';
                                                activeImage.title="View Less";
                                            } else {
                                                otherImagesContainer.style.display = "none";
                                                activeImage.style.border = 'none';
                                                activeImage.title="View More";
                                            }
                                        }
                                    </script>     
                                    
                                    <li class="sidebar-list">
                                        <a class="sidebar-link sidebar-title link-nav" href="" id="help-link">
                                            <i data-feather="help-circle"></i>
                                            <span>Help</span>
                                        </a>
                                    </li>
    
                                </ul>
                            </div>
                            <div class="right-arrow" id="right-arrow">
                                <i data-feather="arrow-right"></i>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Page Sidebar Ends-->
    
                <!-- index body start -->
                <div class="page-body">
                    <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-8"> <input class= "form-control form-choose" type="file" id="backgroundImageInput" accept = "image/*"> </div>
                          <div class="col-md-4"> <button class="btn btn-solid" id="download-btn" style="margin:0; margin-left:40px"> Download Image </button> </div>
                        </div>
                      <div class="row" style="margin-top: 20px;margin-bottom:50px">
                      	<div id="canvas-container"> <canvas id="canvas"></canvas> </div>
                      </div>
                    </div>
                    <!-- Container-fluid Ends-->
    
                    <!-- footer start-->
                    <div class="container-fluid ">
                        <footer class="footer fixed-bottom">
                            <div class="row">
                                <div class="col-md-12 footer-copyright text-center">
                                    <p class="mb-0">Copyright 2023 © Furnterior by Codemply</p>
                                </div>
                            </div>
                        </footer>
                    </div>
                    <!-- footer End-->
                </div>
                <!-- index body end -->
            </div>
            <!-- Page Body End -->
        </div>
        <!-- page-wrapper End-->
    
        <!-- Modal Start -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                        <p>Are you sure you want to log out?</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="button-box">
                            <button type="button" class="btn btn--no " data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn  btn--yes btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
 
<!-- CONTEXT MENU FOR MORE OPTIONS -->
  <ul id="contextMenu" class="context-menu">
    <li><a href="#" class="flip">Flip Image</a></li>
    <li><a href="#" class="delete">Delete Image</a></li>
  </ul>

</div>
<!-- index body end -->
</div>
<!-- Page Body End -->
</div>
<!-- page-wrapper End-->


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

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather/feather.min.js"></script>

    <!-- Add To Home js -->
    <script src="assets/js/pwa.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>


    <!-- Slick js-->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/slick-animation.min.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- newsletter js -->
    <script src="assets/js/newsletter.js"></script>

    <!-- add to cart modal resize -->
    <script src="assets/js/cart_modal_resize.js"></script>

    <!-- Notify js-->
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- script js -->
    <script src="assets/js/theme-setting.js"></script>
    <script src="assets/js/script.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="admin/assets/js/scrollbar/simplebar.js"></script>
    <script src="admin/assets/js/scrollbar/custom.js"></script>

    <!-- Sidebar jquery -->
    <script src="admin/assets/js/config.js"></script>

    <!-- tooltip init js -->
    <script src="admin/themes.pixelstrap.com/voxo/back-end/assets/js/tooltip-init.js"></script>

    <!-- Plugins JS -->
    <script src="admin/assets/js/sidebar-menu.js"></script>
    <script src="admin/assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="admin//assets/js/notify/index.js"></script>

    <!-- Apexchar js -->
    <script src="admin/assets/js/chart/apex-chart/apex-chart1.js"></script>
    <script src="admin/assets/js/chart/apex-chart/moment.min.js"></script>
    <script src="admin/assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="admin/assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="admin/assets/js/chart/apex-chart/chart-custom1.js"></script>

    <!-- ratio js -->
    <script src="admin/assets/js/ratio.js"></script>
	
	<!-- fabic.js  -->
	<script src="assets/js/fabric.min.js"> </script>	

    <!-- Theme js -->
    <script src="admin/assets/js/script.js"></script>

    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>

	<script>
        $(document).ready(function(){
        var offset= 5;
        $('#sofa-btn').click(function(){
        $.ajax({
        url: 'load_images.php',
        method: 'post',
        data: {offset: offset, category: 1},
        success: function(response){
        offset+= 5;
        $('.sofa-row').append(response);
        if(offset>= <?php echo $total_images; ?>){
        	$('#sofa-btn').hide();
        	}
        },
        	error: function(xhr, status, error) {
            console.log("AJAX Error: " + status + " " + error);
            }
          });
         });
        });
       </script>
<script>
        $(document).ready(function(){
        var offset= 5;
        $('#chair-btn').click(function(){
        $.ajax({
        url: 'load_images.php',
        method: 'post',
        data: {offset: offset, category: 2},
        success: function(response){
        offset+= 5;
        $('.chair-row').append(response);
        if(offset>= <?php echo $total_images; ?>){
        	$('#chair-btn').hide();
        	}
        },
        	error: function(xhr, status, error) {
            console.log("AJAX Error: " + status + " " + error);
            }
          });
         });
        });
       </script>
<script>
        $(document).ready(function(){
        var offset= 5;
        $('#table-btn').click(function(){
        $.ajax({
        url: 'load_images.php',
        method: 'post',
        data: {offset: offset, category: 4},
        success: function(response){
        offset+= 5;
        $('.table-row').append(response);
        if(offset>= <?php echo $total_images; ?>){
        	$('#table-btn').hide();
        	}
        },
        	error: function(xhr, status, error) {
            console.log("AJAX Error: " + status + " " + error);
            }
          });
         });
        });
       </script>
<script>
        $(document).ready(function(){
        var offset= 5;
        $('#bed-btn').click(function(){
        $.ajax({
        url: 'load_images.php',
        method: 'post',
        data: {offset: offset, category: 3},
        success: function(response){
        offset+= 5;
        $('.bed-row').append(response);
        if(offset>= <?php echo $total_images; ?>){
        	$('#bed-btn').hide();
        	}
        },
        	error: function(xhr, status, error) {
            console.log("AJAX Error: " + status + " " + error);
            }
          });
         });
        });
       </script>
<script>
        $(document).ready(function(){
        var offset= 5;
        $('#sets-btn').click(function(){
        $.ajax({
        url: 'load_images.php',
        method: 'post',
        data: {offset: offset, category: 3},
        success: function(response){
        offset+= 5;
        $('.sets-row').append(response);
        if(offset>= <?php echo $total_images; ?>){
        	$('#sets-btn').hide();
        	}
        },
        	error: function(xhr, status, error) {
            console.log("AJAX Error: " + status + " " + error);
            }
          });
         });
        });
       </script>

<!-- Show modal on Help -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get the help link element
    var helpLink = document.getElementById("help-link");

    // Add click event listener to the help link
    helpLink.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default link behavior

        // Show the modal
        const modal = $('#guide-modal');
        modal.modal('show');
    });
});
</script>
		<script>
         	var canvas = new fabric.Canvas('canvas');
            var input = document.getElementById('backgroundImageInput');
            var canvasContainer = document.getElementById('canvas-container');
            var imageNames = []; // Array to store images

            // Add an event listener to the input element
            input.addEventListener('change', function(e) {
              // Get the selected file from the input element
              var file = e.target.files[0];

              // Use the FileReader API to read the file and create a new Image object
              var reader = new FileReader();
              reader.onload = function(e) {
                var img = new Image();
                img.onload = function() {
                  // Create a new Fabric.js Image object and add it to the canvas
                  var fabricImg = new fabric.Image(img, {
                    selectable: false
                  });

					// setting background image size to full width & height of canvas-container
                  var scaleX = canvasContainer.clientWidth / fabricImg.width;
                  var scaleY = canvasContainer.clientHeight / fabricImg.height;
                  var scale = Math.max(scaleX, scaleY);
                  fabricImg.scale(scale);

                   canvas.setBackgroundImage(fabricImg, canvas.renderAll.bind(canvas));             
                  
                  // Get the width of the canvas container
                  var containerWidth = canvasContainer.clientWidth;
                  // Set the height of the canvas based on the aspect ratio of the image
                  var aspectRatio = fabricImg.width / fabricImg.height;
                  var canvasHeight = containerWidth / aspectRatio;
                  // Set the dimensions of the canvas to match the dimensions of the container
                  canvas.setDimensions({
                    width: containerWidth,
                    height: canvasHeight
                  });

                  
                };
                img.src = e.target.result;
              };

              reader.readAsDataURL(file);
            });
            
            
            // Add a 'drop' event listener to the canvas element
            canvas.wrapperEl.addEventListener('drop', function(event) {
              event.preventDefault();
              var file = event.dataTransfer.files[0];
              var reader = new FileReader();
              reader.onload = function(e) {
                var img = new Image();
                // Get the image file name
                var imageName = file.name;
                // Add the image name to the array
                imageNames.push(imageName);

                img.onload = function() {
                  // Calculate the maximum scale factor based on the size of the canvas-container and the image
                  var maxScaleFactor = Math.min(canvasContainer.clientWidth / img.width, canvasContainer.clientHeight / img.height);
                  // Create a new Fabric.js Image object with the scaled image
                  var fabricImg = new fabric.Image(img, {
                    scaleX: maxScaleFactor,
                    scaleY: maxScaleFactor,
                    hasControls: true, // enable default controls
                    cornerStyle: 'square', // set corner style to 'circle' for a circular control
                    cornerSize: 15, // set the size of the corner controls
                    image: imageName, // Set the image name as a custom property
                  });

                    fabric.Object.prototype.transparentCorners = false;
                    fabric.Object.prototype.cornerColor = 'black';

                    // Override the setControlsVisibility method to disable rotation control
                    fabricImg.setControlsVisibility = function(options) {
                    options = options || {};
                    options.mtr = false; // disable rotation control
                    fabric.Object.prototype.setControlsVisibility.call(this, options);
                    };

                    // Set corner controls to be visible only on the corners
                    fabricImg.setControlsVisibility({
                    mt: false, // middle top
                    mb: false, // middle bottom
                    ml: false, // middle left
                    mr: false, // middle right
                    bl: true, // bottom left
                    br: true, // bottom right
                    tl: true, // top left
                    tr: true, // top right
                    });

                  // Add the image to the canvas
                  canvas.add(fabricImg);

                  canvas.setActiveObject(fabricImg); // Select the image

                };
                img.src = e.target.result;
                
              };
              console.log(imageNames);
              reader.readAsDataURL(file);
            });


            // Prevent the default behavior for the 'dragover' event
            canvas.wrapperEl.addEventListener('dragover', function(event) {
              event.preventDefault();
            });
          
          canvas.on({
              'object:moving': function(e) {
                e.target.opacity = 0.5;
              },
              'object:modified': function(e) {
                e.target.opacity = 1;
              }
            });
            
            // Get a reference to the download button
            var downloadButton = document.getElementById('download-btn');
            // Add a click event listener to the download button
            downloadButton.addEventListener('click', function() {
              // Get the canvas data URL
              var dataURL = canvas.toDataURL();

              // Create a new anchor element with the download attribute set to the image file name
              var anchor = document.createElement('a');
              anchor.download = 'interior-design.png';

              // Set the href property of the anchor element to the canvas data URL
              anchor.href = dataURL;

              // Click the anchor element to trigger the download
              anchor.click();
              // retrieve the names of images on the canvas
         /* var imageNames = [];
          canvas.forEachObject(function(obj) {
            if (obj.type === 'image') {
              imageNames.push(obj.name);
            }
          });

          console.log(imageNames);*/
            });
          
          // disable default context menu
    canvas.wrapperEl.oncontextmenu = function(e) {
      e.preventDefault();
    };

    // add event listener for right-click on canvas
    canvas.wrapperEl.addEventListener('mousedown', function(e) {
        e.preventDefault(); // prevent default context menu from showing up
        if (e.button === 2) { // if right-click
            var selectedObject = canvas.getActiveObject();
            if (selectedObject) { // if an object is selected
            var contextMenu = document.getElementById('contextMenu');
            contextMenu.style.display = 'block';
            contextMenu.style.left = e.clientX + 'px';
            contextMenu.style.top = e.clientY + 'px';
            contextMenu.addEventListener('click', function(e) {
                if (e.target.classList.contains('delete')) { // if delete option is clicked
                canvas.remove(selectedObject); // remove selected object from canvas
                } else if (e.target.classList.contains('flip')) { // if flip option is clicked
                selectedObject.set('flipX', !selectedObject.flipX); // flip the image horizontally
                canvas.renderAll();
                }
                contextMenu.style.display = 'none'; // hide context menu
            });
            }
        } else { // if other mouse button is clicked
            var contextMenu = document.getElementById('contextMenu');
            contextMenu.style.display = 'none'; // hide context menu
        }
        });


        </script>

        <script>
            // Add event listener for keydown event on the document
            document.addEventListener('keydown', function(event) {
              // Check if the Delete key is pressed (keyCode 46)
              if (event.keyCode === 46) {
                // Get the active object on the canvas
                var activeObject = canvas.getActiveObject();
                
                // Check if the active object is an image
                if (activeObject && activeObject.type === 'image') {
                  // Remove the active image from the canvas
                  canvas.remove(activeObject);
                  
                  // You can also remove the image from your array if needed
                  var index = imageArray.indexOf(activeObject.get('imageName'));
                  if (index !== -1) {
                    imageArray.splice(index, 1);
                  }
                }
              }
            });

            canvas.on('mouse:down', function(event) {
                var selectedObject = event.target;
                var imageInfoDiv = document.getElementById('imageInfoDiv');

                if (selectedObject && selectedObject.type === 'image') {
                    var imageName = selectedObject.get('image');
                    $.ajax({
                        url: 'get_product_id.php',
                        method: 'POST',
                        data: { imageName: imageName },
                        success: function(response) {
                        // Replace the div content with the server-generated HTML code
                        $('#imageInfoDiv').html(response);
                        $('#imageInfoDiv').show(); // Show the div if hidden
                        },
                        error: function(xhr, status, error) {
                            console.error(error); // Handle error case
                        }
                    });
                } else {
                    imageInfoDiv.style.display = 'none';
                }
            });

            canvas.on('selection:cleared', function() {
            var imageInfoDiv = document.getElementById('imageInfoDiv');
            imageInfoDiv.style.display = 'none';
            });


        </script>

<div id="imageInfoDiv" style="display:none">Hello World! This is a random text.</div>

<!-- SHOW MODAL of Instructions -->
 <div class="modal modal-size fade" id="guide-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="width: max-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" >
                    <h5> Guide to use the Interior Designing </h5>
                  	<video src="assets/videos/interior-design-guide.webm" autoplay controls width="640" height="360"></video><br><br>
                    <input class="checkbox_animated check-it" type="checkbox" id="dont-show-modal" name="dont-show-modal">
                    <label class="form-check-label checkout-label" for="flexCheckDefault11">Don't show this again</label>
                </div>
            </div>
        </div>
    </div>
<script>
  $(document).ready(function() {
    const checkbox = document.getElementById('dont-show-modal');
    const modal = $('#guide-modal');

    // Check if the checkbox is already checked in local storage
    const isModalShown = localStorage.getItem('isModalShown');
    if (isModalShown === 'false') {
      modal.modal('hide');
    } else {
      modal.modal('show');
    }

    // Listen for the change event on the checkbox
    checkbox.addEventListener('change', function() {
      // Store the state of the checkbox in local storage
      localStorage.setItem('isModalShown', !this.checked);
    });
  });

</script>


</body>
</html>
