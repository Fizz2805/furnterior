<?php
include_once "admin/config.php";

// Retrieve the imageName parameter sent via POST
$imageName = $_POST['imageName'];

// Retrieve the product ID from the database
$query = "SELECT Product_ID FROM images WHERE Img_Url = '$imageName'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $productId = $row['Product_ID'];

  // Retrieve additional product information
  $query = "SELECT Weight, Dimensions FROM Product WHERE Product_ID = $productId";
  $result = $conn->query($query);

  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $weight = $row['Weight'];
    $dimensions = $row['Dimensions'];

    $divHTML = '<div id="imageInfoDiv" style="display:block;z-index:99999">Weight: ' . $weight . '<br/> Dimensions: ' . $dimensions . '</div>';
    echo $divHTML;
  } else {
    // Return an empty response or an error message
    echo "Something went wrong";
  }
} else {
  // Return an empty response or an error message
  echo "Something went wrong";
}

$conn->close();
?>
