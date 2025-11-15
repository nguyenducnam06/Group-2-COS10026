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
                // Allowed sortable columns
                $allowedSort = ['FirstName', 'LastName', 'JobRef', 'ApplyDate', 'Status'];

                // Validate selected column
                $sortColumn = isset($_GET['sort']) && in_array($_GET['sort'], $allowedSort)
                    ? $_GET['sort']
                    : 'EOINumber';

                // Determine ASC or DESC
                $sortDir = (isset($_GET['dir']) && $_GET['dir'] === 'DESC') ? 'DESC' : 'ASC';

                // Reverse direction for next click
                $nextDir = ($sortDir === 'ASC') ? 'DESC' : 'ASC';

                // Arrow symbol
                function sortArrow($column, $sortColumn, $sortDir)
                {
                    if ($column !== $sortColumn) return "";
                    return $sortDir === "ASC" ? " ▲" : " ▼";
                }

                // Build SQL
                $sql = "SELECT * FROM eoi ORDER BY $sortColumn $sortDir";
                $result = mysqli_query($dbconn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                // Output table header
                    echo "<table>";
                    echo "<tr>
                <th>EOI Number</th>

                <th>
                    <a href='?sort=JobRef&dir=$nextDir'>Job Ref"
                        . sortArrow('JobRef', $sortColumn, $sortDir) .
                        "</a>
                </th>

                <th>
                    <a href='?sort=FirstName&dir=$nextDir'>First Name"
                        . sortArrow('FirstName', $sortColumn, $sortDir) .
                        "</a>
                </th>

                <th>
                    <a href='?sort=LastName&dir=$nextDir'>Last Name"
                        . sortArrow('LastName', $sortColumn, $sortDir) .
                        "</a>
                </th>

                <th>Email</th>

                <th>
                    <a href='?sort=Status&dir=$nextDir'>Status"
                        . sortArrow('Status', $sortColumn, $sortDir) .
                        "</a>
                </th>

                <th>Skills</th>

                <th>
                    <a href='?sort=ApplyDate&dir=$nextDir'>Apply Date"
                        . sortArrow('ApplyDate', $sortColumn, $sortDir) .
                        "</a>
                </th>
            </tr>";

                    // Output table rows
                    while ($row = mysqli_fetch_assoc($result)) {

                        // Status color class
                        $status = $row['Status'];
                        $class = "";
                        if ($status === "New Applicant") $class = "status-new";
                        elseif ($status === "Reviewed") $class = "status-reviewed";
                        elseif ($status === "Rejected") $class = "status-rejected";
                        elseif ($status === "Shortlisted") $class = "status-shortlisted";

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['EOINumber']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['JobRef']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                        echo "<td class='$class'>" . htmlspecialchars($row['Status']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Skills']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['ApplyDate']) . "</td>";
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
                            //retrieve status from database for styling
                            $status = $row['Status']; // retrieved from SQL
                            //CSS class based on value
                            $class = "";
                            if ($status === "New Applicant") {
                                $class = "status-new";
                            } elseif ($status === "Reviewed") {
                                $class = "status-reviewed";
                            } elseif ($status === "Rejected") {
                                $class = "status-rejected";
                            } elseif ($status === "Shortlisted") {
                                $class = "status-shortlisted";
                            }
                            echo "<td class='$class'>" . htmlspecialchars($row['Status']) . "</td>";
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

                    // delete from SQL
                    $sql = "DELETE FROM eoi WHERE JobRef = '$jobref'";
                    mysqli_query($dbconn, $sql);

                    // check how many rows were deleted
                    $rows_deleted = mysqli_affected_rows($dbconn);

                    if ($rows_deleted > 0) {
                        echo "<p class='collapse-result success'>
                    Successfully deleted <strong class='collapse-result'>$rows_deleted</strong> EOI(s) with Job Reference 
                    <strong class='collapse-result'>$jobref</strong>.</p>";
                    } else {
                        echo "<p class='collapse-result error'>
                    No EOIs were found with Job Reference 
                    <strong class='collapse-result'>$jobref</strong>.</p>";
                    }
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
                    <select id="collapse-option" name="new_status" required>
                        <option value="">--Set Status--</option>
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

                    echo "<p class='collapse-result'>Status for EOI <strong class='collapse-result'>$num</strong> successfully updated to <strong class='collapse-result'>$stat</strong>.</p>";
                }
                ?>
            </div>
        </div>

    </main>
    <?php include 'footer.inc'; ?>
</body>

</html>