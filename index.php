<?php 
session_start();

require 'connect_database.php';
?>

<html>
<?php include 'header.php'; ?>      <!-- header.php file contains all the html header element along with NAV elements-->

<?php 
if(!isset($_SESSION['login'])){
	?>
	<div class="fullimg">
		<h2 class="homesub"> Hello every body please resister here! </h2>
		<!-- <h1 class="homeres"> For registration click below<h1> -->
			<!-- <br> -->

			<span class="buttonhome" onclick="registration.php">
				<a href="register.php">Register
				</span>
			</a>
			<br>

			<span style="color:white; float: right; margin-right: 20%;">SCROLL DOWN</span> 
		</div>
		<?php } ?>

		<main style="background-color: white; min-height: 100px; margin-top: 20px; margin-left: 5%; width: 60%;">

			<?php 

			if(isset($_GET['search'])){
				$key = $_GET['search'];
				$query=$connectDatabase->query("select * from notes where title like '%$key%' or subject_code like '%$key%' or faculty like '%$key%' or semester like '%$key%' or subject_name like '%$key%'");
			}else{
				$query=$connectDatabase->query("select * from notes where adminApproval = 1");	
			}
			echo "Latest Notes";
			
			$counter = 0;
			foreach ($query as $singleRow) {
				$counter++;
				echo '<div style="background-color:#ddd; margin: 10px 20px;"> <h3 style="margin: 0 auto; padding: 0 auto;">Title:: '.$singleRow['title'].'</h3>';
				echo '<span> Course Code:'.$singleRow['subject_code'].'&nbsp; || &nbsp;&nbsp; subject name: '.$singleRow['subject_name'].'&nbsp;&nbsp; || &nbsp;&nbsp; Faculty::'.$singleRow['faculty'].' &nbsp;&nbsp; || &nbsp;&nbsp; Semester:: '.$singleRow['semester'].'</span><br>';
				if(isset($_SESSION['login'])){
					echo '<a href="uploads/'.$singleRow['content'].'">Get Note</a></div>';	
				}else{
					echo 'Please <a href="user_log.php">Login</a> to access Notes</div>';
				}

				if($counter >= 4){
					
				}
				
			}
			?>


		</main>
	</body>
	</html>