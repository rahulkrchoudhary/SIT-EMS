<?php
session_start();
require ('drawer.php');
require ('connect.php');
if(@$_SESSION["user_name"])
 {
   $user_name=@$_SESSION["user_name"];
   $user_id=@$_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="Theme/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="Theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
    <!-- Custom styles for this template -->
    <link href="Theme/assets/css/style.css" rel="stylesheet">
    <link href="Theme/assets/css/style-responsive.css" rel="stylesheet">
</head>
<body>
<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Search Event</h3>
          	<div class="row mt">
          		
              <div class="form-group">
                                                <div class="col-sm-7">
                                                  <button class="btn btn-theme btn-block" type="button"><a href="select_event.php?action=sen">Search event by name</a></button>
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                <div class="col-sm-7">
                                                  <button class="btn btn-theme btn-block" type="button"><a href="select_event.php?action=seda">Search event by date</a></button>
                                                </div>
                                                <br>
                                                <br>
                                                <br>

                                                <div class="col-sm-7">
                                                  <button class="btn btn-theme btn-block" type="button"><a href="select_event.php?action=sede">Search event by department</a></button>
                                                </div>


	                                     </div>
          								 </div>
			
		</section>
      

      
<?php
if(@$_GET['action']=='sen')
{
	?>
	<form action="select_event.php?action=sen" method="POST" class="form-group">
		Enter the event name:<input type="text" name="s_event_name">
		<input type="submit" name="search_event1" value="Search Event">
	</form>

	<?php
	if(isset($_POST['search_event1']))
	{
		$search_event_name = @$_POST['s_event_name'];
		$query1=mysqli_query($connect,"SELECT * FROM event where E_name='".$search_event_name."' and user_id='".$user_id."'");
		while ($row1=mysqli_fetch_array($query1)) {
			$event_name=$row1['E_name'];
			$search_event_id=$row1['E_id'];
			?>
			<div class="row mt mb">
                  <div class="col-md-12">
                      <section class="task-panel tasks-widget">
	                	<div class="panel-heading">
	                        <div class="pull-left"><h5><i class="fa fa-tasks"></i> Events</h5></div>
	                        <br>
	                 	</div>
                          <div class="panel-body">
                              <div class="task-content">
                                  <ul id="sortable" class="task-list">
                                      <li class="list-primary">
                                          <i class=" fa fa-ellipsis-v"></i>
                                          
                                          <div class="task-title">
                                              <span class="task-title-sp"><?php echo $event_name; ?></span>
                                              <!--<span class="badge bg-theme">Done</span>-->
                                              <div class="pull-right hidden-phone">
                                                  <button onclick="location.href = 'IOForm.html';" class="btn btn-primary btn-xs fas fa-eye"></button>
                                                  <button class="btn btn-danger btn-xs fas fa-times"></button>
                                              </div>
                                          </div>
                                      </li>
			<a href="search_event.php?id=<?php echo $search_event_id; ?>"><?php echo $event_name; ?></a>
			<?php
		}
		?>
		</ul>
		<?php
	}
}
if(@$_GET['action']=='seda') {
	?>
	<form action="select_event.php?action=seda" method="POST">
		<input type="date" name="event_date_from" value="2018-01-01">
		<input type="date" name="event_date_to" value="2018-01-01">
		<input type="submit" name="search_event2" value="Search Event">
	</form>
	<?php
	if(isset($_POST['search_event2']))
	{
		$event_date_from=@$_POST['event_date_from'];
		$event_date_to=@$_POST['event_date_to'];
		$query2=mysqli_query($connect,"SELECT * FROM event where Event_Date BETWEEN '".$event_date_from."' AND '".$event_date_to."' and user_id='".$user_id."'");
		while($row2=mysqli_fetch_array($query2))
		{
			$search_event_id=$row2['E_id'];
			$search_event_name=$row2['E_name'];
			?>
			<div class="row mt mb">
                  <div class="col-md-12">
                      <section class="task-panel tasks-widget">
	                	<div class="panel-heading">
	                        <div class="pull-left"><h5><i class="fa fa-tasks"></i> Events</h5></div>
	                        <br>
	                 	</div>
                          <div class="panel-body">
                              <div class="task-content">
                                  <ul id="sortable" class="task-list">
                                      <li class="list-primary">
                                          <i class=" fa fa-ellipsis-v"></i>
                                          
                                          <div class="task-title">
                                              <span class="task-title-sp"><?php echo $search_event_name; ?></span>
                                              <!--<span class="badge bg-theme">Done</span>-->
                                              <div class="pull-right hidden-phone">
                                                  <button onclick="location.href = 'IOForm.html';" class="btn btn-primary btn-xs fas fa-eye"></button>
                                                  <button class="btn btn-danger btn-xs fas fa-times"></button>
                                              </div>
                                          </div>
                                      </li>
			<a href="search_event.php?id=<?php echo $search_event_id; ?>"><?php echo $search_event_name; ?></a>
			<br>
			<?php
		}	
		?>
		</ul>
		<?php		
	}
}
if(@$_GET['action']=='sede')
{
	?>
	<form action="select_event.php?action=sede" method="POST">
		Enter the event by department:<input type="text" name="s_event_dept">
		<input type="submit" name="search_event3" value="Search Event">
	</form>
	<?php
	if(isset($_POST['search_event3']))
	{
		$search_event_dept = @$_POST['s_event_dept'];
		$query4=mysqli_query($connect,"SELECT * FROM event where Department like '%".$search_event_dept."%' and user_id='".$user_id."'");
		?>

		 <div class="row mt mb">
                  <div class="col-md-12">
                      <section class="task-panel tasks-widget">
	                	<div class="panel-heading">
	                        <div class="pull-left"><h5><i class="fa fa-tasks"></i> Events</h5></div>
	                        <br>
	                    </div>

		<?php
		while ($row4=mysqli_fetch_array($query4)) {
			$event_name=$row4['E_name'];
			$search_event_id=$row4['E_id'];
			?>
	                 	
                          <div class="panel-body">
                              <div class="task-content">
                                  <ul id="sortable" class="task-list">
                                      <li>
                                          <i class=" fa fa-ellipsis-v"></i>
                                          <div class="task-title">
                                              <span class="task-title-sp"><?php echo $event_name; ?></span>
                                              <!--<span class="badge bg-theme">Done</span>-->
                                              <div class="pull-right hidden-phone">
                                                  <button onclick="location.href = 'IOForm.html';" class="btn btn-primary btn-xs fas fa-eye"></button>
                                                  <button class="btn btn-danger btn-xs fas fa-times"></button>
                                              </div>
                                          </div>
                                      </li>
			<a href="search_event.php?id=<?php echo $search_event_id; ?>"><?php echo $event_name; ?></a>
			<?php
		}
		?>
	</ul>
</div>
</section>
</div>
</div>
	<?php
	}
}
	/*$check = mysqli_query($connect,"SELECT * from event where user_id='".$user_id."' and event_status='pending'");

	while($row=mysqli_fetch_array($check))
	{
		$event_id=$row['E_id'];
		$event_name=$row['E_name'];
		?>

	<a href="edit_event.php?id=<?php echo $event_id; ?>"><?php echo $event_name; ?></a>
	<br>
	<?php
	}*/
	?>
</section><!-- /MAIN CONTENT -->
	  <!-- js placed at the end of the document so the pages load faster -->
    <script src="Theme/assets/js/jquery.js"></script>
    <script src="Theme/assets/js/bootstrap.min.js"></script>
    <script src="Theme/assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="Theme/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="Theme/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="Theme/assets/js/jquery.scrollTo.min.js"></script>
    <script src="Theme/assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="Theme/assets/js/common-scripts.js"></script>

    <!--script for this page-->

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
else
{
  echo "you must be logged in";
}
?>