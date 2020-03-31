<?php 
session_start();

require 'connect_database.php';
?>

<html>
<?php include 'header.php'; ?>      <!-- header.php file contains all the html header element along with NAV elements-->

<?php 

$notices = $connectDatabase->query("select * from notice order by date desc");
?>
<table border=1 style="background-color: white; margin-top: 20px; margin-left: 40%">
	<tr>
		<th>S.N</th>
		<th>Title</th>
		<th>Date</th>
		<th>View</th>
	</tr>
	<?php 
	$counter = 0;
		foreach ($notices as $singleNotice) {
			# code...
			echo '<tr>';
			echo '<td>'.++$counter.'</td>';
			echo '<td>'.$singleNotice['notice'].'</td>';
			echo '<td>'.$singleNotice['date'].'</td>';
			echo '<td><a href="noticeDisplay.php?noticeId='.$singleNotice['notice_id'].'">Details</td>';

		}
		
	 ?>

</table>



		</main>
	</body>
	</html>