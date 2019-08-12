<?php
  session_start();
require ('admindrawer.php');
require ('connect.php');
if(@$_SESSION["user_name"])
 {
  
  
?>
<html>
<head>

<title>
Home Page Admin
</title>
	<link href="Theme/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="Theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>
<body>
<div id="admin">
	<center>
			<?php
			$search_user=@$_POST['search_user'];
			$sucess="";
			$user_not="";
			$no_enter="";
			$username="";
			$user="";
			if(isset($_POST['search']))
			{
 

				if($search_user)
				{
					$check=mysqli_query($connect,"SELECT * FROM users where user_email='".$search_user."'");
					     $row=mysqli_num_rows($check);
					if($row==0)
					{
						 echo "<script>
     alert('user not found');
window.location.href='delete_user.php';
</script>";
					}
					else if($row!=0)
					{
						$row2=mysqli_fetch_array($check);
						{
						    $user_email=$row2['user_email'];	
							$branch=$row2['branch'];
							$username = $row2['user_name'];
							$user = $row2['user_id'];
						
					
						echo nl2br("Search Query Result");
					
					       echo nl2br ('<br/>');
						echo  '<section id="main-content">';
          				echo   '<section class="wrapper">';
						echo '<div class="row mt">';
          		        echo '<div class="col-lg-12">';
                        echo '<div class="form-panel">';
						 echo '<form class="form-horizontal style-form" action="delete_user.php" method="POST">'; 
						echo nl2br("<b>Username:</b> $username\n\n<b>Branch:</b> $branch\n\n<b>Email:</b> $user_email");

						echo '<div class="form-group">';
                        echo '<div class="col-sm-2">';
                        echo '<br>';
                        
                        echo '<input type="hidden" value ='.$user.' name="event_id"  />'; 
						echo '<button class="btn btn-theme btn-block"  name="dele" value="Delete">DELETE</button>';
                      
                     
						echo '</div>';
						echo '</div>';
						echo '</form>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</section>';
						echo '</section>';

					}
				}}
				else
				{
					$no_enter="Enter something first";
				}
				   



				}
				
                    if(isset($_POST['dele']))
				   {
				   	        $x = $_POST['$event_id'];
                      
                        $check4=mysqli_query($connect,"DELETE FROM users where user_id = '".$x."'");
								
								
								if($check4 )
								{
                                      echo "<script>
alert('user is deleted successfully');
window.location.href='delete_user.php';
</script>";
		}

																	}

				   
			
			?>
	</center>
</div>

<br>
<br>
<section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Delete User</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
	<form class="form-horizontal style-form" action="delete_user.php" method="POST">
		<br/>
		<div class="form-group" id="center">
			<div class="col-sm-5">
			<br/><label><b>Search for a User Email to be DELETED</b></label>
			<br/>
			<input class="form-control" type="text" name="search_user">
		</div>
	    </div>
											<div class="form-group">
                                                <div class="col-sm-2">
                                                <div class="btn-group">
                                                  <button class="btn btn-theme btn-block" type="submit" value="search" name="search">DELETE</button><?php echo $sucess; ?><?php echo $no_enter; ?>
                                                  </div>
                                                </div>
                                              </div>
		
	</form>

</div>
</div>
</div>
</section>
</section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
</body>
</html>
<?php
}
else
{
  echo "you must be logged in";
}
?>