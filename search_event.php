<?php
session_start();
require ('drawer.php');
require ('connect.php');
if(@$_SESSION["user_name"])
 {
$user_id=@$_SESSION['user_id'];
$user_name=@$_SESSION['user_name'];
$event_id=@$_GET['id'];

$check = mysqli_query($connect,"SELECT * from event where user_id='".$user_id."' and E_id='".$event_id."' ");
		echo ($event_id);

		 while($row=mysqli_fetch_array($check))
		 {
			$event_name=$row['E_name'];
			$department=$row['Department'];
			$event_incharge=$row['Event_Incharge'];
			$event_date=$row['Event_date'];
			$programme=$row['Programme'];
			$attendees=$row['Attendees'];
			$type=$row['Type'];
			$description=$row['Description'];
			$achievments=$row['Achievments'];
			$event_status=$row['event_status'];
			$resource_name=$row['Resource_name'];
			$resource_designation=$row['Resource_designation'];
      $count = $row['count'];

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
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SIT-EMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="Theme/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="Theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    
    <!-- Custom styles for this template -->
    <link href="Theme/assets/css/style.css" rel="stylesheet">
    <link href="Theme/assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="Theme/assets/css/to-do.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">  
    

    
  </head>

  <body>

  
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT.

      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

            <h3 ><i class="fas fa-chevron-left"></i><a href="select_event.php">Back</a></h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      
                      <!--FORM-->
                      
                      <form class="form-horizontal style-form" method="get" action="event_form.php" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name of the event</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$event_name"); ?>"  disabled>
                              </div>
                                </div>

                                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Event Date</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$event_date"); ?>" disabled>
                              </div>
                                </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Department</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$department"); ?>" disabled>
                              </div>
                                </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Event In-Charge</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$event_incharge"); ?>" disabled>
                              </div>
                                </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Attendees</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$attendees"); ?>" disabled>
                              </div>
                                </div>
                                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Programee</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$programme"); ?>" disabled>
                              </div>
                                </div>
                                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$description"); ?>" disabled>
                              </div>
                                </div>
                                  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Achievments</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$achievments"); ?>" disabled>
                              </div>
                                </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Type</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$type"); ?>" disabled>
                              </div>
                                </div>
                                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Event_status</label>
                              <div class="col-sm-10">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$event_status"); ?>" disabled>
                              </div>
                                </div>
                                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Number of files Uploaded</label>
                              <div class="col-sm-5">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$count"); ?>" disabled>
                              </div> </div>
                                <?php
                                $res_name=explode(",",$resource_name);
                                $res_designation=explode(",",$resource_designation);
								foreach ($res_name as $key => $value) 
								{
                                ?>                                
                                <div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label">Resource Name</label>
                               <div class="col-sm-5">
                              <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$value"); ?>" disabled>
                            </div>
                          </div>
                         
                             
                             <div class="form-group">
                              
                                <label class="col-sm-2 col-sm-2 control-label">Resource Designation</label>
                                   <div class="col-sm-5">
                                  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo("$res_designation[$key]"); ?>" disabled>
                              </div>
                                </div>
                              <?php
                          		}
                              ?>


                      </section>
                  </div><!--/col-md-12 -->
              </div><!-- /row -->
			
		</section>
      </section><!-- /MAIN CONTENT -->

  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="Theme/assets/js/jquery.js"></script>
    <script src="Theme/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="Theme/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="Theme/assets/js/jquery.scrollTo.min.js"></script>
    <script src="Theme/assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="Theme/assets/js/common-scripts.js"></script>

    <!--script for this page-->
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>    
    <script src="Theme/assets/js/tasks.js" type="text/javascript"></script>

    <script>
      jQuery(document).ready(function() {
          TaskList.initTaskWidget();
      });

      $(function() {
          $( "#sortable" ).sortable();
          $( "#sortable" ).disableSelection();
      });

    </script>
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>


<script>
$(document).ready(function() {
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});
</script> 

</body>
</html>
<?php
}
}
else
{
  echo "you must be logged in";
}
?>