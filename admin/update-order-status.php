<?php
require_once "config.php";
// get POST data
$status = $_POST['status'];
$orderId = $_POST['orderId'];
// Get current date in D M Y format
$currentDate = date('F d Y');
$dateString = strtotime($currentDate);
$date = date('F d Y', $dateString);

if($status== "Shipped") $sql = "UPDATE Orders SET Status = '$status', Ship_Date = '$date' WHERE Order_ID = $orderId";
else if($status== "Delivered") $sql = "UPDATE Orders SET Status = '$status', Deliver_Date = '$date' WHERE Order_ID = $orderId";
if (mysqli_query($conn, $sql)) {
  // send updated order status back to frontend
  echo "<button class='success-button btn btn-sm' type='button'>" . $status . "</button>";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

?>
