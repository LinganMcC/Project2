<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: stafflogin.php');
    exit();
}

include_once __DIR__ . '/settings.php';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Filter variables from GET 
$filter_by = $_GET['filter_by'] ?? 'all';
$jobref = $_GET['jobref'] ?? '';
$name = $_GET['name'] ?? '';
$sort_by = $_GET['sort_by'] ?? 'EOInumber';

$allowed_sort = ['EOInumber', 'JobReference', 'FirstName', 'LastName', 'Status'];
if (!in_array($sort_by, $allowed_sort)) {
    $sort_by = 'EOInumber';
}

// Build base SQL
$sql = "SELECT * FROM eoi";
$where = [];
$params = [];
$types = "";

// Add filters
if ($filter_by === 'jobref' && in_array($jobref, ['CEN19', 'CSS44', 'ITT02'])) {
    $where[] = "JobReference = ?";
    $params[] = $jobref;
    $types .= "s";
} elseif ($filter_by === 'name' && !empty($name)) {
    $where[] = "(FirstName LIKE ? OR LastName LIKE ?)";
    $name_param = "%$name%";
    $params[] = $name_param;
    $params[] = $name_param;
    $types .= "ss";
}

if ($where) {
    $sql .= " WHERE " . implode(' AND ', $where);
}

// Add sorting
$sql .= " ORDER BY $sort_by";

$stmt = $conn->prepare($sql);
if ($params) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

// Handle delete or status change via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_jobref'])) {
        $del_ref = $_POST['delete_jobref'];
        $del_stmt = $conn->prepare("DELETE FROM eoi WHERE JobReference = ?");
        $del_stmt->bind_param("s", $del_ref);
        $del_stmt->execute();
        $del_stmt->close();
        header("Location: manage.php");
        exit();
    }

    if (isset($_POST['status_change_jobref'], $_POST['new_status'])) {
        $change_ref = $_POST['status_change_jobref'];
        $new_status = $_POST['new_status'];
        if (in_array($new_status, ['New', 'Current', 'Final'])) {
            $update_stmt = $conn->prepare("UPDATE eoi SET Status = ? WHERE JobReference = ?");
            $update_stmt->bind_param("ss", $new_status, $change_ref);
            $update_stmt->execute();
            $update_stmt->close();
            header("Location: manage.php");
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage EOIs - EcruSoft Solutions</title>
    <link href="styles/styles.css" rel="stylesheet" />
    <link href="styles/layout.css" rel="stylesheet" />
    <style>
      main { max-width: 900px; margin: 2rem auto; padding: 1rem; background: #f7f7f7; border-radius: 8px; }
      form.filter-form { margin-bottom: 2rem; }
      form.filter-form label, form.filter-form select, form.filter-form input { margin-right: 1rem; }
      table { width: 100%; border-collapse: collapse; }
      th, td { padding: 8px; border: 1px solid #ddd; text-align: left; }
      th { background-color: #333; color: white; }
      tr:nth-child(even) { background-color: #f2f2f2; }
      .button { padding: 6px 12px; margin: 0 4px; border: none; background-color: #0066cc; color: white; cursor: pointer; border-radius: 4px; }
      .button:hover { background-color: #004999; }
      .status-select { padding: 4px; }
    </style>
</head>
<body>
<?php include 'includes/navbar.inc.php'; ?>

<main>
  <h1>Manage EOIs</h1>

  <!-- Filter and Sort Form -->
  <form method="get" class="filter-form">
    <label for="filter_by">Filter by:</label>
    <select name="filter_by" id="filter_by" onchange="this.form.submit()">
      <option value="all" <?= $filter_by === 'all' ? 'selected' : '' ?>>All EOIs</option>
      <option value="jobref" <?= $filter_by === 'jobref' ? 'selected' : '' ?>>Job Reference</option>
      <option value="name" <?= $filter_by === 'name' ? 'selected' : '' ?>>Applicant Name</option>
    </select>

    <?php if ($filter_by === 'jobref'): ?>
      <label for="jobref">Job Reference:</label>
      <select name="jobref" id="jobref">
        <option value="CEN19" <?= $jobref === 'CEN19' ? 'selected' : '' ?>>CEN19</option>
        <option value="CSS44" <?= $jobref === 'CSS44' ? 'selected' : '' ?>>CSS44</option>
        <option value="ITT02" <?= $jobref === 'ITT02' ? 'selected' : '' ?>>ITT02</option>
      </select>
    <?php elseif ($filter_by === 'name'): ?>
      <label for="name">Applicant Name:</label>
      <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" />
    <?php endif; ?>

    <label for="sort_by">Sort by:</label>
    <select name="sort_by" id="sort_by" onchange="this.form.submit()">
      <option value="EOInumber" <?= $sort_by === 'EOInumber' ? 'selected' : '' ?>>EOInumber</option>
      <option value="JobReference" <?= $sort_by === 'JobReference' ? 'selected' : '' ?>>Job Reference</option>
      <option value="FirstName" <?= $sort_by === 'FirstName' ? 'selected' : '' ?>>First Name</option>
      <option value="LastName" <?= $sort_by === 'LastName' ? 'selected' : '' ?>>Last Name</option>
      <option value="Status" <?= $sort_by === 'Status' ? 'selected' : '' ?>>Status</option>
    </select>

    <button type="submit" class="button">Apply</button>
  </form>

  <!-- EOIs Table -->
  <table>
    <thead>
      <tr>
        <th>EOInumber</th>
        <th>Job Reference</th>
        <th>Applicant Name</th>
        <th>Status</th>
        <th>Change Status</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['EOInumber']) ?></td>
          <td><?= htmlspecialchars($row['JobReference']) ?></td>
          <td><?= htmlspecialchars($row['FirstName'] . ' ' . $row['LastName']) ?></td>
          <td><?= htmlspecialchars($row['Status']) ?></td>
          <td>
            <form method="post" style="display:inline;">
              <input type="hidden" name="status_change_jobref" value="<?= htmlspecialchars($row['JobReference']) ?>" />
              <select name="new_status" class="status-select" onchange="this.form.submit()">
                <option value="New" <?= $row['Status'] === 'New' ? 'selected' : '' ?>>New</option>
                <option value="Current" <?= $row['Status'] === 'Current' ? 'selected' : '' ?>>Current</option>
                <option value="Final" <?= $row['Status'] === 'Final' ? 'selected' : '' ?>>Final</option>
              </select>
            </form>
          </td>
          <td>
            <form method="post" onsubmit="return confirm('Delete all EOIs with Job Reference <?= htmlspecialchars($row['JobReference']) ?>?');">
              <input type="hidden" name="delete_jobref" value="<?= htmlspecialchars($row['JobReference']) ?>" />
              <button type="submit" class="button" style="background:#cc0000;">Delete</button>
            </form>
          </td>
        </tr>
      <?php endwhile; ?>
      <?php
      $stmt->close();
      $conn->close();
      ?>
    </tbody>
  </table>
</main>

<?php include 'includes/footer.inc.php'; ?>
</body>
</html>
