<?php
	session_start();
	$prod_id= $_GET["id"];
	$user_id= $_SESSION["userID"];
	require_once "admin/config.php";
	
    $sql = "DELETE FROM Customer_Wishlist WHERE Product_ID = '$prod_id' AND Cust_ID='$user_id'";
    if ($conn->query($sql) === FALSE) {
      echo "Error removing: " . $conn->error;
      $conn->rollback(); // Roll back the transaction
    }
	
    // Close the database connection
    mysqli_close($conn);
	header('location: wishlist');

?>