<?php 
require 'connect_database.php';

?>

<html>
<head>
	<title>Share Notes</title>
	<link rel ="stylesheet" type="text/css" href="css/admin_home1.css">
</head>
<body>
	<div id="header">
		<div class="logo"><a href="#">Share<span>Notes</span></a>
		</div>
	</div>

	<div id="conatiner">
		<div class="sidebar">
			<ul id="nav">
				<li><a class="selected" href="admin_home1.php">Dashboard</a></li>
				<li><a  href="note_approve.php">Approve</a></li>
				<li><a href="download.php">Download</a></li>
				<li><a href="addNotice.php">Notice</a></li>
				<li><a href="delete.php">Delete</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>

	</div>