<?php
session_start();
require('connect.php');
if(@$_SESSION["user_name"])
 {
 ?>
<html>
<head><title>Edit Event</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Compiled and minified CSS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Compiled and minified CSS -->

<script src="event_form_2.js" type="text/javascript"></script>
<script language='javascript'>
	$(document).ready(function(e){
			//variables
			var html='<p><div><label>Name</label><input name="resource_name[]" type="text" id="resource_name"><label>Designation</label><input name="resource_designation[]" type="text" id="resource_designation"><input type="button" name="add_new_res" id="Remove" value="Remove Resource"></div>';
			var maxRows=5;

			var x=1;
			//add rows to the from
			$("#add_new_res").click(function(e){
				if(x<=maxRows)
				{
					$("#resource").append(html);
					x++;
				}
			});

			//remove rows
			$("#resource").on('click','#Remove',function(e)
			{
				$(this).parent('div').remove();
					x--;
			});
		});
	function hide_dropdown()
	{
	 	$("#drop_down").hide();
	}
	function show_dropdown()
	{
		$("#drop_down").show();
	}

	function show_checklist()
	{
		$("#checklist").show();
	}

	function hide_checklist()
	{
	 	$("#checklist").hide();
	}

</script>
</head>

<body onload="hide_dropdown(); hide_checklist();">
	<?php
		$user_id=@$_SESSION['user_id'];
		$user_name=@$_SESSION['user_name'];

		$row = mysqli_query($connect,"SELECT * from event where user_id='".$user_id."' ");	//TODO: add condition in sql query for E_id

		// while($row=mysqli_fetch_array($check))
		// {
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
    <div class='row'>
     <form action='event_form.php' method='POST' enctype='multipart/form-data' class='col s12'>
        <div>
        	<label>Name of the event</label>
        	<br/>       	
        	<?php echo("<input value='".$event_name."' id='Name of the event' type='text' class='validate' name='event_name'>");?>
        </div>
  
		<div>
        	<label>Event</label>
        	<br/>
	        <p>
		    	<label>
		        <input type='radio' name='event' id='Academic' value='Academic' onclick='show_checklist();'/>
		        <span>Academic</span>
		      	</label>
		  	</p>
		    <p>
		    	<label>
		        <input type='radio' name='event' id='reverb' value='reverb' onclick='hide_checklist();'/>
		        <span>Reverb</span>
		      	</label>
		  	</p>
		    <p>
		    	<label>
		        <input type='radio' name='event' id='EPIC' value='EPIC' onclick='hide_checklist();'/>
		        <span>EPIC</span>
		      	</label>
		    </p>
		    
		     <p>
		    	<label>
		        <input type='radio' name='event' id='CSR' value='CSR' onclick='hide_checklist();'/>
		        <span>CSR</span>
		      </label>
		    </p>
		     <p>
		    	<label>
		        <input type='radio' name='event' id='Other Club Activity' value='Other Club Activity' onclick='hide_checklist();'/>
		        <span>Other Club Activity</span>
		      </label>
		    </p>
	    </div>

	    <div id='checklist'>
	    	<label>Department</label>
        	<br/>
	    	<p>
		        <label>
			        <input type='checkbox' name='department[]'  id='Applied Science' value='Applied Science'>
			        <span>Applied Science</span>
		      	</label>
	  		</p>
	      	<p>
		      <label>
			        <input type='checkbox' name='department[]' id='Civil' value='Civil' />
			        <span>Civil</span>
		      </label>
		    </p>
		    <p>
		    	<label>
			        <input type='checkbox' name='department[]' id='CS/IT' value='CS/IT' />
			        <span>CS/IT</span>
		      </label>
		    </p>
		     <p>
		    	<label>
			        <input type='checkbox' name='department[]' id='EnTC' value='EnTC' />
			        <span>EnTC</span>
		      </label>
		    </p>
		     <p>
		    	<label>
			        <input type='checkbox' name='department[]' id='Mechanical'  value='Mechanical' />
			        <span>Mechanical</span>
		      </label>
		    </p>
	    </div>

	    <?php
    	if($department == "Applied Science" || $event == "Civil" || $event == "CS/IT" || $event == "EnTC" || $event == "Mechanical"){

    	echo("<script language='javascript'>
	    show_checklist();
	    </script>");
		}
		echo("<script language='javascript'>
			 document.getElementById('".$department."').checked = true;
			</script>");
	?>

	    <div>
        	<label>Event In-Charge</label>
        	<br/>
        <?php echo("<input value='".$event_incharge."' id='Name of the event' type='text' name='event_in_charge'>");?>
        </div>

        <div>
        	Date of Event 
        	<?php echo("<input type='date' value='".$event_date."' name='event_date' value='2018-01-01' min='2018-01-0'>");
        	?>
        </div>
       

        <div >
        	<label>Attendees</label>
        	<br/>
	        <p>
		        <label>
			        <input type='checkbox' name='attendees[]' id='Staff' value='Staff' />
			        <span>Staff</span>
		      	</label>
	  		</p>
	      	<p>
		      <label>
		        <input type='checkbox' name='attendees[]' id='Faculty' value='Faculty' />
		        <span>Faculty</span>
		      </label>
		    </p>
		    <p>
		    	<label>
			        <input type='checkbox' name='attendees[]' id='Student' value='Student' />
			        <span>Student</span>
		      </label>
		    </p>
	    </div>
	    <?php
	    foreach ($attendees as $a) {
	    	# code...
	    	echo ("<script language='javascript'>
			document.getElementById('".$a."').checked = true;
			</script>");
	    }
		
		?>
	    <div>
        	<label>The event is for the students of </label>
        	<br/>
	        <p>
		        <label>
			        <input type='checkbox' name='event_for[]' id='btech' value='B.Tech' />
			        <span>B.Tech</span>
		      	</label>
	  		</p>
	      	<p>
		      <label>
		        <input type='checkbox' name='event_for[]' id='mtech' value='M.Tech' />
		        <span>M.Tech</span>
		      </label>
		    </p>
	    </div>
	    <?php
	    	if($programme == "B.Tech"){
	    		echo ("<script language='javascript'>
				document.getElementById('btech').checked = true;

				</script>");
	    	}
	    	elseif($programme == "M.Tech")
	    	{
	    		echo ("<script language='javascript'>
				document.getElementById('mtech').checked = true;
				</script>");
	    	}
	    	elseif($programme == "Both"){
	    		echo ("<script language='javascript'>
				document.getElementById('btech').checked = true;
				document.getElementById('mtech').checked = true;
				</script>");
	    	}
	    ?>

		<label>Type</label>  
  		<div>
		  	<p>
		      <label>
		        <input name='group1' id='curricular' type='radio' value='curricular' onclick='hide_dropdown();'/>
		        <span>CURRICULAR ACTIVITY</span>
		      </label>
		    </p>
		    <p>
		      <label>
		        <input name='group1' id='cocurricular' type='radio' onclick='show_dropdown();' />
		        <span>CO-CURRICULAR ACTIVITY</span>
		      </label>
		    </p>  
		</div>
		 <?php
	    	if($type == "curricular"){
	    		echo ("<script language='javascript'>
				document.getElementById('curricular').checked = true;
				</script>");
	    	}
	    	elseif($type == "guest_lecture" || $type == "seminar" || $type == "workshop/student" || $type == "industrial_visit" || $type == "industrial_institute_activity" || $type == "alumni_activity" || $type == "enterpreneurship" || $type == "cultural_events" || $type == "sports_activity" || $type == "annual_college_gathering_fest" || $type == "conference" || $type == "any_other_activity")
	    	{
	    		echo ("<script language='javascript'>
				document.getElementById('cocurricular').checked = true;
				show_dropdown();
				</script>");
	    	}
	    	
	    ?>
	  	<div id='drop_down'>
		    <select id='category' name='activity'>
		        <option value="" disabled selected>Choose your option</option>
				      <option id='guest_lecture' value='guest_lecture'>Guest Lecture</option>
				      <option id='seminar' value='seminar'>Seminar</option>
				      <option id='workshop/student' value="workshop/student">Workshop/Student Event</option>
				      <option id='industrial_visit' value='industrial_visit'>Industrial Visit</option>
				      <option id='industrial_institute_activity' value='industrial_institute_activity'>Industrial Institute Activity</option>
				      <option id='alumni_activity' value='alumni_activity'>Alumni Activity</option>
				      <option id='enterpreneurship' value='enterpreneurship'>Enterpreneurship Initiatives</option>
				      <option id='cultural_events' value='cultural_events'>Cultural Events</option>
				      <option id='sports_activity' value='sports_activity'>Sports Activity Event</option>
				      <option id='annual_college_gathering_fest' value='annual_college_gathering_fest'>Annual College Gathering Fest</option>
				      <option id='conference' value='conference'>Conference</option>
				      <option id='any_other_activity' value='any_other_activity'>Any Other Activity</option>
			</select>
	    </div>

	    <?php
	    	echo ("<script language='javascript'>
			document.getElementById('".$activity."').selected = true;
			</script>");
	    	}
	    ?>
        <br>
        <div id = 'resource'>
		        <label>Name</label>
		         <input name='resource_name[]' type='text' id='resource_name'>
		        <label>Designation</label>
		        <input name='resource_designation[]' type='text' id='resource_designation'>
		    <p />
        	<input type='button' name='add_new_res' id='add_new_res' value='Add Resource'>
	    </div>

	    <br/>

        <div class='input-field col s6'>
        	<label>A paragraph describing for the event / activity</label>
        	<br/>
        	<?php echo("<input value='".$description."' id='Name of the event' type='text' name='description'>");
        	?>
         	
        </div>

        <div class='input-field col s6'>
        	<label>Any Achievements/Awards won during the said activity</label>
        	<br/>
         	<?php echo("<input value='".$achievments."' id='Name of the event' type='text' name='achievements'>");
         	?>
        </div>

        <input id='submit' type='submit' value='SUBMIT' name='submit' />
 		


  </form>
  </div>
</body>
</html>
<?php
}
else
{
	echo "you must be logged in";
}
?>
