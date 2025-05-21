<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Sokhour KIM">
  <title>Apply Webpage</title>
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/layout.css">
</head>

<body>
  <?php include 'includes/navbar.inc.php'; ?>
  <!-- ===== MAIN CONTENT ===== -->
  <main>
    <div class="form-container">
      <h2 class="form-header">Application Form</h2>
      <!-- Application form -->
      <form id="regform" action="process_eoi.php" method="post" novalidate=”novalidate">
        <!-- Step 1: Job Reference -->
        <fieldset>
          <legend>Step 1: Job Reference</legend>
          <div>
            <label for="jobReference">Job Reference Number:</label>
            <select id="jobReference" name="jobReference" required>
              <option value="">Please Select</option>
              <option value="ITT02">IT Support Technician - ITT02</option>
              <option value="CSS44">Cyber Security Specialist - CSS44</option>
              <option value="CEN19">Cloud Engineer - CEN19</option>
            </select>
          </div>
        </fieldset>

        <!-- Step 2: Personal Details -->
        <fieldset>
          <legend>Step 2: Personal Details</legend>
          <div>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" maxlength="20" pattern="[A-Za-z]+" required>
          </div>
          <div>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" maxlength="20" pattern="[A-Za-z]+" required>
          </div>
          <div>
            <label for="dob">Date of Birth:</label>
            <input type="text" id="dob" name="dob" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required>
          </div>
        </fieldset>

        <!-- Step 3: Gender -->
        <fieldset>
          <legend>Step 3: Gender</legend>
          <label><input type="radio" name="gender" value="Male" required> Male</label>&ensp;
          <label><input type="radio" name="gender" value="Female" required> Female</label>&ensp;
          <label><input type="radio" name="gender" value="Other" required> Other</label>
        </fieldset>

        <!-- Step 4: Residence Address -->
        <fieldset>
          <legend>Step 4: Residence Address</legend>
          <div>
            <label for="streetAddress">Street Address:</label>
            <input type="text" id="streetAddress" name="streetAddress" maxlength="40" required>
          </div>
          <div>
            <label for="suburb">Suburb/Town:</label>
            <input type="text" id="suburb" name="suburb" maxlength="40" required>
          </div>
          <div>
            <label for="state">State:</label>
            <select id="state" name="state" required>
              <option value="">Please Select</option>
              <option value="VIC">VIC</option>
              <option value="NSW">NSW</option>
              <option value="QLD">QLD</option>
              <option value="NT">NT</option>
              <option value="WA">WA</option>
              <option value="SA">SA</option>
              <option value="TAS">TAS</option>
              <option value="ACT">ACT</option>
            </select>
          </div>
          <div>
            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" pattern="\d{4}" required>
          </div>
        </fieldset>

        <!-- Step 5: Contacts Information -->
        <fieldset>
          <legend>Step 5: Contacts Information</legend>
          <div>
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}"
              required>
          </div>
          <div>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="+61 " pattern="\d{8,12}" required>
          </div>
        </fieldset>

        <!-- Step 6: Skills -->
        <fieldset>
          <legend>Step 6: Skills</legend>
          <label><input type="checkbox" name="skills[]" value="Programming" class="skill-checkbox"> Programming
            Skills</label>
          <label><input type="checkbox" name="skills[]" value="Technical_troubleshooting" class="skill-checkbox">
            Technical Troubleshooting</label>
          <label><input type="checkbox" name="skills[]" value="Data_analysis" class="skill-checkbox"> Data
            Analysis</label>
          <label><input type="checkbox" name="skills[]" value="Cloud_computing" class="skill-checkbox">
            Cloud Computing</label>
          <label><input type="checkbox" name="skills[]" value="Digital_forensic" class="skill-checkbox"> Digital
            Forensic
          </label>&ensp;
          <div>
            <label for="otherSkills">Other Skills:</label>
            <textarea id="otherSkills" name="otherSkills" rows="4" cols="30" placeholder="Additional Skills"></textarea>
          </div>
        </fieldset>

        <!-- Submit button -->
        <input type="submit" class="button" value="Apply">
      </form>
    </div>
  </main>
  <!-- Include footer -->
  <?php include 'includes/footer.inc.php'; ?>
</body>

</html>