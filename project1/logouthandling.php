<!-- End the session to log out-->
<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>