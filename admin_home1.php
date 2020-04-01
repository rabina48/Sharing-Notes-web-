<?php 
	session_start();
	// echo "string";
	if(!isset($_SESSION['login_admin'])){
		header('location:admin_log.php');	
		// echo 'helo';
	}
 ?>

<?php include 'sidenav.php' ?>

<div class="content">
		<h1>Dashboard</h1>
		<p>WELCOME ADMIN</p>
		<div id="box">
			<div class="box-top">News</div>
			<div class="box-panel">
				Here you can add edit delete.
			</div>
		</div>
		<div id="box">
			<div class="box-top">News</div>
			<div class="box-panel">
				Here you can add edit delete.
			</div>
		</div>
		<div id="box">
			<div class="box-top">News</div>
			<div class="box-panel">
				Here you can add edit delete.
			</div>
		</div>

	</div>
</body>
</html>