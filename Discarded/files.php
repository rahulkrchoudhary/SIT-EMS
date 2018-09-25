<?php

if(isset($_FILES['file']))
{
	$file_name = $_FILES['file']['name'];
	$file_tmp = $_FILES['file']['tmp_name'];
	$upload_folder = "uploads/";
	$movefile = move_uploaded_file($file_tmp, $upload_folder.$file_name);
	if ($movefile) {
			echo (" File moved Succesfully");
		}	
}


$str = "Hello, World";
$say=explode(",",$str);
foreach ($say as $key => $value) {
	echo nl2br("$value\n");
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" name="" value="upload">
	<a href="<?php $file=fopen("Paytm.docx", "r") ?>">Open file</a>
</form>
</body>
</html>