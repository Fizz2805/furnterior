<?php
// Database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'furnterior';


$conn = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

// Check connection
if ($conn->connect_error) {
  echo '<script> console.log("Connection to database failed") </script>';
  die("Connection failed: " . $conn->connect_error);
}
// echo '<script> console.log("Connected to database successfully") </script>';
?>
