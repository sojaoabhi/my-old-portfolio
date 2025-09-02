<?php
/**
 * Rename this file to config.php and fill in your credentials.
 * Keep real credentials OUT of Git (config.php is in .gitignore).
 */

// PostgreSQL (for saving contact messages)
$DB_HOST = "localhost";
$DB_NAME = "contact";
$DB_USER = "postgres";
$DB_PASS = "change_me";

// SMTP (PHPMailer)
$SMTP_HOST = "smtp.gmail.com";
$SMTP_PORT = 587;
$SMTP_USER = "your_email@gmail.com";
$SMTP_PASS = "your_app_password"; // Use an app password, not your login
$SMTP_SECURE = "tls"; // 'tls' or 'ssl'
$FROM_EMAIL = "your_email@gmail.com";
$FROM_NAME = "Portfolio Contact";
?>
