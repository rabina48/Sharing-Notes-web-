<?php 
	$database_username = 'root';	// variable stores username of databse
	$database_hostname ='localhost';	// variable stores hostname of database
	$database_name = 'admin';	// variable stores name of databse (table)
	$database_password ='';

	$connectDatabase = new pdo("mysql:host=$database_hostname;dbname=$database_name", $database_username, $database_password); // new pdo object to acces the database of xampp
