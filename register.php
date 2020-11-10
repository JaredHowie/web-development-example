<?php require "header.php"; ?>
<?php
$stickyusername = "";
$stickyemail = "";
$stickyfirstname = "";
$stickylastname = "";
$stickyaddress1 = "";
$stickyaddress2 = "";
$stickypostalcode = "";
$stickyphone1 = "";
$stickyphone2 = "";
$stickyfax = "";
$stickycity = "";

?>
<form name="registration" method="post"  align ="center" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table border="0" bgcolor="#adcbe3" cellpadding="10" >
<tr>
	<td><strong>Login ID</strong></td>
	<td><input type="text" name="username" value="<?php echo $stickyusername; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>Password</strong></td>	
	<td><input type="password" name="password" value="" size="20" /></td>
</tr>
<tr>
	<td><strong>Confirm Password</strong></td>	
	<td><input type="password" name="confirmpassword" value="" size="20" /></td>
</tr>
<tr>
	<td><strong>First Name</strong></td>
	<td><input type="text" name="firstname" value="<?php echo $stickyfirstname; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>Last Name</strong></td>
	<td><input type="text" name="lastname" value="<?php echo $stickylastname; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>Email Address</strong></td>
	<td><input type="text" name="email" value="<?php echo $stickyemail; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>City</strong></td>
	<td><input type="text" name="city" value="<?php echo $stickycity; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>Street Address 1</strong></td>
	<td><input type="text" name="address1" value="<?php echo $stickyaddress1; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>Street Address 2</strong></td>
	<td><input type="text" name="address2" value="<?php echo $stickyaddress2; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>Postal Code</strong></td>
	<td><input type="text" name="postalcode" value="<?php echo $stickypostalcode; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>Phone Line 1</strong></td>
	<td><input type="text" name="phone1" value="<?php echo $stickyphone1; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>Phone Line 2</strong></td>
	<td><input type="text" name="phone2" value="<?php echo $stickyphone2; ?>" size="20" /></td>
</tr>
<tr>
	<td><strong>Fax</strong></td>
	<td><input type="text" name="fax" value="<?php echo $stickyfax; ?>" size="20" /></td>
</tr>
<tr>
	<td>
	<input type="radio" name="User Type">
	Client
	</td>
	<td>
	<input type="radio" name="User Type">
	Agent
	</td>
</tr>
<tr>
<td><input type="submit" value = "Create Account" /></td></tr>
</table>

</form>
<?php include "footer.php"; ?>