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
$pageTitle = "Manage EOIs";
$pageDescription = "Manage EOIs for job applications.";
$pageSpecificStyle = "manage";
include('metadata.inc');
require_once 'settings.php';
?>

<body>
    <?php include 'header.inc'; ?>
    <main>
        <h1>Welcome to the Manage Page, <?php echo htmlspecialchars($_SESSION['displayname']); ?>!</h1>
        <?php
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
        ?>

        <!-- List of all EOIS -->
        <div class="collapsible-wrapper">
            <input type="checkbox" id="eoi1" class="collapsible-toggle">
            <label for="eoi1" class="collapsible-label">List All EOIs</label>
            <div class="collapsible-content">
                <?php
                $sql = "SELECT * FROM eoi";
                $result = mysqli_query($dbconn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr><th>EOI Number</th><th>Job Ref</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Status</th></tr>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['EOINumber']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['JobRef']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Status']) . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No EOIs found.</p>";
                }
                ?>
            </div>
        </div>


        <!-- Search EOIs by jobRef number -->
        <div class="collapsible-wrapper">
            <input type="checkbox" id="eoi2" class="collapsible-toggle">
            <label for="eoi2" class="collapsible-label">List EOIs by Job Reference Number</label>
            <div class="collapsible-content">
                <form method="post">
                    <label class="collapse-title">Job Reference:</label>
                    <input type="text" name="search_jobref" required>
                    <button class="primary" type="submit">Search</button>
                </form>

                <?php
                if (isset($_POST['search_jobref'])) {
                    $jobref = mysqli_real_escape_string($dbconn, $_POST['search_jobref']);
                    $sql = "SELECT * FROM eoi WHERE JobRef = '$jobref'";
                    $result = mysqli_query($dbconn, $sql);

                    echo "<h3 class='collapse-result'>Search Results:</h3>";
                    if ($result && mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr><th>EOI Number</th><th>Name</th><th>Email</th><th>Status</th></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['EOINumber'] . "</td>";
                            echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td>" . $row['Status'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p class='collapse-result'>No results found for Job Ref: $jobref</p>";
                    }
                }
                ?>
            </div>
        </div>


        <!-- Search EOIs by name-->
        <div class="collapsible-wrapper">
            <input type="checkbox" id="eoi3" class="collapsible-toggle">
            <label for="eoi3" class="collapsible-label">Search EOIs by Applicant Name</label>
            <div class="collapsible-content">
                <form method="post">
                    <label class="collapse-title">First Name:</label>
                    <input type="text" name="fname">

                    <label class="collapse-title">Last Name:</label>
                    <input type="text" name="lname">

                    <button class="primary" type="submit">Search</button>
                </form>

                <?php
                if (!empty($_POST['fname']) || !empty($_POST['lname'])) {
                    $fname = mysqli_real_escape_string($dbconn, $_POST['fname']);
                    $lname = mysqli_real_escape_string($dbconn, $_POST['lname']);

                    $sql = "SELECT * FROM eoi WHERE 1=1";

                    if (!empty($fname)) $sql .= " AND FirstName LIKE '%$fname%'";
                    if (!empty($lname)) $sql .= " AND LastName LIKE '%$lname%'";

                    $result = mysqli_query($dbconn, $sql);

                    echo "<h3 class='collapse-result'>Search Results:</h3>";
                    if ($result && mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr><th>EOI Number</th><th>Job Ref</th><th>Name</th><th>Email</th></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['EOINumber'] . "</td>";
                            echo "<td>" . $row['JobRef'] . "</td>";
                            echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p class='collapse-result'>No matching applicants found.</p>";
                    }
                }
                ?>
            </div>
        </div>


        <!-- Delete EOIs by jobRef number -->
        <div class="collapsible-wrapper">
            <input type="checkbox" id="eoi4" class="collapsible-toggle">
            <label for="eoi4" class="collapsible-label">Delete EOIs (By Job Reference)</label>
            <div class="collapsible-content">
                <form method="post">
                    <label class="collapse-title">Job Reference to Delete:</label>
                    <input type="text" name="delete_jobref" required>
                    <button class="primary" type="submit">Delete</button>
                </form>

                <?php
                if (isset($_POST['delete_jobref'])) {
                    $jobref = mysqli_real_escape_string($dbconn, $_POST['delete_jobref']);
                    $sql = "DELETE FROM eoi WHERE JobRef = '$jobref'";
                    $delete_result = mysqli_query($dbconn, $sql);

                    echo "<p class='collapse-result'>All EOIs with Job Reference <strong>$jobref</strong> have been deleted.</p>";
                }
                ?>
            </div>
        </div>


        <!--Change EOIs status -->
        <div class="collapsible-wrapper">
            <input type="checkbox" id="eoi5" class="collapsible-toggle">
            <label for="eoi5" class="collapsible-label">Change EOI Status</label>
            <div class="collapsible-content">
                <form method="post">
                    <label class="collapse-title">EOI Number:</label>
                    <input type="text" name="status_eoinumber" required>

                    <label class="collapse-title">New Status:</label>
                    <select name="new_status" required>
                        <option value="New">New</option>
                        <option value="Reviewed">Reviewed</option>
                        <option value="Shortlisted">Shortlisted</option>
                        <option value="Rejected">Rejected</option>
                    </select>

                    <button class="primary" type="submit">Update</button>
                </form>

                <?php
                if (isset($_POST['status_eoinumber'])) {
                    $num = mysqli_real_escape_string($dbconn, $_POST['status_eoinumber']);
                    $stat = mysqli_real_escape_string($dbconn, $_POST['new_status']);

                    $sql = "UPDATE eoi SET Status = '$stat' WHERE EOINumber = '$num'";
                    mysqli_query($dbconn, $sql);

                    echo "<p class='collapse-result'>Status for EOI <strong>$num</strong> successfully updated to <strong>$stat</strong>.</p>";
                }
                ?>
            </div>
        </div>

    </main>
    <?php include 'footer.inc'; ?>
</body>

</html>