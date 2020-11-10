<?php require "header.php"; ?>
<?php
/*
	


*/
$username = "";
$password = "";
$usertype = "";
$output = "";
$stickyusername = "";
$usernameresult = "";
$passwordresult = "";
$loginusername = "";
$loginpassword = "";
$typeresult = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{	
	
	$conn = db_connect();
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	
	
	$sql = "SELECT user_id
	FROM users WHERE user_id = '".$username . "';";
	$loginusername = pg_query($conn, $sql);
	$usernameresult= pg_fetch_result($loginusername, "user_id");
	
	
	$sql = "SELECT password
	FROM users WHERE user_id = '".$username ."';";
	$loginpassword = pg_query($conn, $sql);
	$passwordresult = pg_fetch_result($loginpassword, "password");
	
	$password = hash("md5", $password);
	if($passwordresult == $password)
	{
		if($usernameresult != "" && $passwordresult != "")
		{
			setcookie("LOGIN_COOKIE", $usernameresult, time() + COOKIE_LIFESPAN);
			$_SESSION['username'] = $usernameresult;
			$_SESSION['password'] = $password;

			$sql = "SELECT user_type
			FROM users
			WHERE user_id = '".$username . "' AND password = '".$password . "';";
			$usertype = pg_query($conn, $sql);
			$typeresult = pg_fetch_result($usertype, "user_type");
			
			if($typeresult == ADMIN)
			{
				ob_flush();
				header('Location:admin.php');
			}
			else if($typeresult == CLIENT)
			{
				ob_flush();
				header('Location:welcome.php');
			}
			else if($typeresult == AGENT)
			{
				ob_flush();
				header('Location:dashboard.php');
			}
			else if($typeresult == PENDING)
			{
				$output = "Your account has not yet been approved.";
			}
			else if(strpos($typeresult, 'd') == DISABLED)
			{
				$output = "Your account has been disabled.";
			}
		}
		else
		{
			$output = "The entered username and password could not be found";
		}
	}	
	else
	{
		$output = "The entered username and password could not be found";
	}
}	

?>
<div id="content-container"align="center">
<h2><?php echo $_SESSION['message']; ?></h2>
<h2><?php echo $output; ?></h2>
<h2>Please log in</h2>
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