<?php 
session_start();
	// echo "string";
if(!isset($_SESSION['login_admin'])){
	header('location:admin_log.php');	
		// echo 'helo';
}
require 'connect_database.php';
?>

<?php include 'sidenav.php' ?>

<div class="content">
	<h1>Dashboard</h1>
	<p>Approve Notes</p>

	<?php 
	$query = $connectDatabase->query("select * from notes where adminApproval = 0");

	echo '<table border="2"><thead>
	<tr>
	<th>
	SN
	</th>
	<th>
	Title
	</th>
	<th>
	Faculty
	</th>
	<th>
Action
</th>

	</tr>
	</thead>';
	echo '<tbody>';
	$count = 0;
	foreach ($query as $singleRow) {
		# code...
		// var_dump($singleRow);
		// echo '<br>';
		echo '<tr><td>'.++$count.'</td>';
		echo '<td>'.$singleRow['title'].'</td>';
		echo '<td>'.$singleRow['faculty'].'</td>';
		echo '<td> <a href="approveNote.php?note_id='.$singleRow['note_id'].'">Approve</a> / <a href="denyNote.php?note_id='.$singleRow['note_id'].'" onclick="return sureDelete()">Deny </a></td>';

	}
	echo '</tbody> </table>';
	?>

</div>
</body>
<script type="text/javascript">
	function sureDelete(){
		if(confirm("Do you sure to Delete??") == true){
			return true;
		}else{
			return false;
		}
		
	}
</script>
</html>