<!-- Person In Charge: Nguyen Nhat Lam
 Student ID: 105553871
 Gemini Prompt for Job Description Content:  write job descriptions for these job titles: Junior network technician, intern business analysis, telesales, network engineer, network architect
  -->

<!DOCTYPE html>
<html lang="en">

<!-- Meta data information and stylesheet -->

<?php
$pageTitle = "Job Description";
$pageDescription = "Explore the various job opportunities at NetVision.";
$pageSpecificStyle = "jobs";
include('metadata.inc');
require_once 'settings.php';
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
?>

<body id="job">
    <!-- Header and Navigation Bar -->
    <?php include 'header.inc'; ?>

    <!-- Main Content -->
    <main>
        <!-- Back to top button -->
        <?php include 'backtotopbutton.inc'; ?>

        <!-- Top Section -->
        <section class="jobs_intro content_background">
            <!-- Video source: Canva.com -->
            <video autoplay muted playsinline>
                <source src="images/jobs.mp4" type="video/mp4">
            </video>
            <article class="left_aligned">
                <h1>Bring Your Vision<br>To Life</h1>
                <p>Explores your potentials <br>Find your desired career, bring your vision to life with
                    NetVision.<br>Becoming a part of the leading network company. Apply now!</p>
                <div class="row">
                    <a class="primary" href="apply.php">Apply Now</a>
                </div>
            </article>
        </section>

        <!-- Job Listings -->

        <h1 class="center_aligned">Your Available Opportunities</h1>
        <section class="input_with_button">
            <form action="jobs.php" method="GET">
                <label for="item" class="hidden">Search</label>
                <input type="text" name="search" id="search" placeholder="Search for jobs">
                <input type="submit" value="Search">
            </form>
        </section>
        <?php
        if (!$dbconn) {
            echo "<p>Database connection failure</p>";
            exit;
        } else {
            if (isset($_GET['search'])) {
                $search = mysqli_real_escape_string($dbconn, $_GET['search']);
                $sql = "SELECT * FROM jobs WHERE JobTitle LIKE '%$search%' OR RefNum LIKE '%$search%' OR Location LIKE '%$search%' OR Supervisor LIKE '%$search%' OR EmpType LIKE '%$search%' OR ExpLevel LIKE '%$search%' OR Description LIKE '%$search%'";
                $result = mysqli_query($dbconn, $sql);
            } else {
                $sql = "SELECT * FROM jobs";
                $result = mysqli_query($dbconn, $sql);
            }
            if (mysqli_num_rows($result) > 0) {
                echo "<section class=\"row\">";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<article class=\"job_card\">
                                <div class=\"title\">
                                    <img src=" . htmlspecialchars($row['Img']) . ">
                                    <div>
                                        <h3>" . htmlspecialchars($row['JobTitle']) . "</h3>
                                        <p>Reference Number: " . htmlspecialchars($row['RefNum']) . "</p>
                                    </div>
                                </div>
                                <h4>" . htmlspecialchars($row['Salary']) . " </h4>
                                <ul>
                                    <li>Location: " . htmlspecialchars($row['Location']) . "</li>
                                    <li>Direct Supervisor: " . htmlspecialchars($row['Supervisor']) . "</li>
                                    <li>Employment Type: " . htmlspecialchars($row['EmpType']) . "</li>
                                    <li>Experience Level: " . htmlspecialchars($row['ExpLevel']) . "</li>
                                </ul>
                                <p>" . htmlspecialchars($row['Description']) . "</p>
                                <a class=\"secondary\" href=\"#job" . htmlspecialchars($row['JobID']) . "\">Explore</a>
                            </article>";
                }
                echo "</section>";
            } else {
                echo "<p>No matching jobs found.</p>";
            }
            mysqli_free_result($result);
        }
        ?>
        <hr class="primary">

        <!-- Section 2: Jobs in Details -->
        <section class="row">
            <?php
            if (!$dbconn) {
                echo "<p>Database connection failure</p>";
                exit;
            } else {
                $sql1 = "SELECT * FROM jobs";
                $result1 = mysqli_query($dbconn, $sql1);
            }
            while ($jobs = mysqli_fetch_assoc($result1)) {
                echo " <div class=\"job_details\" id=\"job" . $jobs['JobID'] . "\">
                <article class=\"content\">
                <h2>" . htmlspecialchars($jobs['JobTitle']) . "</h2>
                <h5>" . htmlspecialchars($jobs['RefNum']) . "</h5>
                <p>" . htmlspecialchars($jobs['Description']) . "</p>
                <h3>Key Responsibilities:</h3> 
                <ol>";
                $sql2 = "SELECT * FROM responsibilities JOIN `jobs` ON responsibilities.JobID = jobs.JobID WHERE jobs.JobID = " . $jobs['JobID'];
                $result2 = mysqli_query($dbconn, $sql2);
                while ($resp = mysqli_fetch_assoc($result2)) {
                    echo "<li>" . htmlspecialchars($resp['Content']) . "</li>";
                }
                mysqli_free_result($result2);
                echo "</ol>";
                echo "<h3>Qualifications:</h3>
                <ol>
                <li> Essentials
                <ul>";
                $sql3 = "SELECT * FROM qualifications JOIN `jobs` ON qualifications.JobID = jobs.JobID WHERE Type = 'Essentials' AND jobs.JobID = " . $jobs['JobID'];
                $result3 = mysqli_query($dbconn, $sql3);
                while ($qual = mysqli_fetch_assoc($result3)) {
                    echo "<li>" . htmlspecialchars($qual['Content']) . "</li>";
                }
                mysqli_free_result($result3);
                echo "</ul>
                <li> Preferable
                <ul>";
                $sql4 = "SELECT * FROM qualifications JOIN `jobs` ON qualifications.JobID = jobs.JobID WHERE Type = 'Preferable' AND jobs.JobID = " . $jobs['JobID'];
                $result4 = mysqli_query($dbconn, $sql4);
                while ($qual = mysqli_fetch_assoc($result4)) {
                    echo "<li>" . htmlspecialchars($qual['Content']) . "</li>";
                }
                mysqli_free_result($result4);
                echo "</ul>
                </li>
                </ol>
                </article>
                <aside class=\"left_aligned content_background\">
                    <h3>" . htmlspecialchars($jobs['Salary']) . "</h3>
                    <div class=\"row\">
                        <img src=\"images/svg/location-green.svg\" alt=\"Location\">
                        <p>" . htmlspecialchars($jobs['Location']) . "</p>
                    </div>
                    <div class=\"row\">
                        <img src=\"images/svg/time.svg\" alt=\"time\">
                        <p>" . htmlspecialchars($jobs['EmpType']) . "</p>
                    </div>
                    <div class=\"row\">
                        <img src=\"images/svg/level.svg\" alt=\"level\">
                        <p>" . htmlspecialchars($jobs['ExpLevel']) . "</p>
                    </div>
                    <h3>Benefits</h3>
                    <ul>";
                $sql5 = "SELECT * FROM benefits JOIN jobs ON benefits.JobID = jobs.JobID WHERE jobs.JobID = " . $jobs['JobID'];
                $result5 = mysqli_query($dbconn, $sql5);
                while ($ben = mysqli_fetch_assoc($result5)) {
                    echo "<li>" . htmlspecialchars($ben['Content']) . "</li>";
                }
                mysqli_free_result($result5);
                echo "</ul>
                <a class=\"primary\" href=\"apply.php\">Apply Now</a>
                </aside>
                </div>
                <hr class=\"secondary\">";
            }
            mysqli_close($dbconn);
            ?>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'footer.inc'; ?>
</body>

</html>