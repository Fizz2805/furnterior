<!-- latest js -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<?php
    // Connect to the database
    include_once('config.php');
	echo "<div id='notification'> </div>";
    // Get the product SKU from the URL parameter
    $id = $_GET["id"];

    // Construct the SQL query to delete the product
    $sql = "DELETE FROM Shipping WHERE Shipping_ID = '$id'";

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
      	sleep(5);
      	header('location: shipping.php');
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
    
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
