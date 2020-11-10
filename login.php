<?php require "header.php"; ?>
<?php
/*
	


*/
$username = "";
$password = "";
$usertype = "";
$output = "";
$stickyusername = "";


if($_SERVER["REQUEST_METHOD"] == "POST")
{	
	
	$conn = db_connect();
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	
	$password = hash(HASH_ALGO, $password);
	$result = pg_execute($conn, "user_login", array($username, $password));
			
	if(pg_num_rows($result) != "")
	{
		$user = pg_fetch_assoc($result, 0);
			pg_execute($conn, "user_update_last_access", array(date("Y-m-d", time()), $user['user_id']));
			setcookie("LOGIN_COOKIE", $usernameresult, time() + COOKIE_LIFESPAN);
			$_SESSION['user'] = $user;
			
			if($user['user_type'] == ADMIN)
			{
				ob_flush();
				header('Location:./admin.php');
			}
			else if($user['user_type'] == CLIENT)
			{
				ob_flush();
				header('Location:./welcome.php');
			}
			else if($user['user_type'] == AGENT)
			{
				ob_flush();
				header('Location:./dashboard.php');
			}
			else if($user['user_type'] == PENDING)
			{
				$output = "Your account has not yet been approved.";
			}
			else if(strpos($user['user_type'], DISABLED) !== FALSE)
			{
				$output = "Your account has been disabled.";
			}
		
	}	
	else
	{
		$output = "Login id/password combination not found, please try again";
	}
}	

?>
<div id="content-container"align="center">
<h2><?php echo $message; ?></h2>
<h2><?php echo $output; ?></h2>

<p>Enter your login ID and password to connect to this system<br/>
</p>
<form name="Input" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table border="0" bgcolor="#adcbe3" cellpadding="10" >
<tr>
	<td><strong>Login ID</strong></td>
	<td><input type="text" name="username" value="<?php echo $stickyusername; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>Password</strong></td>	
	<td><input type="password" name="password" value="" size="20" /></td>
</tr>
</table>
<table cellspacing="10" >
<tr>
	<td><input type="submit" value = "Log In" /></td>
	
	<td><input type="reset" value = "Reset" /></td>
</tr>
</table>
</form>
<p>

<div id="footer-container" align = "left">
<?php include "footer.php"; ?>
</div>
</div>
