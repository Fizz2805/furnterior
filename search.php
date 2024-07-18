<?php
require_once "admin/config.php";
// Get the search query from the AJAX request
$search_query = $_POST['search_query'];

// Sanitize the search query to prevent SQL injection
$search_query = mysqli_real_escape_string($conn, $search_query);

// Query the database to find matching results from products table
$sql = "SELECT * FROM Product WHERE Name LIKE '%$search_query%'";
$result = mysqli_query($conn, $sql);

// Build the HTML for the search results
if (mysqli_num_rows($result) > 0) {
  $html = "<ul class='custom-scroll'> ";
  while ($row = mysqli_fetch_assoc($result)) {
     $product_id =$row['Product_ID'];
     $sql2 = "SELECT Img_Url FROM Images WHERE Product_ID = $product_id LIMIT 1";
     $result2 = mysqli_query($conn, $sql2);
     $row2 = mysqli_fetch_assoc($result2);
     $image_data = $row2['Img_Url'];
     $img_dir= "admin/assets/images/products/";
     $img_url= $img_dir.$image_data;
    // Display a product card for each matching result
    $html .= "<li>
               <div class='product-cart media'>
                 <a href='product?id=" . $product_id . "'><img src='" . $img_url . "' class='img-fluid blur-up lazyload' alt='" . $row['Name'] . "'></a>
                 <div class='media-body'>
                   <a href='product?id=" . $product_id . "'>
                     <h6 class='mb-1'>" . $row['Name'] . "</h6>
                   </a>
                   <p class='mb-0 mt-1'>Rs. " . $row['Cost'] . "</p>
                 </div>
               </div>
             </div>
             </li>";
  }
  $html .= "</div></ul>";
} else {
  // Display a message if there are no matching results
  $html = "<p>No results found.</p>";
}

// Return the search results HTML to the AJAX request
echo $html;
?>
