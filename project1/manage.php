<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Meta data information and stylesheet -->
<?php
$pageTitle = "Login";
$pageDescription = "Login for company administrator";
$pageSpecificStyle = "login";
include('metadata.inc');
require_once 'settings.php';
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
?>

<body>
    <?php include 'header.inc'; ?>
    <main>
        <h1>Welcome to the Manage Page, <?php echo htmlspecialchars($_SESSION['displayname']); ?>!</h1>
        <?php
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
        $section_title = "View Subscriptions";
        $sql = "SELECT * FROM subscriptions";
        $result = mysqli_query($dbconn, $sql);

        ?>
        <div class="collapsible-container">
            <button class="collapsible"><?php echo $section_title; ?></button>
            <div class="collapsible-content">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr><th>Subscription ID</th><th>User ID</th><th>Plan</th><th>Start Date</th><th>End Date</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['subscription_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['plan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['end_date']) . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No subscriptions found.</p>";
                }
                mysqli_close($dbconn);
                ?>
            </div>
        </div>
    </main>
    <?php include 'footer.inc'; ?>
</body>

</html>