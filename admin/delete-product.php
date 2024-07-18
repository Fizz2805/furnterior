<!-- latest js -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<?php
    // Connect to the database
    include_once('config.php');
	echo "<div id='notification'> </div>";
    // Get the product SKU from the URL parameter
    $sku = $_GET["id"];

    // getting Product_ID for SKU as we need it for Images and Review table
	$sql= "SELECT Product_ID FROM Product WHERE SKU= '$sku'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
      // The SKU exists in the Product table
      $row = $result->fetch_assoc();
      $id = $row["Product_ID"];

      
    // set the path to the folder where the images are stored
    $folder_path = 'assets/images/products/';
    $sql_img= "SELECT * FROM Images WHERE Product_ID= $id";
    $result = $conn->query($sql_img);
    while ($row = $result->fetch_assoc()) {
      $product_image_filename = $row['Img_Url'];

      // get a list of all files in the folder
      $files = glob($folder_path . '*');

      // loop through the files
      foreach ($files as $file) {
        // check if the file is a product image
        if (basename($file) === $product_image_filename) {
          // delete the file
          unlink($file);
        }
      }
    }
      
      
	// Delete the model 
    $sql = "DELETE FROM Images WHERE Product_ID = '$id'";
    if ($conn->query($sql) === FALSE) {
      echo "Error deleting images: " . $conn->error;
      $conn->rollback(); // Roll back the transaction
    }

      // set the path to the folder where the images are stored
    $folder_path = 'assets/images/products/';
    $sql_img= "SELECT * FROM Images WHERE Product_ID= $id";
    $result = $conn->query($sql_img);
    while ($row = $result->fetch_assoc()) {
      $product_image_filename = $row['Img_Url'];

      // get a list of all files in the folder
      $files = glob($folder_path . '*');

      // loop through the files
      foreach ($files as $file) {
        // check if the file is a product image
        if (basename($file) === $product_image_filename) {
          // delete the file
          unlink($file);
        }
      }
    }
      
      // Delete the model 
    $folder_path = 'assets/3D-models/';
    $sql_model= "SELECT * FROM Product WHERE Product_ID= $id";
    $result = $conn->query($sql_model);
    while ($row = $result->fetch_assoc()) {
      $product_model_filename = $row['3D_Model'];

      // get a list of all files in the folder
      $files = glob($folder_path . '*');

      // loop through the files
      foreach ($files as $file) {
        // check if the file is a product image
        if (basename($file) === $product_model_filename) {
          // delete the file
          unlink($file);
        }
      }
    }
      
    // Delete the reviews in the Product_Review table
	// foreign key
    $sql = "DELETE FROM Product_Review WHERE Product_ID = '$id'";
    if ($conn->query($sql) === FALSE) {
      echo "Error deleting images: " . $conn->error;
      $conn->rollback(); // Roll back the transaction
    }

      
    // Construct the SQL query to delete the product
    $sql = "DELETE FROM Product WHERE Product_ID = '$id'";

    // Run the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>
              // After successful product deletion, show notification
              $('#notification').html('Product deleted successfully!')
                .fadeIn('slow', function() {
                  $(this).delay(5000).fadeOut('slow');
              });
            </script>";
                echo "<script>console.log('Product deleted successfully');</script>";
      			header('location: all-products');
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
    }
?>

      <!-- Modal Start 
    <div class="modal fade" id="delProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
                    <p>Are you sure you want to delete this product?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="button-box">
                        <button type="button" class="btn btn--no " data-bs-dismiss="modal">No</button>
                      <form action=""  method="post">
                        <button type="submit" class="btn  btn--yes btn-primary" >Yes</button>
                      </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   Modal End   -->
