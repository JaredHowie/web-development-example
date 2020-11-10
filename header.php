<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./css/webd3201.css"/> 
<?php 
require './includes/constants.php'; 
require './includes/db.php';
require './includes/functions.php';

ob_start();

session_start();

$message = "";

if(isset($_SESSION['message']))
{
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}


?>
<body>
<div id="container">
	<div id="banner">
&nbsp;</div>
	<div id="headbar">
		<ul align = "center">
			<li  align = "right" class="active"><a href="index.html"><span>Home</span></a></li>
			<li align = "right" ><a href="#"><span>Thing</span></a></li>
			<li align = "right" ><a href="#"><span>Thing</span></a></li>
			<li align = "right" ><a href="#"><span>Thing</span></a></li>
			<li align = "right" ><a href="#"><span>Thing</span></a></li>
			<li class="last" align = "right" ><a href="#"><span>Thing</span></a></li>
		
		</ul>
	</div>
<div id="content-container">
	<div id="navigation">
		<h3>
			Site Navigation Bar
		</h3>
		<ul>
			<li><a href="./index.php">Homepage</a></li>
			<li><a href="./listing-search.php">Search</a></li>
		</ul>
	</div>
</div>