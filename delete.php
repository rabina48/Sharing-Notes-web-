<?php
include 'sidenav.php' 
?>
<div class="content">
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("admin");

	

	$query=mysql_query("select * from notes");
	$rowcount=mysql_num_rows($query);

	if (isset($_REQUEST["submit"]))
		{
		$chk=$_REQUEST["chk"];
		$a=implode(",",$chk);

		mysql_query("delete from notes where note_id in($a)");
		header("refresh:0; url=delete.php");
		
	}
	

	?>

	<form method="POST">
		<table border="1" align="center">

			<tr>
				<th>note_id</th>
				<th>title</th>
				<th>Coursecode</th>
				<th>faculty</th>
				<th>semester</th>
				<th><input type="submit" value="delete" name="submit" onclick="return sureDelete()"></th>
			</tr>

			<?php
			for($i=1;$i<=$rowcount;$i++)
			{
				$row=mysql_fetch_array($query);

				?>

				<tr>
					<td><?php echo $row["note_id"] ?></td>
					<td><?php echo $row["title"] ?></td>
					<td><?php echo $row["subject_code"] ?></td>
					<td><?php echo $row["faculty"] ?></td>

					<td><?php echo $row["semester"] ?></td>

					<td><input type="checkbox"  name="chk[]" value="<?php echo $row["note_id"]?>"></td>
				</tr>

				<?php
			}
			?>

		</table>
	</form>
</div>
<script type="text/javascript">
	function sureDelete(){
		if(confirm("Do you sure to Delete??") == true){
			return true;
		}else{
			return false;
		}
		
	}
</script>