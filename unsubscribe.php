<?php
	session_start();
	require_once "admin/config.php";
	$sub_id= $_GET['id'];
	$sql= "DELETE FROM Subscribers WHERE Sub_ID = $sub_id";
    if (mysqli_query($conn, $sql)) {
        echo "<script> console.log('User unsubscribed successfully');</script>";
      	header("location:user-dashboard");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
	

?>