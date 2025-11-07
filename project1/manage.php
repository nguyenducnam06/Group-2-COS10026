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
        </main>
</body>
</html>