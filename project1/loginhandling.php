<?php
session_start();

// Initialize counters if missing
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
if (!isset($_SESSION['lockout_until'])) {
    $_SESSION['lockout_until'] = 0;
}

// Check if user is currently locked out
$currentTime = time();

if ($currentTime < $_SESSION['lockout_until']) {
    $remaining = $_SESSION['lockout_until'] - $currentTime;
    header("Location: login.php?error=locked&remaining=$remaining");
    exit();
}

require_once("settings.php");
$dbconn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$dbconn) {
    header("Location: login.php");
    exit();
}

// Get user input
$username = trim( $_POST['username']);
$password = trim($_POST['password']);

// Check credentials
$stmt = $dbconn->prepare("SELECT * FROM credentials WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = mysqli_fetch_assoc($result);

if (!$result) {
    echo "Query failed: " . mysqli_error($dbconn);
}

if ($user && password_verify($password, $user['Password'])) {
    session_regenerate_id(true);
    $_SESSION['userid'] = $user['UserID'];
    $_SESSION['username'] = $user['Username'];
    $_SESSION['displayname'] = $user['DisplayName'];
    $_SESSION['role'] = $user['Role'];
    $_SESSION['login_attempts'] = 0;
    $_SESSION['lockout_until'] = 0;


    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);

    header( "Location: manage.php");
    exit();
} else {
    // Increase attempt count
    $_SESSION['login_attempts']++;

    // Determine lockout time based on attempts
    $attempts = $_SESSION['login_attempts'];

    // For every block of 3 failures, increase lockout duration
    $block = floor($attempts / 3);

    // Lockout duration increases with each block
    if ($block > 0) {
        $durations = [5, 30, 60, 120, 300]; //expand for lockout durations in seconds
        $index = min($block - 1, count($durations) - 1);
        $lockout = $durations[$index];

        $_SESSION['lockout_until'] = time() + $lockout;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);

    header("Location: login.php?error=invalid");
    exit();
}
?>