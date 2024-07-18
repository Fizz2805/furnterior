<?php
	include "admin/config.php";
  
  // Check if the offset value is set in the AJAX request
  if(isset($_POST['offset'])) {
    // Retrieve the offset value from the AJAX request
    $offset = $_POST['offset'];
	$cat= $_POST['category'];
    // Query the database to retrieve the next 5 images
    $sql_s= "SELECT i.Img_Url, i.Product_ID FROM Images i JOIN Product p ON i.Product_ID = p.Product_ID WHERE p.Category = $cat LIMIT 5 OFFSET $offset";
    $result_s= $conn->query($sql_s);

    // Build HTML code to display the images
    if($result_s->num_rows>0){
      $img_path= "admin/assets/images/products/";
      while($row_s= $result_s->fetch_assoc()){
        $img_name= $row_s['Img_Url'];
        $img_url= $img_path.$img_name;
?>
<div id="widget" class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
  <img src="<?php echo $img_url; ?>" alt="Image" class="img-fluid" draggable="true">
</div>
<?php 
      }
    }
  }
?>
