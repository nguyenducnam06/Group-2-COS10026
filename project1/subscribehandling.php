<?php
session_start();
require_once("settings.php");
mysqli_report(MYSQLI_REPORT_OFF);
$dbconn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$dbconn) {
    header("Location: index.php");
    exit();
}

// Email validation and filter if it is valid to post
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION["subscribe"] = "invalid";
    header("Location: index.php#newsletter-section");
    exit();
}

// Get user email
$email = trim( $_POST['email']);

// SQL query
$sql="INSERT INTO subscription (Email) VALUES (?)";
$stmt = $dbconn->prepare($sql);

// Fail query
if (!$stmt) {
    $_SESSION["subscribe"] = "error";
    header("Location: index.php#newsletter-section");
    exit();
}

$stmt->bind_param("s", $email);

// Execute the query and the results in order
if ($stmt->execute()) {
    $_SESSION['subscribe'] = 'success';
    header("Location: index.php#newsletter-section");
    exit();
} else
    if ($dbconn->errno == 1062) {    
        $_SESSION['subscribe'] = 'existed';
        header( "Location: index.php#newsletter-section");
        exit();
    } else {
        $_SESSION["subscribe"] = "error";
        header("Location: index.php#newsletter-section");
        exit();
    }

$stmt->close();
$dbconn->close();
?>