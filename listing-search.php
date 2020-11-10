<?php require "header.php"; ?>
<div id="navigationbar">
	<a href="./login.php">Login</a>
	<a href="./register.php">Register</a>
</div>
<div id="content-container" align = "center">
<form name="search" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table bgcolor="#adcbe3" cellpadding="10" >
<tr>
	<td><strong>Search Terms</strong></td>
	<td><input type="text" name="search" value="" size="20" /></td>
</tr>
<table cellspacing="10" >
<tr>
	<td><input type="submit" value = "Search" /></td>
</tr>
</table>
</form>
<div id="footer-container" align = "left">
<?php include "footer.php"; ?>
</div>
</div>
