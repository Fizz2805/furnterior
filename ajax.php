<?php
session_start();
require_once "admin/config.php";
if (isset($_SESSION["userID"])) 
{
	$user_id= $_SESSION["userID"];
	$sql= "SELECT * FROM Customer WHERE Cust_ID = $user_id";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$name= $row['Full_Name'];
		$email= $row['Email'];  
		$phone= $row['Phone_No']; 
		$address= $row['Address'];
		$img= $row['Image'];
	}
}


function get_wishlist_count_for_user($user_id) {
	global $conn;

    // Query the database to get the count of items in the user's wishlist
	$sql = "SELECT COUNT(*) AS count FROM Customer_Wishlist WHERE Cust_ID = $user_id";
	$result = $conn->query($sql);

    // Check if the query was successful
	if ($result === FALSE) {
		die('Error getting wishlist count: ' . $conn->error);
	}

    // Extract the count from the query result
	$row = $result->fetch_assoc();
	$count = $row['count'];

    // Close the database connection
    // $conn->close();

	return $count;
}


if (isset($_GET['action'])) 
{
	if ($_GET['action']=='update_profile') 
	{
        // Retrieve user data from the form
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		if(isset($_FILES['image'])) {
            // New image has been uploaded
			$image_name = $_FILES['image']['name'];
			$image_type = $_FILES['image']['type'];
			$image_size = $_FILES['image']['size'];
			$image_temp = $_FILES['image']['tmp_name'];

          	// Check if the file is an image
			if(!preg_match("/\.(jpeg|gif|jpg|png)$/i", $image_name)) {
				echo "<script>alert('Error: The file you uploaded is not an image.');</script>";
			} else {
				// Upload the image to the server              	
				$target_dir= 'admin/customer-profile/';
				$target_path =  $target_dir. basename($image_name);

				if (file_exists($target_path)) {
                    // The file already exists in the target directory, so you can display an error message or take other appropriate action
					echo "<script> alert('Sorry, a file with that name already exists.')</script>";
				}
				else {
					move_uploaded_file($image_temp, $target_path);
					$img= $image_name;
				}


			}

		}
		else {
            // The image has not been uploaded

		}


  		        // Escape the data to prevent SQL injection
		$name = $conn->real_escape_string($name);
		$phone = $conn->real_escape_string($phone);
		$address = $conn->real_escape_string($address);
		$email = $conn->real_escape_string($email);

		$update_query = "UPDATE `Customer` SET `Full_Name`='$name',`Email`='$email',`Address`='$address',`Phone_No`='$phone',`Image`='$img' WHERE Cust_ID=$user_id";

		if ($conn->query($update_query) === TRUE) {
			echo  'Your account has been updated successfully!'; 
			echo "<meta http-equiv='refresh' content='2;url=user-dashboard'>"; 

		} else {
			echo 'Error updating record: ' . $conn->error;
		}
	} 
} else {
	echo 'Error: User not found';
}

        // UPDATE LOGIN DETAILS
if ($_GET['action']=='update_login_details') 
{
                // Retrieve user data from the form
	$email = $_POST['login_email'];
	$password = $_POST['login_password'];
  		        // Escape the data to prevent SQL injection
	$email = $conn->real_escape_string($email);

	$encrypted_password = password_hash($password, PASSWORD_BCRYPT);
	$update_query = "UPDATE `Customer` SET `Email`='$email',`Password`='$encrypted_password' WHERE Cust_ID=$user_id";

	if ($conn->query($update_query) === TRUE) {
		echo  'Your account details have been updated successfully!'; 
		echo "<meta http-equiv='refresh' content='2;url=user-dashboard'>"; 

	} else {
		echo 'Error updating record: ' . $conn->error;
	}
} 

/*		// ADD NEW ADDRESS
if ($_GET['action']=='add_address') 
{
                // Retrieve user data from the form
	$name = $_POST['name'];
	$address = $_POST['address'];
	$label = $_POST['label'];
	$phone = $_POST['phone'];
  		        // Escape the data to prevent SQL injection
	$email = $conn->real_escape_string($email);
	$address = $conn->real_escape_string($address);
	$label = $conn->real_escape_string($label);
	$phone = $conn->real_escape_string($phone);

	$sql = "INSERT INTO Customer_Saved_Addresses (Cust_ID,Full_Name,Address,Label,Phone_No) VALUES ($user_id,'$name','$address','$label','$phone')";

	if ($conn->query($sql) === TRUE) {
		echo  'New Address has been added successfully!'; 
		echo "<meta http-equiv='refresh' content='2;url=user-dashboard'>"; 

	} else {
		echo 'Error updating record: ' . $conn->error;
	}
} 
*/
		// EDIT SHIPPING ADDRESS
if ($_GET['action']=='edit_address') 
{		
	$addr_id= $_POST['address_id'];
                // Retrieve user data from the form
	$fname = $conn->real_escape_string($_POST['edit_fname']);
  	$lname = $conn->real_escape_string($_POST['edit_lname']);
	$address = $conn->real_escape_string($_POST['edit_address']);
  	$city = $conn->real_escape_string($_POST['edit_city']);
	$zip = $conn->real_escape_string($_POST['edit_zip']);
	$phone = $conn->real_escape_string($_POST['edit_phone']);

	$sql = "UPDATE Customer_Shipping_Details SET  First_Name= '$fname', Last_Name= '$lname',Address1= '$address', City= '$city', Zip= $zip ,Phone_No='$phone' WHERE Shipping_ID= $addr_id";

	if ($conn->query($sql) === TRUE) {
		echo  'Your Address has been updated successfully!'; 
		echo "<meta http-equiv='refresh' content='2;url=user-dashboard'>"; 

	} else {
		echo 'Error updating record: ' . $conn->error;
	}
}

		// EDIT BILLING ADDRESS
