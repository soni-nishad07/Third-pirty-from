<?php
$title = "Contact us";
include "head.php";
?>

<body>

<?php
include "nav.php"; 
?>

<section class="breadcrumbs" style="background-image: url('./image/contact.png');">
    <div class="b_overlay" style="background-image: url('./image/overlay.png');">
        <div class="brdcrm-content">
            <h1>Contact Us</h1>
        </div>
    </div>
</section>

<section class="contact-section">
    <div class="container contact-sec">
        <div class="contact-info">
            <h1>Let’s discuss <br>on something <span>cool</span><br> together</h1>
            <div class="info">
                <i class="fa-solid fa-envelope"></i>
                <a href="mailto:sooryapropmanagement@gmail.com" class="mail">sooryapropmanagement@gmail.com</a>
                <p class="phone"><i class="fa-solid fa-phone"></i> +91-9880474640</p>
                <p class="location"><i class="fa-solid fa-location-dot"></i>31/8, Ghattahalli Village, “kecnchchammana Kai thota”Huskur Post Sarjapur hobali Anekal Taluk, <br> Bangalore-560099</p>
            </div>
            <div class="social-media">
                <a href="#" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
        </div>
        <div class="form-container">
            <h2>Get In Touch</h2>

            <div id="success-message" style="display: none;" class="alert alert-success"></div> 

            <!-- <form id="contact-form" action="https://formsubmit.co/nishadsoni104@gmail.com" method="POST" onsubmit="showSuccessMessage(event)"> -->
                <form id="contact-form" action="https://formsubmit.co/sooryapropmanagement@gmail.com" method="POST" onsubmit="showSuccessMessage(event)">
                <input type="text" name="name" placeholder="Your name" required>
                <input type="email" name="email" placeholder="Your email" required>
                <textarea name="message" placeholder="Your message" required></textarea>
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_template" value="table">
                <button type="submit"><i class="fa-solid fa-paper-plane" style="padding:8px;"></i>Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php
include('footer.php');
?>

<script>
    // Function to show success message and redirect
    function showSuccessMessage(event) {
        event.preventDefault(); // Prevent the form from submitting right away

        const form = event.target;
        const successMessage = document.getElementById('success-message');

        // Set the success message text
        successMessage.textContent = 'Message has been sent successfully!';
        successMessage.style.display = 'block'; // Show the success message

        // Submit the form immediately
        form.submit(); 

        // Clear the form fields
        form.reset(); // Reset the form fields

        // Hide success message after 5 seconds and redirect
        setTimeout(function() {
            successMessage.style.display = 'none'; // Hide the message
            window.location.href = 'contact.php'; // Redirect to the contact page
        }, 5000); // 5 seconds delay
    }
</script>

</body>
</html>

