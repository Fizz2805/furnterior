<?php
// Get the selected Province from the Ajax request
$province = $_GET['province'];

require_once "admin/config.php";

$sql = "SELECT City FROM Shipping WHERE Province = '$province'";
$result = $conn->query($sql);

// Generate the City options
$options = '<option selected disabled value="">Choose...</option>';
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $options .= '<option>' . $row["City"] . '</option>';
  }
}

// Return the City options as a string
echo $options;

$conn->close();
?>
