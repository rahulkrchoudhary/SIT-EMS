<?php
require('connect.php');
if(@$_SESSION["user_name"])
 {
  $user_id=@$_SESSION['user_id'];
    $query=mysqli_query($connect,"SELECT * FROM event where user_id='".$user_id."'");
    $rows =  mysqli_num_rows($query);

    $query1=mysqli_query($connect,"SELECT * FROM event where user_id='".$user_id."' and event_status='pending' ");
    $rows1 =  mysqli_num_rows($query1);

    $query2=mysqli_query($connect,"SELECT * FROM event where user_id='".$user_id."' and event_status='Approved' ");
    $rows2 =  mysqli_num_rows($query2);
?>
<!DOCTYPE html>
<html lang="en-US">
<body>

<section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Event Chart</h3>

            <div class="row mt">
            <div class="col-lg-12">
<div id="piechart">
  
</div>
<!-- <center> -->
  <h3><?php echo "Total events posted: $rows"; ?></h3>
<!--   </center> -->
</div>
</div> 
    </section>
      </section><!-- /MAIN CONTENT -->


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {

  var data = google.visualization.arrayToDataTable([
  ['Events', 'Posted by you'],
  ['No. of events Pending', <?php echo("$rows1"); ?>],
  ['No. of events Approved', <?php echo("$rows2"); ?>]
  ]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Events Posted by you', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
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