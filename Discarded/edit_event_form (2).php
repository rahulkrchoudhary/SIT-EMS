<?php
session_start();
require('connect.php');
if(@$_SESSION["user_name"])
 {
   $user_name=@$_SESSION["user_name"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SIT-EMS</title>

    <!-- Bootstrap core CSS -->
    <link href="Theme/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="Theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Theme/assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="Theme/assets/js/bootstrap-daterangepicker/daterangepicker.css" />
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">  
    
    <!-- Custom styles for this template -->
    <link href="Theme/assets/css/style.css" rel="stylesheet">
    <link href="Theme/assets/css/style-responsive.css" rel="stylesheet">

    <!--Script-->
    <script src="event_form_2.js" type="text/javascript">      
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    // $("#drop_down").hide();
    document.getElementById('drop_down').style.visibility = 'hidden';
  }
  function show_dropdown()
  {
    // $("#drop_down").show();
    document.getElementById('drop_down').style.visibility = 'visible';
  }

  function show_checklist()
  {
    // $("#checklist").show();
    document.getElementById('checklist').style.visibility = 'visible';
  }

  function hide_checklist()
  {
    // $("#checklist").hide();
    document.getElementById('checklist').style.visibility = 'hidden';
  }

</script>

<script>
  $(document).ready(function(e){
      //variables
      var html='<p /><div><label>Name</label><input name="resource_name[]" type="text" id="resource_name"><label>Designation</label><input name="resource_designation[]" type="text" id="resource_designation"><input type="button" name="add_new_res" id="Remove" value="Remove Resource"></div>';
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
        $(this).parent('div').remove()
          ;
          x--;
      });
    });
