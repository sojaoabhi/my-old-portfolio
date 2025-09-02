<?php


// Database connection parameters
$host = "localhost";      // Hostname (e.g., localhost or your DB server IP)
$dbname = "Contact"; // Database name
$user = "postgres";   // PostgreSQL username
$password = "password"; // PostgreSQL password

// Establishing a connection
try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to database: " . $e->getMessage());
}

// Checking if form data is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate input (optional, for added security)
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        try {
            // SQL query to insert data
            $sql = "INSERT INTO contact_form (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
            $stmt = $pdo->prepare($sql);
            
            // Binding parameters and executing
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);
            $stmt->execute();
            //echo "Data saved successfully!";
        echo "
            <script>
            alert('Message was sent successfully. Thank your for reaching us!');
            </script>
        ";
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "All fields are required.";
    }
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// required files
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($message)) {

    $mail = new PHPMailer(true);
    try {

        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'abhisheknangare5@gmail.com';
        $mail->Password   = 'sfvxdgmjuqawmgoi';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS ;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('abhisheknangare5@gmail.com', 'Contact Form');
        $mail->addAddress('$email');
        //$mail->addReplyTo('kimjisooishart@gmail.com', 'Lorem Ipsum');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Thank You for Reaching Out!';
        $mail->Body = "
            <p>Dear $name,</p>
            <p>Thank you for reaching out to us! We appreciate the time you took to share your feedback and inquiries with Lorem Ipsum Inc. Your input is valuable to us, and we are committed to providing you with the best possible experience.</p>

            <p>Our team is currently reviewing your message, and we will get back to you as soon as possible. If your inquiry is time-sensitive, rest assured that we are working diligently to address it promptly.</p>

            <p>In the meantime, feel free to explore our website for additional resources. If you have any urgent matters, please don't hesitate to contact us directly at (639) 234231.</p>

            <p>Once again, thank you for choosing Lorem Ipsum Inc.. We look forward to assisting you and appreciate your continued support.</p>
            <p>Best regards,</p>
            <p>Lorem Ipsum</p>
        ";

        $mail->send();
         header("Location: index.html");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
// Closing the connection
$pdo = null;
?>