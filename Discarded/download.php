<?php
session_start();
//require ('drawer.php');
require ('connect.php');
if(@$_SESSION["user_name"])
 {
	if(isset($_GET['id']))
	{
	$event_id=$_GET['id'];
	$user_id=@$_SESSION['user_id'];
	$error="";
	$check = mysqli_query($connect,"SELECT * from event where user_id='".$user_id."' and E_id='".$event_id."' ");

		 while($row=mysqli_fetch_array($check))
		 {
			$event_name=$row['E_name'];
			$department=$row['Department'];
			$event_incharge=$row['Event_Incharge'];
			$event_date=$row['Event_Date'];
			$programme=$row['Programme'];
			$attendees=$row['Attendees'];
			$type=$row['Type'];
			$description=$row['Description'];
			$achievments=$row['Achievments'];
			$event_status=$row['event_status'];
			$resource_name=$row['Resource_name'];
			$resource_designation=$row['Resource_designation'];

					/*echo nl2br("$event_name\n");
					 echo nl2br("$department\n");
					 echo nl2br("$event_incharge\n");
					 echo nl2br("$event_date\n");
					 echo nl2br("$programme\n");
					 echo nl2br("$attendees\n");
					 echo nl2br("$type\n");
					 echo nl2br("$description\n");
					 echo nl2br("$achievments\n");
					 echo nl2br("$event_status\n");
					 echo nl2br("$resource_name\n");
					 echo nl2br("$resource_designation\n");*/
			$file_name='Downloads/'.$event_name.$event_date.'.csv';
			$file_open = fopen("$file_name","a");
			$form_data = array('event_name'=>$event_name,
					'department'=>$department,
					'event_incharge'=>$event_incharge,
					'event_date'=>$event_date,
					'programme'=>$programme,
					'attendees'=>$attendees,
					'type'=>$type,
					'description'=>$description,
					'achievments'=>$achievments,
					'event_status'=>$event_status,
					'resource_name'=>$resource_name,
					'resource_designation'=>$resource_designation);
			if(fputcsv($file_open, $form_data))
			{
				$error="File downloaded succesfully in ".$file_name;
			}
			else
			{
				$error="File download error";
			}
		}
	}
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
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
	<h3><?php echo($error); ?></h3>
	<a href="select_event.php">Go back to search Page</a>
	</center>
</body>
</html>
<?php
}
else
{
  echo "you must be logged in";
}
?>