if ($_GET['action']=='edit_billing_address') 
{		
	$addr_id= $_POST['address_id'];
                // Retrieve user data from the form
	$fname = $conn->real_escape_string($_POST['edit_fname']);
  	$lname = $conn->real_escape_string($_POST['edit_lname']);
	$address = $conn->real_escape_string($_POST['edit_address']);
  	$city = $conn->real_escape_string($_POST['edit_city']);
	$zip = $conn->real_escape_string($_POST['edit_zip']);
	$phone = $conn->real_escape_string($_POST['edit_phone']);

	$sql = "UPDATE Customer_Billing_Details SET  First_Name= '$fname', Last_Name= '$lname',Address1= '$address', City= '$city', Zip= $zip ,Phone_No='$phone' WHERE Billing_ID= $addr_id";

	if ($conn->query($sql) === TRUE) {
		echo  'Your Address has been updated successfully!'; 
		echo "<meta http-equiv='refresh' content='2;url=user-dashboard'>"; 

	} else {
		echo 'Error updating record: ' . $conn->error;
	}
}

if ($_GET['action'] == 'add_to_wishlist') {
	$product_id = $_POST['product_id'];
	$sql = "SELECT * FROM Product WHERE Product_ID = $product_id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$id = $row['Product_ID'];
		$name = $row['Name'];
		$cost = $row['Cost'];

		$sql = "SELECT Cust_ID FROM Customer_Wishlist WHERE Cust_ID = $user_id AND Product_ID = '$id'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
            // Product already exists in the customer's wishlist
			return true;
		} else {
            // Product doesn't exist in the customer's wishlist, insert it
			$sql = "INSERT INTO Customer_Wishlist (Cust_ID, Product_ID) VALUES ($user_id, '$id')";
			if ($conn->query($sql) === TRUE) {
               $count = get_wishlist_count_for_user($user_id); // Replace this with your own function to get the count
               $response = array('count' => $count, 'message' => 'Item added to wishlist');
               echo json_encode($response);
           } else {
           	echo 'Error updating record: ' . $conn->error;
           }
       }
   }
}
if ($_GET['action'] == 'add_to_cart') { 	
	$product_id = $_POST['product_id'];
	$product_qty = 1;
		$sql = "SELECT Product.*, Images.Img_Url 
		        FROM Product 
		        JOIN Images ON Product.Product_ID = Images.Product_ID
		        WHERE Product.Product_ID = $product_id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$id = $row['Product_ID'];
		$name = $row['Name'];
		$cost = $row['Cost'];
		$image = $row['Img_Url'];


    // Check if cart session exists, if not create it
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = array();
		}

    // Check if product already exists in cart, if yes increase quantity, if not add it to the cart
		if (isset($_SESSION['cart'][$product_id])) {
			$_SESSION['cart'][$product_id]['qty'] += $product_qty;
		} else {
			$_SESSION['cart'][$product_id] = array(
				'id' => $id,
				'name' => $name,
				'qty' => $product_qty,
				'cost' => $cost,
				'image' => $image,
			);
		}

    // Calculate total items and total price in the cart
    $total_items = 0;
    $total_price = 0;
    foreach ($_SESSION['cart'] as $item) {
        $sql = "SELECT Cost FROM Product WHERE Product_ID = " . $item['id'];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $total_items += $item['qty'];
            $total_price += ($item['qty'] * $row['Cost']);
        }
    }

    // Create response JSON object
		$response = array(
			'count' => $total_items,
			'total_price' => $total_price,
			'message' => 'Item added to Cart',
		);
		echo json_encode($response);
	}
}
if ($_GET['action'] == 'update_cart') {
  $product_id = $_POST['product_id'];
  $product_qty = $_POST['product_qty'];
  // Check if the cart is set in the session
  if (isset($_SESSION['cart'])) {
    // Loop through the cart items and update the quantity
   foreach ($_SESSION['cart'] as $key => $item) {
       if ($item['id'] == $product_id) {

           $quantity = $_POST['product_qty'];
           $_SESSION['cart'][$key]['qty'] = $quantity;
           break;
       }
   }

    // Return success response
    echo json_encode(['status' => 'success','qty' => $_SESSION['cart'][$key]['qty'] ]);
  } else {
    // Return error response if the cart is not set in the session
    echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
  }
}
if ($_GET['action'] == 'remove_cart_item') {
  $product_id = $_POST['product_id'];

  // Check if the cart is set in the session
  if (isset($_SESSION['cart'])) {
    // Loop through the cart items and remove the item with the given product ID
    foreach ($_SESSION['cart'] as $key => $item) {
      if ($item['id'] == $product_id) {
        unset($_SESSION['cart'][$key]);
        break;
      }
    }

    // Return success response
    echo json_encode(['status' => 'success']);
  } else {
    // Return error response if the cart is not set in the session
    echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
  }
}


// Checking Delivery charges for shipping to the selected City
if ($_GET['action'] == 'get_shipping_charges') {
    $city = $_POST['city'];
    $query = "SELECT Delivery_Charges FROM Shipping WHERE City = '$city'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $delivery_charges = $row['Delivery_Charges'];
    $_SESSION['price']['shipping']= $delivery_charges;
    $_SESSION['price']['total_order'] = $_SESSION['price']['final'] + $delivery_charges;
    echo $delivery_charges;
}

if ($_GET['action'] == 'get_total_order') {
    echo $_SESSION['price']['total_order'];
}







$conn->close();
/*codeupdatelog End*/
?>