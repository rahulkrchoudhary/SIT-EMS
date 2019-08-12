<?php
session_start();
require('connect.php');
require('drawer.php');
if(@$_SESSION["user_name"])
 {
 ?>
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SIT-EMS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="Theme/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="Theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Theme/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="Theme/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="Theme/assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="Theme/assets/css/style.css" rel="stylesheet">
    <link href="Theme/assets/css/style-responsive.css" rel="stylesheet">

    <script src="Theme/assets/js/chart-master/Chart.js"></script>
    
  </head>
  <body>

         <!-- js placed at the end of the document so the pages load faster -->
    <script src="Theme/assets/js/jquery.js"></script>
    <script src="Theme/assets/js/jquery-1.8.3.min.js"></script>
    <script src="Theme/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="Theme/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="Theme/assets/js/jquery.scrollTo.min.js"></script>
    <script src="Theme/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="Theme/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="Theme/assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="Theme/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="Theme/assets/js/gritter-conf.js"></script>


	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
    <ul class="w3-ul w3-card-4">
    <?php
	$user_id=@$_SESSION['user_id'];
	$user_name=@$_SESSION['user_name'];
	$event_id=@$_GET['id'];

	$check = mysqli_query($connect,"SELECT * from event where user_id='".$user_id."' and E_id='".$event_id."'");
	echo ($event_id);

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
		?>
		<p>
		<div>
			<p>
				<?php
					echo("<li class='w3-bar'><a href='#'>");
					echo("<div class='w3-bar-item'><span class='w3-large'>".$event_name."</span><br>");
					echo("<span>Event date: ".$date."</span><br/>");
					echo("<span>Branches: ".$department."</span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp");
					echo("<span>Program: ".$program."</span><br/>");
					echo("<span>Status: ".$staus."</span></div></a></li>");
					// echo nl2br("$event_id\n");
					// echo nl2br("$event_name\n");
					// echo nl2br("$department\n");
					// echo nl2br("$event_incharge\n");
					// echo nl2br("$event_date\n");
					// echo nl2br("$programme\n");
					// echo nl2br("$attendees\n");
					// echo nl2br("$type\n");
					// echo nl2br("$description\n");
					// echo nl2br("$achievments\n");
					// echo nl2br("$event_status\n");
					// echo nl2br("$resource_name\n");
					// echo nl2br("$resource_designation\n");
				?>
			</p>
		</div>
	</p>
	<?php
}
?>
</ul>
<!-- <p><li class='w3-bar'><a href='#'><div class='w3-bar-item'><span class='w3-large'>"event_name"</span><br><span>Event date: "date"</span><br/><span>Branches: "department"</span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<span>Program: "program"</span><br/><span>Status: "staus"</span></div></a></li></p> -->
</body>
</html>
<?php
}
else
{
	echo "you must be logged in";
}
?>
	