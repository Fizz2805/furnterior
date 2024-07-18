<?php
session_start();
require_once "config.php";
// Get the subject and message from the form submission
$subject = $_POST['email-subject'];
$message = $_POST['email-message'];

// Retrieve the subscribers list from the database
$sql = "SELECT * FROM Subscribers";
$result = $conn->query($sql);
$sql_admin = "SELECT Email FROM Admin";
$result_admin = $conn->query($sql_admin);
$row_admin= $result_admin->fetch_assoc();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email = $row['Email'];
        $admin_email= $row_admin['Email'];
        // Send email to each subscriber
        $to = $email;
        $headers = "From: $admin_email\r\n";
        $headers .= "Reply-To: $admin_email\r\n";
        $headers .= "Content-type: text/html\r\n";
        
        $message = nl2br($message); // Convert newlines to <br> tags
        
        // Send email
        $success =  mail($to, $subject, $message, $headers);
    }
}
$_SESSION['sendmail']="success";
?>
<script> window.location.href="all-subscribers"; </script>