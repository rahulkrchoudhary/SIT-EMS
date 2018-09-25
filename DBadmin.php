<?php
session_start();
require('connect.php');
require('admindrawer.php');

if(@$_SESSION["user_name"])
 {
  $user_name=@$_SESSION["user_name"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>

   <title></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

  </head>

  <body>
  <section id="main-content">

          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Past Event History</h3>
            <div class="row mt">
              
              <div class="form-group" style="background: darkslategrey"> 
      <div class="container">
   <div id="calendar"></div>
  </div>
</div></div></section></section>

  <script type="text/javascript">
    $(document).ready(function() {
      var calendar = $('#calendar').fullCalendar({
       editable: true,
       header: {
        left: ' today,prevYear,nextYear',
        center: 'title',
        right: 'prev,next,basicDay,month'
       },
       eventSources: ['getevent.php','DBadmin.php']
      });
     });
     </script>
 
    

      <!-- js placed at the end of the document so the pages load faster -->
    

	
	
	
  

  </body>
</html>
<?php
}
else
{
  echo "you must be logged in";
}
?>