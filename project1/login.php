<!DOCTYPE html>
<html lang="en">

<!-- Meta data information and stylesheet -->
<?php
$pageTitle = "Login";
$pageDescription = "Login for company administrator";
$pageSpecificStyle = "authentication";
include('metadata.inc');
require_once 'settings.php';
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
?>

<body>
    <!-- Main Content -->
    <main>
        <form action="loginhandling.php" method="POST">
            <div class="content_background">
                <div class="left_aligned">
                    <img src="images/svg/logo.svg" alt="NetVision Logo" class="logo" />
                    <h1>Welcome back!</h1>
                    <h4>Use the admin account to manage application results and more.</h4>
                    <label for="adminusername">Username</label>
                    <input id="adminusername" type="text" name="username" pattern="[a-z0-9]+" title="Enter your username" placeholder="admin123" required>
                    <label for="adminpassword">Password</label>
                    <input id="adminpassword" type="password" name="password" title="Enter your password" placeholder="xxxxxxxx" required> 
                    <?php
                        if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
                            echo '<p class="error-message">Wrong username or password</p>';
                        }
                    ?>
                    <button type="submit" value="Login" class="primary">
                        Log In
                    </button>
                    <button class="secondary"><a href="signup.php">Sign Up</a></button>
                </div>
            </div>
        </form>
    </main>

</body>

</html>