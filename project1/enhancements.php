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
        <section class="enhancement_intro">
                <h1>List Of Enhancements</h1>
                <h3>What we have updated</h3>
        </section>
        <section class="content_background">
            <div>
                <h2>Enhancement 1: Access Control for Manage Page</h2>
                <p>
                The management page can only be accessed by authorized users thanks to this improvement. 
                In order to prevent unauthorized access to sensitive HR data, users who are not signed in are automatically redirected to the login page. 
                As a result, this enhancement keeps authorized personnel's experience seamless while enhancing security.
                </p>
            </div>
        </section>

         <section class="content_background">
            <div>
                <h2>Enhancement 2: Secure Login with Hashed Passwords</h2>
                <p>
                The user experience and security of the website are strengthened by this improvement. 
                Only authorized users can now access personalized content thanks to the login system's strong authentication. 
                Successful logins also result in customized sessions that give users access to features and access that are specific to them. 
                Consequently, this enhancement offers a smooth, user-focused experience along with improved security.
                </p>
            </div>
        </section>
        
        <section class="content_background">
            <div>
                <h2>Enhancement 3: Smart and Interactive Job Listings</h2>
                <p>
                This improvement greatly improves the functionality, presentation, and content of the website. 
                In particular, job postings are now completely interactive and dynamic, updating automatically from the database to guarantee correct and up-to-date information. 
                Additionally, users can effectively search and filter positions based on their preferences, including employment type, location, or job title. 
                Thus, this enhancement offers a technically complex solution that improves user engagement and expedites the application process by fusing cutting-edge database-driven features with an easy-to-use user interface.
                </p>
            </div>
        </section>
    </main>
   
     
      <!-- Footer inclusion -->
    <?php include 'footer.inc'; ?>
</body>
</html>