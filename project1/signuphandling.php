<?php
session_start();
require_once("settings.php");
mysqli_report(flags: MYSQLI_REPORT_OFF);
$dbconn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$dbconn) {
    header("Location: login.php");
    exit();
}

// Get user input
$role = trim($_POST["role"]);
$displayname = trim($_POST["displayname"]);
$username = trim($_POST['username']);
$rawpassword = trim($_POST['password']);
$confirmpassword = trim($_POST['confirmpassword']);

// Check 2 passwords if they match
if ($rawpassword != $confirmpassword) {
    $_SESSION['signup'] = 'unmatch';
    header("Location: signup.php");
    exit();
}

$hashed_password = password_hash($rawpassword, PASSWORD_DEFAULT);

// SQL query
$sql = "INSERT INTO credentials (Username, DisplayName, Role, Password) VALUES (?, ?, ?, ?)";
$stmt = $dbconn->prepare($sql);

// Fail query
if (!$stmt) {
    $_SESSION["signup"] = "error";
    header("Location: signup.php");
    exit();
}

$stmt->bind_param("ssss", $username, $displayname, $role, $hashed_password);

// Execute the query and the results in order
if ($stmt->execute()) {
    $_SESSION['signup'] = 'success';
    header("Location: login.php");
    exit();
} else
    if ($dbconn->errno == 1062) {
    $_SESSION['signup'] = 'existed';
    header("Location: signup.php");
    exit();
} else {
    $_SESSION["signup"] = "error";
    header("Location: signup.php");
    exit();
}

$stmt->close();
$dbconn->close();
