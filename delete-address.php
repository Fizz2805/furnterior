<?php
	session_start();
	require_once "admin/config.php";

	if(isset($_GET["ship-addr"])){
		$addr_id= $_GET["ship-addr"];
      	$sql = "DELETE FROM Customer_Shipping_Details WHERE Shipping_ID = '$addr_id'";
        if ($conn->query($sql) === FALSE) {
          echo "Error deleting address: " . $conn->error;
          $conn->rollback(); // Roll back the transaction
        }
	
      
    }
	else {
      	$addr_id= $_GET["bill-addr"];
      	$sql = "DELETE FROM Customer_Billing_Details WHERE Billing_ID = '$addr_id'";
        if ($conn->query($sql) === FALSE) {
          echo "Error deleting address: " . $conn->error;
          $conn->rollback(); // Roll back the transaction
        }
    }
    
    // Close the database connection
    mysqli_close($conn);
	header('location: user-dashboard');

?>