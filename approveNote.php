<?php 
	require 'connect_Database.php';
	$note = $_GET['note_id'];
	$connectDatabase->query("update notes set adminApproval = 1 where note_id='$note'");

	header('location:note_approve.php');
 ?>