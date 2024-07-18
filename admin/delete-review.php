<!-- latest js -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<?php
    // Connect to the database
    include_once('config.php');
    // Get the id from the URL parameter
    $id = $_GET["id"];

    // Construct the SQL query to delete the product
    $sql = "DELETE FROM Reviews WHERE Review_ID = '$id'";

    // Run the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>
              // After successful product deletion, show notification
              $('#notification').html('Product deleted successfully!')
                .fadeIn('slow', function() {
                  $(this).delay(5000).fadeOut('slow');
              });
            </script>";
                echo "<script>console.log('Review deleted successfully');</script>";
      	header('location: all-reviews');
    } else {
        echo "Error deleting review: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
    
?>
