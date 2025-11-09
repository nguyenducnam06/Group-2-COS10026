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
    <!-- Footer inclusion -->
    <?php include 'footer.inc'; ?>
</body>
</html>