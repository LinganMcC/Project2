<?php
include 'includes/setting.inc.php';

$ref = isset($_GET['ref']) ? trim($_GET['ref']) : '';
if (empty($ref)) {
    die("Job reference missing.");
}

$stmt = $conn->prepare("SELECT * FROM jobs WHERE job_ref_j = ?");
$stmt->bind_param("s", $ref);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Job not found.");
}

$job = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Job description for <?= htmlspecialchars($job['job_title_j']) ?>">
    <meta name="keywords" content="job description, <?= htmlspecialchars($job['job_title_j']) ?>">
    <meta name="author" content="Justin Mac">
    <title><?= htmlspecialchars($job['job_title_j']) ?> - <?= htmlspecialchars($job['job_ref_j']) ?></title>
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/layout.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/navbar.inc.php'; ?>

<article class="jobs-description">
    <h2 class="jobs-h2"><?= htmlspecialchars($job['job_title_j']) ?> - <?= htmlspecialchars($job['job_ref_j']) ?></h2>
    <p><?= nl2br(htmlspecialchars($job['description_j'])) ?></p>

    <details class="dropdown">
        <summary class="jobs-h3">Salary Range:</summary>
        <ul><li><?= htmlspecialchars($job['salary_range_j']) ?></li></ul>
    </details>

    <details class="dropdown">
        <summary class="jobs-h3">Reports To:</summary>
        <ul><li><?= htmlspecialchars($job['report_to_j']) ?></li></ul>
    </details>

    <details class="dropdown">
        <summary class="jobs-h3">Key Responsibilities:</summary>
        <ol>
            <?php foreach (explode("\n", $job['key_responsibility_j']) as $resp): ?>
                <li><?= htmlspecialchars(trim($resp)) ?></li>
            <?php endforeach; ?>
        </ol>
    </details>

    <details class="dropdown">
        <summary class="jobs-h3">Qualifications:</summary>
        <ul>
            <li><strong>Essential:</strong>
                <ul>
                    <?php foreach (explode("\n", $job['essential_qualification_j']) as $qual): ?>
                        <li><?= htmlspecialchars(trim($qual)) ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><strong>Preferable:</strong>
                <ul>
                    <?php foreach (explode("\n", $job['preferable_qualification_j']) as $qual): ?>
                        <li><?= htmlspecialchars(trim($qual)) ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </details>
</article>

<a href="jobs.php" class="cta-button">Back</a>

<?php include 'includes/footer.inc.php'; ?>
</body>
</html>
