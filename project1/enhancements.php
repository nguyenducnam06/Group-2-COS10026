<!DOCTYPE html>
<html lang="en">

<!-- Meta data information and stylesheet -->
<?php
session_start();
$pageTitle = "Enhancement";
$pageDescription = "Details of features and improvements added to the application";
$pageSpecificStyle = "enhance";
include('metadata.inc');
?>
<!-- Body content -->
<body id="enhancements">
    <!-- Header inclusion -->
    <?php include 'header.inc'; ?>

    <main>
        <?php include 'backtotopbutton.inc'; ?>
        <section>
            <div class="center_aligned">
                <h1>List of Enhancements</h1>
        </section>
    </main>
   
     <section>
        <h2>Enhancement 1: Access Control for Manage Page</h2>
        <p>This enhancement ensures that only authorized users can access the management page.
                In <code>manage.php</code>, a PHP session variable (<code>$_SESSION['userid']</code>) 
                is checked before displaying any management content. 
                If the user is not logged in, they are automatically redirected to <code>login.php</code>.
                This prevents unauthorized users from directly accessing sensitive HR data.
            </p>
        </section>

        <section>
            <h2>Enhancement 2: Secure Login with Hashed Passwords</h2>
            <p>
                The login system, implemented in <code>login.php</code> and 
                <code>loginhandling.php</code>, uses secure authentication practices. 
                It applies prepared statements to prevent SQL injection and 
                uses PHP’s <code>password_hash()</code> and <code>password_verify()</code> 
                functions to handle encrypted passwords. 
                The <code>harsh.php</code> file was used to generate a hashed password for 
                insertion into the database. 
                Successful logins create session variables such as <code>userid</code> and 
                <code>displayname</code> for personalized access control.
            </p>
        </section>
     </section>
      <!-- Footer inclusion -->
    <?php include 'footer.inc'; ?>
</body>
</html>