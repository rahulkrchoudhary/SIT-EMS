<?php
session_start();
require('connect.php');
if(@$_SESSION["user_name"])
 {
 ?>
<html>
<html>
<head>
	<title>
		View Events
	</title>
</head>
<body>
<?php
$user_id=@$_SESSION['user_id'];
$user_name=@$_SESSION['user_name'];

$check = mysqli_query($connect,"SELECT * from event where user_id='".$user_id."'");

while($row=mysqli_fetch_array($check)) 
{
	$event_id=$row['E_id'];
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
	?>
	<p>
		<div>
			<p>
				<?php
					echo nl2br("$event_id\n");
					echo nl2br("$event_name\n");
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
					echo nl2br("$resource_designation\n");
				?>
			</p>
		</div>
	</p>
	<?php
}
?>
</body>
</html>
<?php
}
else
{
	echo "you must be logged in";
}
?>