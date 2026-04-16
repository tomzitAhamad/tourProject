<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - TravelBD</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>

<header class="header_class">
    <nav class="navbar_class">
        <div class="logo_class"><a href="index.html">TravelBD</a></div>
    </nav>
</header>

<section class="contact_section_class">
    <div class="container_class">
        <h2 class="section_title_class">Contact Us</h2>
        <p class="section_subtitle_class">We would love to hear from you!</p>

        <div class="contact_content_class">
            <div class="contact_info_class">
                <h3>Our Office</h3>
                <p>TravelBD Headquarters, Dhaka, Bangladesh</p>

                <h3>Email</h3>
                <p>ahamad15-5399@diu.edu.bd</p>

                <h3>Phone</h3>
                <p>+880 1762 161 370</p>

                <h3>Office Hours</h3>
                <p>Saturday - Thursday: 9:00 AM - 6:00 PM</p>
            </div>

            <div class="contact_form_class">
                <h3>Send Us a Message</h3>
                <form action="contact_process.php" method="POST" id="contactForm">
                    <input type="text" name="name" placeholder="Your full name" required>
                    <input type="email" name="email" placeholder="Your email address" required>
                    <input type="text" name="subject" placeholder="Subject" required>
                    <textarea name="message" rows="6" placeholder="Your message here..." required></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="footer_class">
    <p>© 2026 TravelBD. All rights reserved.</p>
    <p>Made by Tomzid Ahamad</p>
</footer>

<script src="contact.js"></script>
</body>
</html>