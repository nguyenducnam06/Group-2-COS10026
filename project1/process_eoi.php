<?php
// Prevent direct URL access
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: apply.php");
    exit();
}

require_once 'settings.php';
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// --- Function to sanitize user input ---
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// --- Generate random 5-character EOI number ---
function generateEOINumber($conn) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    do {
        $eoi = '';
        for ($i = 0; $i < 5; $i++) {
            $eoi .= $characters[rand(0, strlen($characters) - 1)];
        }
        // ensure uniqueness in database
        $check = mysqli_query($conn, "SELECT * FROM eoi WHERE EOINumber='$eoi'");
    } while (mysqli_num_rows($check) > 0);
    return $eoi;
}

// --- Collect and sanitize form data ---
$jobRef = sanitize($_POST['jobRef']);
$firstName = sanitize($_POST['firstName']);
$lastName = sanitize($_POST['lastName']);
$dob = sanitize($_POST['dob']);
$gender = sanitize($_POST['gender']);
$street = sanitize($_POST['street']);
$suburb = sanitize($_POST['suburb']);
$state = sanitize($_POST['state']);
$postcode = sanitize($_POST['postcode']);
$email = sanitize($_POST['email']);
$phone = sanitize($_POST['phone']);
$skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : '';
$otherSkills = sanitize($_POST['otherSkills']);
// --- re-Validate required fields ---
$errors = [];

if (!preg_match("/^[A-Za-z]+$/", $firstName)) $errors[] = "Invalid first name (letters only).";
if (!preg_match("/^[A-Za-z]+$/", $lastName)) $errors[] = "Invalid last name (letters only).";
if (!preg_match("/^\d{4}$/", $postcode)) $errors[] = "Postcode must be exactly 4 digits.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
if (!preg_match("/^\d{8,12}$/", $phone)) $errors[] = "Phone number must contain 8–12 digits.";
if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $dob) && !preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob))
    $errors[] = "Date of Birth must be in dd/mm/yyyy or yyyy-mm-dd format.";

if (empty($jobRef) || empty($firstName) || empty($lastName) || empty($email)) {
    $errors[] = "Please fill in all required fields.";
}

// --- Display errors if any ---
if (!empty($errors)) {
    echo "<h3>Form Validation Errors:</h3><ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul><a href='apply.php'>Go Back</a>";
    exit();
}

// --- Generate EOINumber ---
$EOINumber = generateEOINumber($conn);
$applyDate = date("Y-m-d H:i:s");

// --- Insert data into the table ---
$sql = "INSERT INTO eoi (EOINumber, JobRef, FirstName, LastName, DateOfBirth, Gender, StreetAddress, Suburb, State, Postcode, Email, Phone, Skills, OtherSkills, ApplyDate)
        VALUES ('$EOINumber', '$jobRef', '$firstName', '$lastName', '$dob', '$gender', '$street', '$suburb', '$state', '$postcode', '$email', '$phone', '$skills', '$otherSkills', '$applyDate')";

$applySuccess = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once "metadata.inc"; ?>
<body>
    <?php include 'header.inc'; ?>
    <main>

        <?php if ($applySuccess): ?>
            <h1>Application Submitted Successfully</h1>
            <h3>Thank you, your EOI has been recorded.</h3>

            <div>
                <h2>Your Submitted Details</h2>
                <p><strong>Job Reference:</strong> <?= $jobRef ?></p>
                <p><strong>Name:</strong> <?= $firstName . " " . $lastName ?></p>
                <p><strong>Date of Birth:</strong> <?= $dob ?></p>
                <p><strong>Gender:</strong> <?= $gender ?></p>
                <p><strong>Skills:</strong> <?= $skills ?></p>
                <?php if (!empty($otherSkills)): ?>
                    <p><strong>Other Skills:</strong> <?= $otherSkills ?></p>
                <?php endif; ?><br>
                <a href="apply.php" class="button primary">Submit Another Application</a>
            </div>

        <?php else: ?>
            <h1>Submission Failed</h1>
            <p>There was an issue saving your EOI. Please try again.</p>
            <p>Error: <?= mysqli_error($conn) ?></p><br>
            <a href="apply.php" class="button primary">Submit Another Application</a>
        <?php endif; ?>

    </main>
    <?php include_once "footer.inc"; ?>
</body>