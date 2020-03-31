<?php
	session_start();

	if(isset($_SESSION['login'])){
		header('location:index.php');
	}

	$dbconn = new mysqli('localhost', 'root', '', 'admin'); //new connection to database

	if(isset($_POST["username"])) { //checking whether $_POST exists
		$username = $_POST["username"];
		$password = $_POST["pwd_1"];
		$password2 = $_POST["pwd_confirm"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		$gender = $_POST["gender"];
		
		$data = array($username, $password, $name, $email);
		$fieldnames = array("Username", "Password", "Name", "Email Address");
		$errors = array();

		for($i = 0;$i<4;$i++) {
			if($data[$i] == "") {
				array_push($errors, $fieldnames[$i] . " cannot be empty.");
			}
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) array_push($errors, "Email is in incorrect form.");
		if($password != $password2) array_push($errors, "Passwords donot match.");
		if(strlen(trim($password)) <8)
		{
			array_push($errors,"Password must be of 8 character");
		}
		if(
        
     !preg_match('`[A-Z]`',$password) // at least one upper case 
       
    )
		{
			array_push($errors,"Password must contain one Uppercase" );
		}
		if(
        
       !preg_match('`[0-9]`',$password) // at least one digit 
       
    )
		{
			array_push($errors, "Password must cotain one number");
		}

        

		if (empty($errors)) {
	        $sql = "INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `gender`) VALUES (NULL,'". $username ."', '". md5($password) ."', '". $name ."', '". $email ."', '". $gender ."');";

			$result = $dbconn->query($sql); //sql query

			if($result === TRUE) {  //if sql returns any value
				$_SESSION['login'] = $username;
				$error_msg = "<div class=\"errormsg\">Registration Successful!</div>";
				header('location:index.php');
			}
		} else {
			$error_msg = "<div class=\"errormsg\">";
			foreach($errors as $error) {
				$error_msg .= $error . "<br>";
			}
			$error_msg .= "</div>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin page</title>
		<link rel="stylesheet" href="css/login.css">
		<script type="text/javascript">
			function isEmpty(obj) {
				if (obj.length === 0) {
    				return true;
				} else {
					return false;
				}
			}

			function formsubmit() {
				var error = [];
				var fieldnames = ["Name", "Username", "Password", "Confirm Password", "Email Address"]
				var array = ["name", "username", "pwd_1", "pwd_2", "email"];
				for(let i = 0;i<5;i++) {
					if(document.getElementById(array[i]).value == "" || document.getElementById(array[i]).value == null) {
						error.push(i);
					}
				}
				if(!isEmpty(error)) {
					var alertmsg = "You can not leave the following fields empty: \n";
					for(let i=0;i<error.length;i++) {
						alertmsg += fieldnames[error[i]] + "\n";
					}
					alert(alertmsg);
				} else {
					var pwd1=document.getElementById("pwd_1").value;
				    var pwd2=document.getElementById("pwd_2").value;
					if(pwd1 != pwd2)
					{
							alert("Password doesnt match");
					}
				}
			}
		</script>
	</head>
	<body>
		<div class="loginBox">
			<img src="user.png" class="user">
			<h2>Register</h2>
			<form id="loginfrm" action="" method="POST">
			<?php if(isset($error_msg)) {echo $error_msg;} ?>
				<input type="text" id="name" name="name" placeholder="Name">
				<input type="text" id="username" name="username" placeholder="Username">
				<input type="email" id="email" name="email" placeholder="Email Address">
				<input type="password" id="pwd_1" name="pwd_1" placeholder="Password">
				<input type="password" id="pwd_2" name="pwd_confirm" placeholder="Confirm Password">
				<span class="su">Gender</span><select class="gender" name="gender">
					<option>Male</option>
					<option>Female</option>
				</select>
				<input type="submit" name="sbtbtn" value="Register">
			</form>
		</div>
	</body>
</html>
