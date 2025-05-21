<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Create Web Application" />
    <meta name="keywords" content="PHP, MySQL" />
    <meta name="author" content="Sokhour KIM" />
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/layout.css">
    <title>Job Application Form </title>
</head>

<body>
    <header>
        <div class="header-top">
            <a href="index.html">
                <img class="navbar-image" src="styles/images/logo.png" alt="EcruSoft Solutions Logo">
            </a>
            <h1 class="header-title">The Faces Behind EcruSoft Solutions</h1>
        </div>
    </header>
    <h1> Application Form </h1>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);


    require_once("settings.inc.php"); // connection info
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        echo "<p>Database connection failure</p>";
        exit();
    }

    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Collect and clean inputs
        $jobReference   = sanitise_input($_POST["jobReference"]);
        $firstName      = sanitise_input($_POST["firstName"]);
        $lastName       = sanitise_input($_POST["lastName"]);
        $gender         = sanitise_input($_POST["gender"]);
        $streetAddress  = sanitise_input($_POST["streetAddress"]);
        $suburb         = sanitise_input($_POST["suburb"]);
        $state          = sanitise_input($_POST["state"]);
        $postcode       = sanitise_input($_POST["postcode"]);
        $emailAddress   = sanitise_input($_POST["email"]);
        $phoneNumber    = sanitise_input($_POST["phone"]);
        $otherSkills    = sanitise_input($_POST["otherSkills"]);

        // Handle skill checkboxes
        $skills = $_POST["skills"] ?? [];
        $skill1 = $skills[0] ?? "";
        $skill2 = $skills[1] ?? "";
        $skill3 = $skills[2] ?? "";
        $skill4 = $skills[3] ?? "";
        $skill5 = $skills[4] ?? "";

        // Validation
        $errMsg = "";

        if ($firstName == "") {
            $errMsg .= "<p>You must enter your first name.</p>";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $firstName)) {
            $errMsg .= "<p>Only letters are allowed in your first name.</p>";
        }

        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.<br>";
        }

        if (empty($postcode)) {
            $errMsg .= "<p>You must enter your postcode.</p>";
        } elseif (!preg_match("/^\d{4}$/", $postcode)) {
            $errMsg .= "<p>Postcode must be exactly 4 digits.</p>";
        }

        if ($errMsg != "") {
            echo "<div class='form-errors'>$errMsg</div>";
            echo "<p>Please go back and correct the errors. <a href=\"apply.html\">Return to form</a></p>";
        } else {
            echo "<h2>Application Submitted</h2>";
            echo "<p><strong>Job Reference Number:</strong> $jobReference</p>";
            echo "<p><strong>First Name:</strong> $firstName</p>";
            echo "<p><strong>Last Name:</strong> $lastName</p>";
            echo "<p><strong>Gender:</strong> $gender</p>";
            echo "<p><strong>Street Address:</strong> $streetAddress</p>";
            echo "<p><strong>Suburb:</strong> $suburb</p>";
            echo "<p><strong>State:</strong> $state</p>";
            echo "<p><strong>Postcode:</strong> $postcode</p>";
            echo "<p><strong>Email Address:</strong> $emailAddress</p>";
            echo "<p><strong>Phone Number:</strong> $phoneNumber</p>";
            echo "<p><strong>Skills:</strong> " . implode(", ", $skills) . "</p>";
            echo "<p><strong>Other Skills:</strong> $otherSkills</p>";

            // Insert into database
            $sql = "INSERT INTO eoi (
            JobReference, FirstName, LastName, StreetAddress, Suburb, State, Postcode,
            EmailAddress, PhoneNumber, Skill1, Skill2, Skill3, Skill4, Skill5, OtherSkills
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            JobReference, FirstName, LastName, gender, StreetAddress, Suburb, State, Postcode,
            EmailAddress, PhoneNumber, Skill1, Skill2, Skill3, Skill4, Skill5, OtherSkills
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param(
                    $stmt,
                    "sssssssssssssss",
                    $jobReference,
                    $firstName,
                    $lastName,
                    "ssssssssssssssss",
                    $jobReference,
                    $firstName,
                    $lastName,
                    $gender,
                    $streetAddress,
                    $suburb,
                    $state,
                    $postcode,
                    $emailAddress,
                    $phoneNumber,
                    $skill1,
                    $skill2,
                    $skill3,
                    $skill4,
                    $skill5,
                    $otherSkills
                );
                mysqli_stmt_execute($stmt);
                $insert_id = mysqli_insert_id($conn);
                echo "<p>Your application has been successfully submitted. Your application ID is $insert_id.</p>";
            } else {
                echo "<p>Error inserting application: " . mysqli_error($conn) . "</p>";
            }
        }

        mysqli_close($conn);
    } else {
        header("Location: apply.html");
        exit();
    }
    ?>
</body>

</html>