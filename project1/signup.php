<!DOCTYPE html>
<html lang="en">

<!-- Meta data information and stylesheet -->
<?php
session_start();
$pageTitle = "Sign Up";
$pageDescription = "Create a new manager account";
$pageSpecificStyle = "authentication";
include('metadata.inc');
require_once 'settings.php';
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
?>

<body>
    <!-- Main Content -->
    <main>
        <form action="signuphandling.php" method="POST">
            <div class="content_background">
                <div class="left_aligned">
                    <img src="images/svg/logo.svg" alt="NetVision Logo" class="logo" />
                    <h1>Create your admin account</h1>
                    <h4>One account for full access</h4>
                    <label for="role">Your Role</label>
                    <select id="role" name="role" required>
                        <option value="">--Select Role--</option>
                        <option value="CEO">CEO</option>
                        <option value="Manager">Manager</option>
                        <option value="Deputy Manager">Deputy Manager</option>
                        <option value="Head of Recruitment">Head of Recruitment</option>
                        <option value="Team Leader">Team Leader</option>
                    </select>
                    <label for="adminusername">Display Name</label>
                    <input id="adminusername" type="text" name="displayname" pattern="^[a-zA-Z\s]+$" title="Enter your name" placeholder="Lily Johnson" required>
                    <label for="adminusername">Username</label>
                    <input id="adminusername" type="text" name="username" pattern="[a-z0-9]+" title="Enter your username" placeholder="username123" required>
                    <label for="adminpassword">Password</label>
                    <input id="adminpassword" type="password" name="password" title="Enter your password" placeholder="xxxxxxxx" required> 
                    <label for="confirmadminpassword">Confirm Your Password</label>
                    <input id="confirmadminpassword" type="password" name="confirmpassword" title="Confirm your password" placeholder="xxxxxxxx" required> 
                    
                    <?php 
                        if (isset($_SESSION['signup'])) {
                            if ($_SESSION['signup'] == 'existed') {
                                echo '<h5>This username already exists, please enter another username</h5>';
                            } else if ($_SESSION['signup'] == 'unmatch') {
                                echo '<h5>The confirm password does not match, please check again</h5>';
                            } else {
                                echo '<h5>Oops! There was an error, please try again latter</h5>';
                            }
                            unset($_SESSION['signup']);
                        }
                    ?>
                    <button type="submit" value="Signup" class="primary">
                        Create Account
                    </button>
                </div>
            </div>
        </form>
    </main>

</body>

</html>