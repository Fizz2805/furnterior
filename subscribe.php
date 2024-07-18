<?php
require_once "admin/config.php";
// Get the email address from the form submission
$email = $_POST['email'];
// Get the redirect URL from the 'redirect' parameter in the URL
$redirect_url = isset($_POST['redirect']) ? $_POST['redirect'] : '/';

// Check if the email address is already subscribed
$sql = "SELECT * FROM Subscribers WHERE Email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Email address is already subscribed
    header('Location: ' . $redirect_url . '?message=already_subscribed#newsletter-form');
} else {
    // Email address is not yet subscribed, so add it to the database
    $sql = "INSERT INTO Subscribers (Email) VALUES ('$email')";
    if ($conn->query($sql) === TRUE) {
        // Subscription successful
      	header('Location: ' . $redirect_url . '?message=subscribed#newsletter-form');
    } else {
        // Subscription failed
        header('Location: ' . $redirect_url . '?message=error#newsletter-form');
    }
}

// Close the database connection
$conn->close();

?>
