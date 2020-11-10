<?php require "header.php"; ?>
<?php
/*
$lastaccess = "";
$accessresult = "";
$email = "";
$emailresult = "";
$conn = db_connect();
$username = $_SESSION['username'];

$sql = "SELECT last_access
FROM users WHERE user_id = '". $username . "';";
$lastaccess = pg_query($conn, $sql);
$accessresult= pg_fetch_result($lastaccess, "last_access");

$sql = "SELECT email_address
FROM users WHERE user_id = '". $username . "';";
$email = pg_query($conn, $sql);
$emailresult= pg_fetch_result($email, "email_address");

update_access();
*/

$date = date("Y/m/d");
$user = $_SESSION['user'];
$username = $user['user_id'];
pg_execute($conn, 'user_update_last_access', array($date, $username));
?>
<div id="navigationbar">
	<a href="./logout.php">Logout</a>
</div>
<div id="content-container"align="center">
<?php

echo "Welcome ". $user['user_id']."! Your last access was on " . $user['last_access']. " and your email address is ".$user['email_address'];

?>

</br>
<div id="footer-container" align = "left">
<?php include "footer.php"; ?>
</div>
</div>