<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata for the Cybersecurity Specialist page -->
    <meta charset="utf-8" />
    <meta name="description" content="Job description for Cybersecurity Specialist" />
    <meta name="keywords" content="job description, Cybersecurity Specialist" />
    <meta name="author" content="Justin Mac" />
    <title>Cybersecurity Specialist - CSS44</title>
    <!-- Linking external CSS files -->
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/layout.css" rel="stylesheet">
</head>

<body>
    <!-- ===== HEADER ===== -->
    <header>
      <div id="header-top">
          <img src="styles/images/logo.png" alt="EcruSoft Logo" id="navbar-image">
          <h1 class="header-title">EcruSoft Solutions</h1>
      </div>

<!-- Include navbar -->
<?php include 'includes/navbar.inc.php'; ?>

    </header>

    <!-- ===== MAIN CONTENT ===== -->
    <article class="jobs-description">
        <!-- Job title and description -->
        <h2 class="jobs-h2">Cybersecurity Specialist - CSS44</h2>
        <p>As a Cybersecurity Specialist, your role is to safeguard the organization's IT infrastructure by implementing security measures, detecting threats, and responding to incidents.</p>

        <!-- Salary Range -->
        <details class="dropdown">
            <summary class="jobs-h3">Salary Range:</summary>
            <ul>
                <li>$133,454 to $190,050 annually</li>
            </ul>
        </details>

        <!-- Reporting Line -->
        <details class="dropdown">
            <summary class="jobs-h3">Reports To:</summary>
            <ul>
                <li>Chief Information Security Officer (CISO)</li>
            </ul>
        </details>

        <!-- Key Responsibilities -->
        <details class="dropdown">
            <summary class="jobs-h3">Key Responsibilities:</summary>
            <ol>
                <li>Develop and enforce security policies and procedures.</li>
                <li>Monitor networks for suspicious activity and respond to incidents.</li>
                <li>Conduct security assessments and audits to identify vulnerabilities.</li>
                <li>Implement and maintain firewalls, encryption, and intrusion detection systems.</li>
                <li>Provide training to staff on cybersecurity best practices.</li>
            </ol>
        </details>

        <!-- Qualifications -->
        <details class="dropdown">
            <summary class="jobs-h3">Qualifications:</summary>
            <ul>
                <li><strong>Essential:</strong>
                    <ul>
                        <li>Master's degree in Cybersecurity, Computer Science, or related field.</li>
                        <li>5+ years of experience in cybersecurity roles.</li>
                        <li>Proficiency in network protocols, firewalls, and intrusion detection systems.</li>
                        <li>Strong knowledge of encryption and decryption techniques.</li>
                    </ul>
                </li>
                <li><strong>Preferable:</strong>
                    <ul>
                        <li>Certifications such as CISSP, CEH, or CISM.</li>
                        <li>Experience with Python or other scripting languages.</li>
                    </ul>
                </li>
            </ul>
        </details>
    </article>

    <a href="jobs.php" class="cta-button">Back</a>

 <!-- Include footer -->
 <?php include 'includes/footer.inc.php'; ?>
  
</body>

</html>