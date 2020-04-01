<?php 	session_start();

	if(isset($_SESSION['login_admin'])){
		header('location:admin_home1.php');
	}

	if(isset($_POST["username"])) { //checking whether $_POST exists
		$dbconn = new mysqli('localhost', 'root', '', 'admin'); //new connection to database
		$username = $_POST["username"];
		$password = $_POST["pwd"];

		$error_msg = "<div class=\"errormsg\">"; //html template for error

		$sql = "SELECT * FROM admin WHERE username = '" .$username." ' and password= '".$password."'"; //concatenation
		$result = $dbconn->query($sql); //sql query

		if($result->num_rows > 0) {  //if sql returns any value
			$_SESSION['login_admin'] = 'admin';
			header("Location:admin_home1.php"); //redirect to a new page
		} else {
			$error_msg .= "The username password combination is incorrect.</div>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin page</title>
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<div class="loginBox">
			<img src="user.png" class="user">
			<h2>Admin Login</h2>
			<form id="loginfrm" action="" method="POST">
			<?php if(isset($error_msg)) {echo $error_msg;} ?>
				<p>Email</p>
				<input type="text" name="username" placeholder="Username">
				<p>Password</p>
				<input type="password" name="pwd" placeholder="Password">
				<input type="submit" name="sbtbtn"  value="Sign In">
				<a href="#">Forget Password</a>
			</form>
		</div>
	</body>
</html>
