<?php 
session_start();
	// echo "string";
if(!isset($_SESSION['login_admin'])){
	header('location:admin_log.php');	
		// echo 'helo';
}

include 'sidenav.php';

if (isset($_POST['addNotice'])) {
	# code...

	extract($_POST);
	$date = date("Y-m-d");
	// echo $noticeContent;
	// echo $date;
	$connectDatabase->query("insert into notice (notice, date, content) values ('$notice', '$date', '$noticeContent')");
}
?>

<?php  ?>

<div class="content">
	<h1>ADD NOTICE</h1>

	<form method="POST" action="addNotice.php">
		<input type="text" style="padding: 5px 0; margin: 5px 0;" placeholder="Notice Title ....." name="notice"><br>
		<textarea cols="50" rows="10" name="noticeContent" placeholder="Add New Notice...."></textarea>
		<br>
		<input style="padding: 10px 20px;" type="submit" name="addNotice" value ="add">
	</form>

</div>
</body>
</html>