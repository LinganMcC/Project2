<?php
include 'includes/setting.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Job description for IT positions" />
    <meta name="keywords" content="job description, IT positions" />
    <meta name="author" content="Justin Mac" />
    <title>Job description for IT positions</title>
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/layout.css" rel="stylesheet">
</head>
<body>

<!-- Include navbar -->
<?php include 'includes/navbar.inc.php'; ?>

<main>
    <article class="jobs-container">
        <?php
        $sql = "SELECT job_ref_j, job_title_j, brief_description_j FROM jobs";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
        ?>
            <section class="view-jobs">
                <p><?= htmlspecialchars($row['job_title_j']) ?> - <?= htmlspecialchars($row['job_ref_j']) ?></p>
                <p class="description"><?= htmlspecialchars($row['brief_description_j']) ?></p>
                <nav><a href="jobdetails.php?ref=<?= urlencode($row['job_ref_j']) ?>">View Details >></a></nav>
            </section>
        <?php
            endwhile;
        else:
            echo "<p>No job listings found.</p>";
        endif;
        ?>
    </article>

    <aside class="photo-aside">
        <figure class="photo-card">
            <figcaption>You wouldn't say no to a cute kitty now, would you?</figcaption>
            <img src="styles/images/pleading-cat.webp" alt="pleading cat" loading="lazy">
            <figcaption>JOIN US TODAY!!</figcaption>
        </figure>
    </aside>
</main>

<!-- Include footer -->
<?php include 'includes/footer.inc.php'; ?>
</body>
</html>
