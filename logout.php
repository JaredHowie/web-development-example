<?php require "header.php"; ?>
<?php
session_unset();
session_destroy();
session_start();
$_SESSION['message'] = "You have been successfully logged out.";
ob_flush();
header('Location:./login.php');
?>

<?php include "footer.php"; ?>