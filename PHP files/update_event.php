<?php
session_start();
require('connect.php');
$event_id=@$_GET['id'];
$user_id=@$_SESSION['user_id'];
$event_name=@$_POST['event_name'];
$event_in_charge=@$_POST['event_in_charge'];
$event_date=@$_POST['event_date'];
$activity="Guest Lecture";
$res_name="";
$res_designation="";
$description=@$_POST['description'];
$achievements=@$_POST['achievements'];
$event=@$_POST['event'];
$programme="";
$count=0;
$attendence="";
$counter=0;
$department="";
if(isset($_POST['submit']))
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
	  echo nl2br("$user_id");
      echo nl2br("$event_name");
      echo nl2br("$event_date");
     // echo nl2br("$activity");
      echo nl2br("$description");
      echo nl2br("$achievements");
      echo nl2br("$event");
      print_r($_POST["resource_designation"]);
      ?>
	</body>
	</html>
<?php
$e=1;
	if($event_name and $event_in_charge and $event_date and $activity and $description and $achievements and $event)
	{
		  echo "2345";
		  if(is_array(@$_POST['resource_designation'])){
		  		$res_designation = implode(", ", $_POST["resource_designation"]);
		}
		if(is_array(@$_POST['resource_name'])){
		  		$res_name = implode(", ", $_POST["resource_name"]);
		}
		  echo nl2br($res_designation);
		  echo nl2br($res_name);
			if(is_array(@$_POST['attendees'])) {
				$attendence= implode(", ", $_POST["attendees"]);
			}
			if($event=="Academic")
			{
		  		if(is_array(@$_POST['department'])){
		  			$event = implode(", ", $_POST["department"]);
		  			$e=0;
				}
			}
			if(is_array(@$_POST['event_for'])){	
				$programme = implode(", ", $_POST["event_for"]);
				}
			if(count($_FILES['file']['name'])) 
    				{        
                  		$count=0;
          
    					foreach ($_FILES['file']['name'] as $filename) 
 						{
 							if($e == 0)
							{
								$result=$connect->query("SELECT branch FROM `users` WHERE user_id = '".$user_id."' "); 
	         					if($result) {
            						while($obj = $result->fetch_object()) {
	            						$x = $obj->branch;    
 									}
								}
	   							$tmp=$_FILES['file']['tmp_name'][$count];
	  
	    						$temp = "Academic/".$x."/";
	    
      							$temp=$temp.($filename);
      							echo $temp;
      							move_uploaded_file($tmp,$temp);
       							$temp='';
     							$tmp="";
	    						$count = $count + 1;         			
                       		}
							else
							{
								$temp = $event."/";
								$tmp=$_FILES['file']['tmp_name'][$count];
      							$count=$count + 1;
      							$temp=$temp.basename($filename);
      							move_uploaded_file($tmp,$temp);
      							$temp='';
      							$tmp='';
							}
						}
					}
				}
			/*if(isset($_FILES['file']))
				{
					$file_name = $_FILES['file']['name'];
					$file_tmp = $_FILES['file']['tmp_name'];
					$upload_folder = "uploads/";
					$movefile = move_uploaded_file($file_tmp, $upload_folder.$file_name);
					if ($movefile) {
							echo (" File moved Succesfully");
						}	
				}*/
		// if($query = mysqli_query($connect, "INSERT INTO event (`E_id`, `E_name`,`Department`, `Event_Incharge`, `Event_Date`, `Programme`,`Attendees`,`Type`,`Description`,`Achievments`,`Resource_name`,`Resource_designation`,`user_id`) VALUES ('', '".$event_name."','".$event."','".$event_in_charge."' ,'".$event_date."', '".$programme."','".$attendence."', '".$activity."','".$description."','".$achievements."','".$res_name."','".$res_designation."','".$user_id."')")){
		// 			echo "Event posted";
		// 	}
			
			if($query = mysqli_query($connect, "UPDATE event SET E_name = '".$event_name."', Department = '".$event."', Event_Incharge = '".$event_in_charge."', Event_Date = '".$event_date."', Programme = '".$programme."', Attendees = '".$attendence."', Type = '".$activity."', Description = '".$description."', Achievments = '".$achievements."', Resource_name = '".$res_name."', Resource_designation = '".$res_designation."' WHERE E_id = '".$event_id."'")){
		echo "<script language='javascript'>alert('Event posted');
					window.location = 'DBFaculty.php'</script>";
}

	else
	{
		echo "<script language='javascript'>alert('Event not posted');
				window.location = 'edit_event_form.php';</script>";	}
}
//}?>

<!-- if($query = mysqli_query(UPDATE event
SET E_name = ".$event_name.", Department = '".$event."', Event_Incharge = '".$event_in_charge."', Event_Date = '".$event_date."', Programme = '".$programme."', Attendees = '".$attendence."', Type = '".$activity."', Description = '".$description."', Achievments = '".$achievements."', Resource_name = '".$res_name."', Resource_designation = '".$res_designation."')")
WHERE E_id = '".$."')")){
	echo "Event posted";
} -->