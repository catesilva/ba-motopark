<?php
// contact_process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Set recipient email (you can change this to your own email address)
    $to = "bamotopark.info@gmail.com";  // Change to your own email
    
    // Set email subject
    $email_subject = "New Message from $name: $subject";
    
    // Set email body
    $email_body = "You have received a new message from the contact form on your website.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message:\n$message\n";
    
    // Set email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\n";
    
    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // If the email is sent successfully
        echo json_encode(['status' => 'success', 'message' => 'Thank you for your message. We will get back to you soon!']);
    } else {
        // If the email fails to send
        echo json_encode(['status' => 'error', 'message' => 'There was an error sending your message. Please try again later.']);
    }
} else {
    // If the request is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
