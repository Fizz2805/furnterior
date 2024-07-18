<?php
require_once "admin/config.php";
// Retrieve user data from the form
if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
        $rating = $_POST['rating'];
		$email = $_POST['email'];
      	$mssg = $_POST['comment'];
  		$id = $_POST['id'];
      	// Get current date in D M Y format
        $currentDate = date('F d Y');
        // Convert date to string
        $dateString = strtotime($currentDate);
        $varcharDate = date('F d Y', $dateString);
		// Escape the data to prevent SQL injection
		$name = $conn->real_escape_string($name);
		$email = $conn->real_escape_string($email);
    	$mssg = $conn->real_escape_string($mssg);
	
		// Insert user data into the database
		$sql = "INSERT INTO Product_Review (Name, Stars, Comment, Email, Date, Product_ID) VALUES ('$name', '$rating', '$mssg', '$email', '$varcharDate', $id)";
		$result = $conn->query($sql);

    // Check for errors
    if (!$result) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    } else{
     	header("location: product?id=$id"); 
    }

    // Close connection
    $conn->close();
 }
?>