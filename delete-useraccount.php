<?php
	session_start();
	$user_id= $_SESSION["userID"];
	require_once "admin/config.php";
	
	// Delete the customer Addresses in Customer_Saved_Addresses table
	// foreign key
    $sql = "DELETE FROM Customer_Saved_Addresses WHERE Cust_ID = '$user_id'";
    if ($conn->query($sql) === FALSE) {
      echo "Error deleting addresses: " . $conn->error;
      $conn->rollback(); // Roll back the transaction
    }
	// Delete the customer Shipping details in Customer_Shipping_Details table
	// foreign key
    $sql = "DELETE FROM Customer_Shipping_Details WHERE Cust_ID = '$user_id'";
    if ($conn->query($sql) === FALSE) {
      echo "Error deleting addresses: " . $conn->error;
      $conn->rollback(); // Roll back the transaction
    }
    // for removing image from server
	$sql= "SELECT Image FROM Customer WHERE Cust_ID= $user_id";
	$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $filename= $row['Image'];
	// Path to the uploaded profile image
        $image_path = "admin/customer-profile/{$filename}";

        // Delete the image file if it exists
        if (file_exists($image_path)) {
            unlink($image_path);
        }

	// deleting cutomer data
	$sql= "DELETE FROM Customer WHERE Cust_ID = $user_id";
    if (mysqli_query($conn, $sql)) {
      	
        echo "<script> console.log('User deleted successfully');</script>";
      	// Unset all session variables
        $_SESSION = array();
        // Destroy the session
        session_destroy();
      	header("location:index.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
	

?>