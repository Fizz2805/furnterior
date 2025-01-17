<?php
session_start();
$count = 0;
if(isset($_SESSION["userLoggedIn"]))
{
    $user_id= $_SESSION["userID"];
    require_once "admin/config.php";
    $sql= "SELECT * FROM Customer WHERE Cust_ID = $user_id";
    $result= $conn->query($sql);
    $row= mysqli_fetch_assoc($result);
    $image_data = $row['Image'];
    $img_dir= "admin/customer-profile/";
    $img_url= $img_dir.$image_data;

    // Get the wishlist data from the database
     $sql = "SELECT COUNT(*) AS count, GROUP_CONCAT(Product.Name SEPARATOR ', ') AS items
     FROM Customer_Wishlist
     JOIN Product ON Customer_Wishlist.Product_ID = Product.Product_ID
     WHERE Customer_Wishlist.Cust_ID = $user_id";
     $result = $conn->query($sql);
     $row = mysqli_fetch_assoc($result);
     $count = $row['count'];
     $items = $row['items'];
}

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
    <title><?php echo $page_title; ?> - Furnterior</title>

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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<style>
      @media only screen and (max-width: 768px) {
      .profile-dropdown{
        width: 100% !important;
      }
      }
  </style>
</head>

<body class="theme-color2 light ltr">