<?php
session_start();
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


    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);

    header( "Location: manage.php");
    exit();
} else {
    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);

    header("Location: login.php?error=invalid");
    exit();
}
?>