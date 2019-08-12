<?php
session_start();
require('connect.php');
$wrongpass="";
$usernot="";
$pleasefill="";
$role = @$_POST['role'];
$email = @$_POST['email'];
$password = @$_POST['password'];
if(isset($_POST['submit']))
{
	if($email && $password)
	{
		if($role == "faculty")
		{
			$check = mysqli_query($connect,"SELECT * FROM users WHERE user_email='".$email."' and role='".$role."'");
			$rows =  mysqli_num_rows($check);
			
			if($rows != 0)
			{
				while($row = mysqli_fetch_array($check)){
					$db_email = $row['user_email'];
					$db_password = $row['password'];
					$db_user_name= $row['user_name'];
					$db_branch= $row['branch'];
					$db_user_id=$row['user_id'];
				}
				if($email == $db_email && $password ==$db_password){
					
					@$_SESSION['user_email']=$email;
					@$_SESSION['user_name']=$db_user_name;
					@$_SESSION['branch']=$db_branch;
					@$_SESSION['user_id']=$db_user_id;
					header("Location:DBFaculty.php");		//TODO: change to absolute path of the html file
				}
				else {
					$wrongpass="Wrong Password";
				}
			}
			else{
				$usernot="Username not found";
			}
		}
		elseif($role == "information_officer")
		{
			$check = mysqli_query($connect,"SELECT * FROM users WHERE user_email='".$email."' and role='".$role."'");
			$rows =  mysqli_num_rows($check);
			
			if($rows != 0)
			{
				while($row = mysqli_fetch_array($check)){
					$db_email = $row['user_email'];
					$db_password = $row['password'];
					$db_user_name= $row['user_name'];
					$db_branch= $row['branch'];
					$db_user_id=$row['user_id'];
				}
				if($email == $db_email && $password ==$db_password){
					@$_SESSION['user_name']=$db_user_name;
					@$_SESSION['branch']=$db_branch;
					@$_SESSION['user_email']=$email;
					@$_SESSION['user_id']=$db_user_id;
					header("Location:DBio.php");		//TODO: change to absolute path of the html file
				}
				else {
					$wrongpass="Wrong Password";
				}
			}
			else{
				$usernot="Username not found";
			}
		}
		elseif($role == "admin")
		{
			$check = mysqli_query($connect,"SELECT * FROM users WHERE user_email='".$email."'and role='".$role."'");
			$rows =  mysqli_num_rows($check);
			
			if($rows != 0)
			{
				while($row = mysqli_fetch_array($check)){
					$db_email = $row['user_email'];
					$db_password = $row['password'];
					$db_user_name= $row['user_name'];
					$db_branch= $row['branch'];
					$db_user_id=$row['usre_id'];
				}
				if($email == $db_email && $password ==$db_password){
					@$_SESSION['user_name']=$db_user_name;
					@$_SESSION['branch']=$db_branch;
					@$_SESSION['user_email']=$email;
					@$_SESSION['user_id']=$db_user_id;
					header("Location:DBadmin.php");		//TODO: change to absolute path of the html file
				}
				else {
					$wrongpass="Wrong Password";
				}
			}
			else{
				$usernot="Username not found";
			}
		}
		else{
			$pleasefill="Please fill in all the details";
		}
	}
	/*echo "<script language='javascript'>alert('".$wrongpass."');</script>";
	echo "<script language='javascript'>alert('".$usernot."');</script>";
	echo "<script language='javascript'>alert('".$pleasefill."');</script>";*/
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="Theme/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="Theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="Theme/assets/css/style.css" rel="stylesheet">
    <link href="Theme/assets/css/style-responsive.css" rel="stylesheet">
      <style type="text/css">
      	.red
      	{
      		color: red ;
      		align-content:  center;
      	}


      </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		    <form class="form-login" action="login.php" method="POST">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="User Email" name="email" autofocus required>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="password" required>

		             <br>  

		            <label>Role</label>
		            <br> 
			          <input type="radio" name="role" id="faculty" value="faculty" checked>
			          <label class="form-check-label" for="faculty">
			            Faculty
			          </label>
			      
			       <br> 
			          <input class="form-check-input" type="radio" name="role" value="information_officer">
			          <label class="form-check-label" for="information_officer">
			            Information Officer
			          </label>
			        
			         <br> 
			          <input class="form-check-input" type="radio" name="role" id="admin" value="admin">
			          <label class="form-check-label" for="admin">
			            Admin
			          </label>
			         <br> 
		                <span class="center">
		                	<center>
		                <?php
		                    echo "<h4 class='red'>$wrongpass</h4>";
							echo "<h4 class='red'>$usernot</h4>";
							echo "<h4 class='red'>$pleasefill</h4>";
						?>
						</center>
		                </span>
		            <button class="btn btn-theme btn-block" type="submit" name="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		         </div>
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="Theme/assets/js/jquery.js"></script>
    <script src="Theme/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="Theme/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("SIT.png", {speed: 500});
    </script>


  </body>
</html>