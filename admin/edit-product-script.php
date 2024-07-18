<?php
	$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$parts = explode("=", $url);
	$product_id = $parts[1];
	
    require_once "config.php";
	$sql = "SELECT * FROM Product WHERE Product_ID=$product_id";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
		// Retrieve user data from the form
		$name = $_POST['p_name'];
        $category = $_POST['category'];
		$price = $_POST['price'];
		$desc = $_POST['description'];
      	$weight = $_POST['weight'];
      	$dim= $_POST['dimension'];
        $sku = $_POST['sku'];
      	$stock= $_POST['stock-status'];
      	$stock_qty= $_POST['qty'];
        $is_featured= $_POST['featured'];
      	
          $target_dir = "assets/images/products/";
          $uploadOk = 1;
          $fileNames = array();
          foreach ($_FILES["fileToUpload"]["name"] as $key => $value) {
              $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$key]);
              $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              
              // Check file size
              if ($_FILES["fileToUpload"]["size"][$key] > 800000) {
                  echo '<script>alert("Sorry, your file is too large.");</script>';
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" && $imageFileType != "webp" ) {
                  echo '<script> alert("Sorry, only JPG, JPEG, PNG, GIF & WebP files are allowed.")<script>;';
                  $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
                      echo '<script> console.log("The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$key])). " has been uploaded ");</script>';                     
                      // Add filename to array
                      $fileNames[] = basename($_FILES["fileToUpload"]["name"][$key]);
                  } else {
                      echo '<script> alert("Sorry, there was an error uploading your file.") </script> ';
                  }
              }
          }
       
        
		// Insert product data into the database
		$sql = "UPDATE Product SET SKU='$sku', Name='$name', Description='$desc', Category='$category', Cost=CAST('$price' AS FLOAT), Weight='$weight', Dimensions='$dim', Is_Featured='$is_featured', Stock_Status='$stock', Stock_Qty=$stock_qty WHERE Product_ID= $product_id";
		if ($conn->query($sql) === TRUE) {
		    echo "<script>
              // After successful product insertion, show notification
              $('#notification').html('New product added successfully!')
                .fadeIn('slow', function() {
                  $(this).delay(5000).fadeOut('slow');
              });
            </script>";
                echo "<script>console.log('Product edited successfully');</script>";
		
		} else {
		    echo "<script>console.log('Error editing Product');</script>";
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

            // inserting images into Images table
            foreach ($fileNames as $filename) {
                $sql = "INSERT INTO Images (Img_Url,Product_ID) VALUES ('$filename','$product_id')";
                if(mysqli_query($conn, $sql)) {
                    echo '<script> console.log("The file " . $filename . " has been inserted into the database.")</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        
			// Loop through the delete checkboxes
            if(!empty($_POST['delete'])) {
              foreach($_POST['delete'] as $delete_id) {
                // Delete the image from the database
                $sql_delete = "DELETE FROM Images WHERE image_id = $delete_id";
                $result_delete = $conn->query($sql_delete);

                // Delete the image file from the server
                if($result_delete && file_exists('assets/images/products/' . $row_images['Img_Url'])) {
                  unlink('assets/images/products/' . $row_images['Img_Url']);
                }
              }
            }
        echo "<script>window.location.href='all-products';</script>";
		$conn->close();
      
    }
  ?>