

<!-- 
https://mailtrap.io/ 
-->


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Create instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration for Mailtrap
        $mail->isSMTP();
        $mail->Host       = 'sandbox.smtp.mailtrap.io'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'b01cfd3d564a5f';  
        $mail->Password   = '23248e6be32b2e';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
        $mail->Port       = 2525;  

        // Recipients
        $mail->setFrom($email, $name); 
        $mail->addAddress('nishadsoni104@gmail.com'); 
        $mail->addAddress('sooryapropmanagement@gmail.com');  

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = "Contact Form Submission from $name";
        $mail->Body    = "<strong>Name:</strong> $name<br>" .
                         "<strong>Email:</strong> $email<br>" .
                         "<strong>Message:</strong><br>$message";

        // Send email
        if ($mail->send()) {
            // Redirect to contact.php with success message
            header("Location: contact.php?status=success");
            exit();
        } else {
            echo "Message could not be sent.";
        }
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method";
}
?>
