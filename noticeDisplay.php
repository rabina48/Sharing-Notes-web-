<?php 
session_start();

require 'connect_database.php';
?>

<html>
<?php include 'header.php'; ?>      <!-- header.php file contains all the html header element along with NAV elements-->

<?php 

if (isset($_GET['noticeId'])) {
	# code...
	$noticeId = $_GET['noticeId'];
	$notices = $connectDatabase->query("select * from notice where notice_id = $noticeId");	
	$noticeDetail = $notices->fetch();
}else{
	header('location:index.php');
}

?>
<div style="color: wheat;">
	
	<h2>NOTICE</h2>
</div>
<div>
	<h3 style="color: tomato;">Title:: <?php echo $noticeDetail['notice']; ?></h3>
</div>
<div style="background-color: white; padding: 20px; margin: 20px; width: 50%;">
	<h5>Notice</h5>
	<?php echo $noticeDetail['content']; ?>
</div>

</main>
</body>
</html>