<?php
if(isset($_POST['submit']))
{
	$name=$_POST['fname'];
	$email=$_POST['email'];
	$file_open = fopen("contact_data.csv","a");
	$no_rows = count(file("contact_data.csv"));
	if($no_rows > 1)
	{
		$no_rows = ($no_rows - 1) + 1;
	}
	$form_data = array('sr_no'=>$no_rows,
			'name'=>$name,
			'email'=>$email);
	fputcsv($file_open, $form_data);
	/*$output .='
			<table class="table" bordered="1">
			<tr>
				<th>First Name</th>
				<th>Last name</th>
			</tr>
	';
	$output .='
			<table class="table" bordered="1">
			<tr>
				<td>'.$name.'</td>
				<td>'.$email.'</td>
			</tr>
			</table>
	';
	header("Content-Type: application/csv");
	header("Content-Disposition: attachment; filename=download.csv");	*/
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="execlconv.php">
	Enter your name:<Input type="text" name="fname">
	Email:<input type="text" name="email">
	<input type="submit" name="submit" value="submit">
</form>
</body>
</html>