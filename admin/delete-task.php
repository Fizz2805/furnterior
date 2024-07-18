<?php
require_once "config.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the task ID from the AJAX request
  $taskId = $_POST['taskId'];

  // Perform the deletion in the database based on the task ID
  $sql_delete_task = "DELETE FROM To_Do_List WHERE ID = '$taskId'";
  if ($conn->query($sql_delete_task) === TRUE) {
    // Deletion successful
    echo "Task deleted successfully";
  } else {
    // Error in executing the query
    echo "Error: " . $conn->error;
  }
}
?>
