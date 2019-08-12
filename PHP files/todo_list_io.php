<?php
session_start();
require ('iodrawer.php');
require ('connect.php');
if(@$_SESSION["user_name"])
 {
  ?>
<!DOCTYPE html>
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

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->

      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
     
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT.

      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Inbox</h3>
      
			
          	<!-- SORTABLE TO DO LIST -->
			
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
            <?php  
                   
          $result = $connect->query('SELECT * FROM event where event_status="pending"');
           $i=0;
          echo '<br>';
          echo '<br>';
          $row=mysqli_num_rows($result);
          if($row==0)
          {
             echo '<form action="todo_list_io.php" method="POST">';
                  echo '<li class="list-primary">';
                  echo'<i class=" fa fa-ellipsis-v"></i>';
                    echo 'NO PENDING EVENTS';                      
                  echo'<div class="task-title">';
                  echo '</form>';
          }
         else if($result){ 
                while($obj = $result->fetch_object()){
                 // echo '<form action="todo_list_io.php" method="POST">';
                  echo '<li class="list-primary">';
                  echo'<i class=" fa fa-ellipsis-v"></i>';
                                          
                  echo'<div class="task-title">';
                  echo'<span class="task-title-sp">'.$obj->E_name.'</span>';
                                        
                  echo'<div class="pull-right hidden-phone">';
                 echo '<form action="todo_list_io.php" method="POST">';
                  echo' <button id ="btn" name="approved" class="btn btn-success btn-xs fa fa-check"></button>';
                 echo'</form>';
                 echo '<form action="view_io_final.php" method="POST">';
                  echo '<input type="hidden" value ='.$obj->E_id.' name="id"  />'; 
                echo'<button class="btn btn-primary btn-xs fas fa-eye"></button>';
                  echo'</form>';
                      


                        echo '<input type="hidden" value ='.$obj->E_id.' name="event_id"  />'; 
                  echo'   <button  class="btn btn-danger btn-xs fas fa-times"></button>';
                   echo'  </div>';
                                  echo'</div>';
// echo'   <button  onclick  "search_event_iofinal.php?id= "'.$obj->E_id.'"" ;>View Event </button>';
                            
                     
              // echo'</form>';

               echo '</li>';
                        echo'<br>';
                       }
                      } 
          if(isset($_POST['approved']))
          {
              $event_id = $_POST['event_id'];     
              echo $event_id;

              $sql = "UPDATE event SET event_status='Approved' WHERE E_id = '".$event_id."' ";

            if ($connect->query($sql) === TRUE) {
              
           echo "<script>
alert('Event is approved successfully');
window.location.href='todo_list_io.php';
</script>";
        exit;
           } else {
           echo "Not Approved";
            }
              }
             

            ?>

                                      
       </ul>
                              </div>
                              <div class=" add-task-row">
                                  
                                  <a class="btn btn-default btn-sm pull-right" href="todo_list_io.php#">Load More Events</a>
                              </div>

                                    
                                
                          </div>

        
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
else
{
  echo "you must be logged in";
}
?>