<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Your email address where the form submissions will be sent
    $to = "abhisheknangare51@gmail.com";

    // Email subject
    $subject = "Contact Form Submission";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo '<div class="alert alert-success" role="alert">
                Your message has been sent successfully.
              </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Sorry, there was an error sending your message.
              </div>';
    }
}
?>
