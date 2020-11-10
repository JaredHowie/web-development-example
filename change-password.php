<?php require "header.php"; ?>
<div id="content-container" align = "center">
<form name="passwordchange" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table border="0" bgcolor="#adcbe3" cellpadding="10" >
<tr>
	<td><strong>Current Password</strong></td>
	<td><input type="text" name="currentpassword" value="" size="20" /></td>
</tr>
<tr>
	<td><strong>New Password</strong></td>	
	<td><input type="password" name="newpassword" value="" size="20" /></td>
</tr>
<tr>	
	<td><strong>Confirm New Password</strong></td>	
	<td><input type="password" name="confirmnewpassword" value="" size="20" /></td>
</tr>
</table>
<table cellspacing="10" >
<tr>
	<td><input type="submit" value = "Change Password" /></td>
</tr>
</table>
</form>
<div id="footer-container" align = "left">
<?php include "footer.php"; ?>
</div>
</div>