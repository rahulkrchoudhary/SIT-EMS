<?php
require('dp.php');
if(isset($_POST['moveFile']) and isset($_POST['filename']))
{
	$filename=$_FILES['filename']['name'];
	$tempName=$_FILES['filename']['tempName'];
	if(isset($filename))
	{
	if(!empty($filename))
	{
		$location="MyFiles/";
		if(move_uploaded_file($tempName,$location.$filename));
		{
			echo 'File Uploaded';
		}
	}
	}	
}
?>
<html>
<head>
	<title>
		PHP move
	</title>
</head>
<body>
	<form action="upload2.php" method="post" enctype="multi/form-data">
		<input type="file" name="filename"><br><br>
		<input type="submit" name="moveFile" value="Upload">
	</form>
</body>
</html>