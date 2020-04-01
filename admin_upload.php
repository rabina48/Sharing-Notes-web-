
<html>
<head>
	<title>Share Notes</title>
	<link rel ="stylesheet" type="text/css" href="css/admin_home1.css">
</head>
<body>
<div id="header">
<div class="logo"><a href="#">Share<span>Notes</span></a>
</div>
</div>
<div id="conatiner">
	<div class="sidebar">
		<ul id="nav">
			<li><a class="selected" href="admin_home1.php">Dashboard</a></li>
			<li><a  href="admin_upload.php">Upload</a></li>
			<li><a href="admin_download.php">Download</a></li>
			<li><a href="#">Edit</a></li>
			<li><a href="#">Delete</a></li>
		</ul>
	</div>
	<div class="content">

		<h1>Upload</h1>
		<div>Select which semester do you want to upload a file..
		<select name="upfile" id="upfile">
			<option value="nothing" selected="selected">select the sem</option>
		<option value="sem_wise_course/1st_sem.php">1st sem</option>
		<option value="sem_wise_course/2nd_sem.php">2nd sem</option>
		<option value="sem_wise_course/3rd_sem.php">3rd sem</option>
		<option value="sem_wise_course/4th_sem.php">4th sem</option>
		<option value="sem_wise_course/5th_sem.php">5th sem</option>
		<option value="sem_wise_course/6th_sem.php">6th sem</option>
		<option value="sem_wise_course/7th_sem.php">7th sem</option>
		<option value="sem_wise_course/8th_sem.php">8th sem</option>
		</select> 
</div>

		
	</div>


<script type="text/javascript">
	var urlMenu=document.getElementById('upfile')
	urlMenu.onchange = function()
	{
		var userOption = this.options[this.selectedIndex];
		if(userOption.value !="nothing")
		{
			window.open(userOption.value,"Course list","");
		}
	}
</script>
</body>
</html>