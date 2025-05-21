<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Liam McCarthy">  
  <title>EcruSoft Solutions</title>
  <link href="styles/styles.css" rel="stylesheet">
  <link href="styles/layout.css" rel="stylesheet">
</head>
<body>

    <!-- Include header -->
    <?php include 'includes/header.inc.php'; ?>
    <!-- Include navbar -->
    <?php include 'includes/navbar.inc.php'; ?>
  <!-- ===== MAIN LAYOUT ===== -->
  <main class="main-wrapper">
    <div class="main-content two-column-layout">
      <!-- Left Column -->
      <div class="left-column">
        <section class="hero-section section" id="home">
          <div class="hero-content">
              <h2>Innovative Software Solutions</h2>
              <p>Delivering high-quality digital experiences tailored for your business.</p>
              <a href="#contact" class="cta-button">Get in Touch</a>
          </div>
        </section>
        <section class="testimonials section">
          <h2>What Our Clients Say</h2>
          <div class="testimonial-list">
            <div class="testimonial">
              <p>"EcruSoft Solutions transformed our business with their innovative software. Highly recommend!"</p>
              <p><strong>- Jane Doe, CEO of TechCorp</strong></p>
            </div>
            <div class="testimonial">
              <p>"Their team is professional, responsive, and delivers exceptional results every time."</p>
              <p><strong>- John Smith, Founder of Cloudify</strong></p>
            </div>
          </div>
        </section>
      </div>

      <!-- Right Column -->
      <div class="right-column">
        <aside class="hiring-card section temporary">
          <h3>Hiring Now</h3>
          <p>We're passionate about building scalable software that empowers businesses. Join our team today!</p>
          <a href="apply.html" class="cta-button">Apply Now</a>
        </aside>
        <section class="services section" id="services">
          <h2>Our Services</h2>
          <p>We specialize in web development, software engineering, and cloud solutions. Our team is dedicated to delivering innovative and scalable solutions that meet the unique needs of our clients. Whether you're looking for a custom-built application, a robust e-commerce platform, or seamless cloud integration, we have the expertise to make it happen.</p>
          <p>Our services also include ongoing support and maintenance to ensure your systems run smoothly and efficiently. Partner with us to take your business to the next level with cutting-edge technology and exceptional service.</p>
        </section>
        <section class="contact section" id="contact">
          <h2>Contact Us</h2>
          <p>We'd love to hear from you! Reach out to us via email or phone, and our team will get back to you promptly.</p>
          <div class="contact-info">
            <p><strong>Email:</strong> <a href="mailto:info@ecrusoft.com.au">info@ecrusoft.com.au</a></p>
            <p><strong>Phone:</strong> <a href="tel:+614567890">(+61) 456-7890</a></p>
          </div>
        </section>
      </div>
    </div>
  </main>
    <!-- Include footer -->
    <?php include 'includes/footer.inc.php'; ?>
</body>
</html>
