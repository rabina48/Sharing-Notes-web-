<?php 
	require 'connect_Database.php';
	$note = $_GET['note_id'];
	$connectDatabase->query("delete from notes where note_id='$note'");

	header('location:note_approve.php');
 ?>