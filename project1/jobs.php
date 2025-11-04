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
                    <a class="primary" href="apply.html">Apply Now</a>
                </div>
            </article>
        </section>

        <!-- Job Listings -->

        <h1 class="center_aligned">Your Available Opportunities</h1>
        <section class="input_with_button">
            <label for="search" class="hidden">Search</label>
            <input type="text" name="search" id="search" placeholder="Search for jobs" />
            <button class="primary">Search</button>
        </section>
        <?php
        if (!$dbconn) {
            echo "<p>Database connection failure</p>";
            exit;
        } else {
            if (isset($_GET['search'])) {
                $search = mysqli_real_escape_string($dbconn, $_GET['search']);
                $sql = "SELECT * FROM jobs WHERE MATCH (JobTitle, RefNum, Salary, Location, EmpType, ExpLevel, Description) AGAINST ('$search' IN NATURAL LANGUAGE MODE)";
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
                                <h4>$" . htmlspecialchars($row['Salary']) . " </h4>
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
                echo "No matching jobs found.";
            }
            mysqli_free_result($result);
            mysqli_close($dbconn);
        }
        ?>
        <hr class="primary">

        <!-- Section 2: Jobs in Details -->
        <section class="row">
            <div class="job_details" id="job1">
                <article class="content">
                    <h2>Junior Network Technician</h2>
                    <h5> JNT01</h5>
                    <!-- Brief introduction -->
                    <p> An entry-level role focused on the physical installation, configuration, and foundational
                        maintenance of network hardware (routers, switches, firewalls) and cabling infrastructure.
                        This role provides tier-1 support and assists senior team members in resolving network
                        incidents and fulfilling service requests.</p>
                    <h3>Key Responsibilities:</h3>
                    <ol>
                        <li>Perform hardware installation, racking, and stacking of new network devices (switches,
                            access points, etc.).</li>
                        <li>Execute and test network cable runs (Cat 6, fiber optics) and ensure proper patching and
                            labelling.</li>
                        <li>Monitor network performance and health using established monitoring tools, escalating
                            anomalies to senior staff.</li>
                        <li>Provide basic troubleshooting for connectivity issues, including TCP/IP configuration
                            problems and physical layer faults.</li>
                        <li>Maintain accurate inventory records of all network equipment and detailed documentation
                            of network changes.</li>
                        <li>Respond to and resolve Tier 1 network-related support tickets within defined service
                            level agreements (SLAs).</li>
                    </ol>
                    <h3>Qualifications:</h3>
                    <ol>
                        <li>Essentials
                            <ul>
                                <li>0-1 year of professional experience in an IT or technical support role.</li>
                                <li>Basic understanding of networking fundamentals, including TCP/IP, DNS, and DHCP.
                                </li>
                                <li>Possesses or actively pursuing the CompTIA Network+ certification.</li>
                                <li>Proven ability to troubleshoot hardware and software issues logically and
                                    efficiently.</li>
                                <li>Strong physical dexterity for working with network cabling and equipment.</li>
                            </ul>
                        </li>
                        <li>Preferable
                            <ul>
                                <li>Associate's degree in Information Technology or a related field.</li>
                                <li>Experience working with a ticketing system (e.g., ServiceNow, Jira).</li>
                                <li>Familiarity with basic command-line interface (CLI) configuration for Cisco or
                                    Juniper devices.</li>
                            </ul>
                        </li>
                    </ol>
                </article>

                <!-- shortlisted benefits of the job -->
                <aside class="left_aligned content_background">
                    <h3>$45,000 - $55,000 per annum</h3>
                    <div class="row">
                        <img src="images/svg/location-green.svg" alt="Location">
                        <p>Ha Noi</p>
                    </div>
                    <div class="row">
                        <img src="images/svg/time.svg" alt="time">
                        <p>Full-time</p>
                    </div>
                    <div class="row">
                        <img src="images/svg/level.svg" alt="level">
                        <p>Entry-level</p>
                    </div>
                    <h3>Benefits</h3>
                    <ul>
                        <li>Health, Dental, Vision Insurance</li>
                        <li>Certification and Training Reimbursement</li>
                        <li>Three weeks Paid Time Off (PTO)</li>
                    </ul>
                    <a class="primary" href="apply.html">Apply Now</a>
                </aside>
            </div>
            <hr class="secondary">

            <div class="job_details" id="job2">

                <article class="content">
                    <h2>Intern Business Analysis</h2>
                    <h5>IBA02</h5>
                    <!-- Brief introduction -->
                    <p>A structured 3-6 month internship designed to immerse the candidate in the process of
                        gathering, documenting, and analyzing business requirements to support the development and
                        deployment of IT solutions and services within the network administration context.</p>
                    <h3>Key Responsibilities:</h3>
                    <ol>
                        <li>Assist the Senior Business Analyst in conducting stakeholder interviews and requirements
                            gathering workshops.</li>
                        <li>Document current-state "as-is" and future-state "to-be" business processes using
                            flowcharts and diagrams.</li>
                        <li>Translate high-level business needs into detailed functional and non-functional
                            requirements documents.</li>
                        <li>Support the analysis of operational data to identify process gaps and opportunities for
                            efficiency improvements.</li>
                        <li>Participate in quality assurance (QA) testing to ensure delivered solutions meet
                            specified requirements.</li>
                    </ol>
                    <h3>Qualifications:</h3>
                    <ol>
                        <li>Essentials
                            <ul>
                                <li>Currently pursuing a Bachelor's or Master's degree in Business Administration,
                                    Information Systems, or Computer Science.</li>
                                <li>Excellent written and verbal communication skills, including active listening and
                                    professional interviewing.</li>
                                <li>Demonstrated analytical and problem-solving abilities.</li>
                                <li>Proficiency in Microsoft Office Suite (Word, Excel, PowerPoint).</li>
                            </ul>
                        </li>
                        <li>Preferable
                            <ul>
                                <li>Basic knowledge of SQL for data querying and analysis.</li>
                                <li>Familiarity with standard business process modeling notation (BPMN).</li>
                                <li>Experience with diagramming tools such as Microsoft Visio or Lucidchart.</li>
                            </ul>
                        </li>
                    </ol>
                </article>

                <!-- shortlisted benefits of the job -->
                <aside class="left_aligned content_background">
                    <h3>$18 - $22 per hour</h3>
                    <div class="row">
                        <img src="images/svg/location-green.svg" alt="Location">
                        <p>Ha Noi</p>
                    </div>
                    <div class="row">
                        <img src="images/svg/time.svg" alt="time">
                        <p>Internship</p>
                    </div>
                    <div class="row">
                        <img src="images/svg/level.svg" alt="level">
                        <p>Intern</p>
                    </div>
                    <h3>Benefits</h3>
                    <ul>
                        <li>Mentorship from Experts</li>
                        <li>Networking Opportunities</li>
                        <li>Potential for Full-time Employment</li>
                    </ul>
                    <a class="primary" href="apply.html">Apply Now</a>
                </aside>
            </div>
            <hr class="secondary">

            <div class="job_details" id="job3">
                <article class="content">
                    <h2>Telephone Sales Representative</h2>
                    <h5>TSL03</h5>
                    <!-- Brief introduction -->
                    <p>A sales role responsible for driving revenue growth by making outbound calls, responding to
                        inbound inquiries, and selling our network administration services.</p>
                    <h3>Key Responsibilities:</h3>
                    <ol>
                        <li>Conduct high-volume outbound calls (cold calling) to prospective clients to identify
                            potential sales opportunities.</li>
                        <li>Qualify leads effectively, determining the prospect's needs, budget, and purchasing
                            timeline.</li>
                        <li>Clearly articulate the value proposition of the company's network and IT support
                            services to non-technical decision-makers.</li>
                        <li>Manage and maintain a sales pipeline using the company's Customer Relationship
                            Management (CRM) system.</li>
                        <li>Consistently achieve monthly and quarterly sales targets and key performance indicators
                            (KPIs).</li>
                    </ol>
                    <h3>Qualifications:</h3>
                    <ol>
                        <li>Essentials
                            <ul>
                                <li>1+ years of proven success in a high-volume telesales, telemarketing, or lead
                                    generation role.</li>
                                <li>Exceptional verbal communication and negotiation skills, with a confident telephone
                                    presence.</li>
                                <li>Resilience and persistence in handling objections and rejection.</li>
                                <li>Proficiency in using CRM software for tracking sales activities and managing
                                    contacts.</li>
                            </ul>
                        </li>
                        <li>Preferable
                            <ul>
                                <li>Experience selling technical products or B2B IT/Managed Services.</li>
                                <li>Familiarity with basic networking terminology (e.g., Wi-Fi, VPN, firewall).</li>
                            </ul>
                        </li>
                    </ol>
                </article>

                <!-- shortlisted benefits of the job -->
                <aside class="left_aligned content_background">
                    <h3>$40,000 - $50,000 base <br> + commission</h3>
                    <div class="row">
                        <img src="images/svg/location-green.svg" alt="Location">
                        <p>Ha Noi</p>
                    </div>
                    <div class="row">
                        <img src="images/svg/time.svg" alt="time">
                        <p>Full-time</p>
                    </div>
                    <div class="row">
                        <img src="images/svg/level.svg" alt="level">
                        <p>Entry-level</p>
                    </div>
                    <h3>Benefits</h3>
                    <ul>
                        <li>Base Salary + Commission Structure</li>
                        <li>Health Insurance Package</li>
                        <li>Training and Development Programs</li>
                        <li>Opportunities for Career Advancement</li>
                    </ul>
                    <a class="primary" href="apply.html">Apply Now</a>
                </aside>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'footer.inc'; ?>
</body>

</html>