<?php require "header.php"; ?>
<?php
$lastaccess = "";
$accessresult = "";
$email = "";
$emailresult = "";
$conn = db_connect();
$userdetails = $_SESSION['user'];
?>
<div id="navigationbar">
	<a href="./logout.php">Logout</a>
</div>
<div id="content-container"align="center">
<?php
echo "Welcome ". $userdetails['user_id']."! Your last access was on " . $userdetails['last_access']. " and your email address is ".$userdetails['email_address'];

?>
</br>
<a href="./listing-create.php">Create A Listing</a>
</br>
<div id="footer-container" align = "left">
<?php include "footer.php"; ?>
</div>
</div>