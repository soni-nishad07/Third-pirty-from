<?php
$title = "Contact Us";
include "head.php"; // Include the header

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    $mailheader = "From: " . $name . "<" . $email . ">\r\n";
    $recipient = "nishadsony4@gmail.com";

    // Send email and check for success
    if (mail($recipient, $subject, $message, $mailheader)) {
        // Redirect with success status
        header("Location: contact.php?status=success");
        exit();
    } else {
        echo "Error sending email.";
    }
}
?>

<body>
<?php include "nav.php"; ?>

<!-- ----Breadcrumb--------- -->
<section class="breadcrumbs" style="background-image: url('./image/contact.png');">
    <div class="b_overlay" style="background-image: url('./image/overlay.png');">
        <div class="brdcrm-content">
            <h1>Contact Us</h1>
        </div>
    </div>
</section>

<!-- ---------- -->
<section class="contact-section">
    <div class="container contact-sec">
        <div class="contact-info">
            <h1>Let’s discuss <br> on something <span>cool</span> <br> together</h1>
            <div class="info">
                <i class="fa-solid fa-envelope"></i>
                <a href="mailto:sooryapropmanagement@gmail.com" class="mail">sooryapropmanagement@gmail.com</a>
                <p class="phone"><i class="fa-solid fa-phone"></i> +91-9880474640</p>
                <p class="location"><i class="fa-solid fa-location-dot"></i>31/8, Ghattahalli Village, “kecnchchammana <br> Kai thota” Huskur Post Sarjapur hobali Anekal Taluk, <br> Bangalore-560099</p>
            </div>
            <div class="social-media">
                <a href="#" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
        </div>
        <div class="form-container">
            <h2>Get In Touch</h2>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                <div id="success-message" class="alert alert-success">
                    Message has been sent successfully!
                </div>
            <?php endif; ?>

            <form action="sent.php" method="POST">
                <input type="text" name="name" placeholder="Your name" required>
                <input type="email" name="email" placeholder="Your email" required>
                <textarea name="message" placeholder="Your message" required></textarea>
                <button type="submit"><i class="fa-solid fa-paper-plane" style="padding:8px;"></i>Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>

<script>
    // Check if success message exists
    window.onload = function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            // Hide the success message after 5 seconds
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    };
</script>

</body>
</html>