</script>
<script>
 $(document).ready(function(e){
      //variables
      var html='<p /><div><input type="file" name="file[]"><br><input type="button" name="remove_new_file" id="remove_new_file" value="Remove"></div>';
      var maxRows=5;

      var x=1;
      //add rows to the from
      $("#add_new_file").click(function(e){
        if(x<=maxRows)
        {
          $("#file").append(html);
          x++;
        }
      });

      //remove rows
      $("#file").on('click','#remove_new_file',function(e)
      {
        $(this).parent('div').remove()
          ;
          x--;
      });
    });
 </script>
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onload="hide_dropdown(); hide_checklist();>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="DBFaculty.php" class="logo"><b>SIT-EMS</b></a>
            <!--logo end-->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              

                  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Hi <?php echo(" $user_name"); ?></h5>
                    
                  <li class="mt">
                      <a class="active" href="form_component.php">
                          <i class="fas fa-plus-circle"></i>
                          <span>Add New Event</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="select_pending_event.php" >
                          <i class="fas fa-edit"></i>
                          <span>Edit Events</span>
                      </a>
                      

                  <li class="sub-menu">
                     <a href="select_event.php" >
                          <i class="fas fa-eye"></i>
                          <span>View Event</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
  
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <?php
    $user_id=@$_SESSION['user_id'];
    $user_name=@$_SESSION['user_name'];
    $edit_event_id=@$_GET['id'];
    $check = mysqli_query($connect,"SELECT * from event where E_id='".$edit_event_id."'  AND user_id='".$user_id."'  ");  //TODO: add condition in sql query for E_id

    while($row=mysqli_fetch_array($check))
    {
      $event_id=$row['E_id'];
      $event_name=$row['E_name'];
      $department=explode(", ", $row['Department']);
      $event_incharge=$row['Event_Incharge'];
      $event_date=$row['Event_Date'];
      $programme=explode(", ", $row['Programme']);
      // $attendees=$row['Attendees'];
      $attendees = explode(", ", $row["Attendees"]);
      $type=explode(", ", $row['Type']);
      $description=$row['Description'];
      $achievments=$row['Achievments'];
      $event_status=$row['event_status'];
      $resource_name=$row['Resource_name'];
      $resource_designation=$row['Resource_designation'];


    ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Event Form</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  
                      <!--FORM-->
                      
                      <form class="form-horizontal style-form" action="update_event.php?id=<?php echo $edit_event_id; ?>" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name of the event</label>
                              <div class="col-sm-10">
                                  <?php echo("<input value='".$event_name."' type='text' class='form-control' id='Name of the event' name='event_name'>");?>
                              </div>
                                </div>


                                    <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Event</label>
                                    <div class="col-sm-10">
                                     
                                        
                                          <label>
                                            <input type="radio" id='Academic' onclick="show_checklist();" name="event" value="Academic">
                                            Academic
                                          </label>
                                        
                                        <p />
                                          <label>
                                            <input type="radio" id='reverb' type="radio" name="event" value="reverb" onclick="hide_checklist();">
                                            Reverb
                                          </label>
                                        
                                          <p />
                                        
                                          <label>
                                            <input type="radio" id='EPIC' id='CSR' name="event" value="EPIC" onclick="hide_checklist();">
                                            EPIC
                                          </label>
                                                                                
                                        <p />
                                          <label>
                                            <input type="radio" name="event" id='CSR' value="CSR" onclick="hide_checklist();">
                                            CSR
                                          </label>
                                        
                                        <p />
                                          <label>
                                            <input type="radio" type="radio" id='Other Club Activity' name="event" value="Other Club Activity" onclick="hide_checklist();">
                                            Other Club Activity
                                          </label>
                                        
                                      </div>
                                      </div>

                                <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Department</label>
                                  <div class="col-sm-10" id="checklist">
                               <label class="checkbox-inline">
                                    <input type="checkbox" name="department[]" id='Applied Science'  value="Applied Science"> Applied Science
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="department[]" id='Civil' value="Civil"> Civil
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="department[]"  id='CS/IT' value="CS/IT"> CS/IT
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="department[]"  id='EnTC' value="EnTC"> EnTC
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" name="department[]"  id='Mechanical' value="Mechanical"> Mechanical
                                </label>
                                  </div>
                                  </div>

      <?php
      foreach ($department as $d) {
        # code...
        if($d== "Applied Science" || $d == "Civil" || $d == "CS/IT" || $d == "EnTC" || $d == "Mechanical"){
        echo("<script language='javascript'>
        document.getElementById('Academic').checked = true;
        document.getElementById('".$d."').checked = true;
        document.getElementById('checklist').style.visibility = 'visible';
        </script>");
      }
      else{
        echo("document.getElementById('".$d."').checked = true;");
      }
  }
  ?>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Event In-Charge</label>
                                      <div class="col-sm-10">
                                      <?php echo("<input value='".$event_incharge."' type='text'  class='form-control' id='Name of the event' name='event_in_charge'>");?>
                                  </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Date of the Event</label>
                                      <div class="col-sm-10">
                                      <?php echo("<input type='date' value='".$event_date."' name='event_date' value='2018-01-01' min='2018-01-0'>");
          ?>
                                  </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Attendees</label>
                                    <div class="col-sm-10">
                                      <label class="checkbox-inline">
                                        <input type="checkbox" name="attendees[]" id='Staff' value="Staff"> Staff
                                      </label>
                                      <label class="checkbox-inline">
                                        <input type="checkbox" name="attendees[]" id="Faculty" value="Faculty"> Faculty
                                      </label>
                                      <label class="checkbox-inline">
                                        <input type="checkbox" name="attendees[]" id="Student" value="Student"> Student
                                      </label>
                                  </div>
                                  </div>

<?php
      foreach ($attendees as $a) {
        # code...
        echo ("<script language='javascript'>
      document.getElementById('".$a."').checked = true;
      </script>");
      }
    
    ?>
                                    <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">The Event is for the student of</label>
                                    <div class="col-sm-10">
                                      <label class="checkbox-inline">
                                        <input type="checkbox" name="event_for[]" id="B.Tech" value="B.Tech"> B.Tech
                                      </label>
                                      <label class="checkbox-inline">
                                        <input type="checkbox" name="event_for[]" id="M.Tech" value="M.Tech"> M.Tech
                                      </label>
                                  </div>
                                  </div>

                                  
    <?php
        foreach ($programme as $p) {
          echo ("<script language='javascript'>document.getElementById('".$p."').checked = true;</script>");
        }   
      ?>
                                  <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Type</label>
                                    <div class="col-sm-10">
                                     
                                        <div class="radio">
                                          <label>
                                            <input type ="radio" id='curricular' name="group1" checked onclick="hide_dropdown();" checked>
                                            CURRICULAR ACTIVITY
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input type="radio" id='co_curricular' name="group1" value = 1 onclick="show_dropdown();">
                                            CO-CURRICULAR ACTIVITY
                                          </label>
                                        </div>
                                        <br>
                                        <div id='drop_down'>
        <select class="form-control" id='category' name='activity'>
            <option value="" disabled selected>Choose your option</option>
              <option id='Guest Lecture' value='Guest Lecture'>Guest Lecture</option>
              <option id='Seminar' value='Seminar'>Seminar</option>
              <option id='Workshop/Student' value='Workshop/Student'>Workshop/Student Event</option>
              <option id='Industrial Visit' value='Industrial Visit'>Industrial Visit</option>
              <option id='Industrial Institute Activity' value='Industrial Institute Activity'>Industrial Institute Activity</option>
              <option id='Alumni Activity' value='Alumni Activity'>Alumni Activity</option>
              <option id='Enterpreneurship' value='Enterpreneurship'>Enterpreneurship Initiatives</option>
              <option id='Cultural Events' value='Cultural Events'>Cultural Events</option>
              <option id='Sports Activity' value='Sports Activity'>Sports Activity Event</option>
              <option id='Annual College Gathering Fest' value='Annual College Gathering Fest'>Annual College Gathering Fest</option>
              <option id='Conference' value='Conference'>Conference</option>
              <option id='Any Other Activity' value='Any Other Activity'>Any Other Activity</option>
      </select>
      </div>
                                        </div>
                                        </div>
<?php
     foreach ($type as $t) {
        if($type == "curricular"){
          echo ("<script language='javascript'>
        document.getElementById('curricular').checked = true;
        </script>");
        }
        elseif($t == "Guest Lecture" || $t == "Seminar" || $t == "Workshop/Student" || $t == "Industrial Visit" || $t == "Industrial Institute Activity" || $t == "Alumni Activity" || $t == "Enterpreneurship" || $t == "Cultural Events" || $t == "Sports Activity" || $t == "Annual College Gathering Fest" || $t == "Conference" || $t == "Any Other Activity")
        {
          echo ("<script language='javascript'>
        document.getElementById('co_curricular').checked = true;
        document.getElementById('".$t."').selected = 'true';
        document.getElementById('drop_down').style.visibility = 'visible';
        </script>");
        }
      }
        
      ?>
                                        <br>
                                        <div id = "resource">
                                        <label>Name</label>
                                         <input name="resource_name[]" type="text" id="resource_name">
                                        <label>Designation</label>
                                        <input name="resource_designation[]" type="text" id="resource_designation">
                                        <p />
                                        <input type="button" name="add_new_res" id="add_new_res" value="Add Resource">
                                        </div>

                                          

                                          <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label">A paragraph describing for the event/ activity</label>
                                              <div class="col-sm-10">
                                                  <?php echo("<input value='".$description."' class='form-control' id='Name of the event' type='text' name='description'>");
          ?>
                                              </div>                                           
                                         </div>

                                              <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Any Achievements/ Awards Won</label>
                                                <div class="col-sm-10">
                                                    <?php echo("<input class='form-control' value='".$achievments."' id='Name of the event' type='text' name='achievements'>");
          ?>
                                                </div> 
                                                   
                                              </div>
                                              <div id="file">
                                                Upload related files
                                                <input type="file" name="file[]">
                                                <br>
                                                <input type="button" name="add_new_file" id="add_new_file" value="Add File">
                                              </div>

                                              <div class="form-group">
                                                <div class="col-sm-2">
                                                  <button class="btn btn-theme btn-block" href='edit_event_form.php?id=<?php echo $search_event_id; ?>'' type="submit" id="submit" value="SUBMIT" name="submit">SUBMIT</button>
                                                </div>
                                              </div>
                                                  

                                         
    </div><!-- /row -->
          	
       

		</section>

      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Event Form
              <a href="form_component.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
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
    <script src="Theme/assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="Theme/assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="Theme/assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="Theme/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="Theme/assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="Theme/assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="Theme/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="Theme/assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
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