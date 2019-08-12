<?php
session_start();
require('connect.php');
require ('admindrawer.php');
if(@$_SESSION["user_name"])
 {

$username=@$_POST['username'];
$email=@$_POST['email'];
$date= date("Y-m-d");
$branch=@$_POST['branch'];
$Designation=$_POST['activity'];
$registered = "";
$donotmtach ="";
$unsuccessfull="";
$usernamebetw="";
$passwordlen="";
$pleasefill="";
$alreadyregis="";
$wrong_file="";
if(isset($_POST['submit']))
{
	
	if($username  && $email && $branch )
	{
		
		$check=mysqli_query($connect,"SELECT * from users where user_email='".$email."'");
		$rows =  mysqli_num_rows($check);
		if($rows!=0)
		{
			
			echo "<script>
alert('email is already used');
window.location.href='register.php';
</script>";
		}
		else{
		if(strlen($username) >= 5 && strlen($username) < 25)
			{
				     $role ="Faculty";
				      $p = explode("@",$email);
				        $password = $p[0];
					if($query = mysqli_query($connect, "INSERT INTO users (`user_id`, `user_name`,`user_email`, `role`,`Designation`,`branch`,`password`) VALUES ('', '".$username."',  '".$email."','".$role."' ,'".$Designation."', '".$branch."','".$password."')")){
			
					 echo "<script>
alert('User is successfully registered ');
window.location.href='DBadmin.php';
</script>";
					}
					else{
					$unsuccessfull="Unsuccessfull";
					}
				
			}
		else{
			if(strlen($username) < 5 || strlen($username) > 25 ){
				$usernamebetw= "Username must be between 5 and 25 characters";
			} 
			
		}
		}
		
		
	}
	else{
		$pleasefill="Please fill in all the details";
	}

}	
?>

<html>
<head>
<title>Register</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--Adding mobile responsiveness -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	body  {
		background-image: url("bg-img3.jpg");
		backgroung-attachment: fixed;
		background-repeat: no-repeat;
	}
	#header{
		color: white;
		text-align: center;
		font: italic bold Georgia, serif;
	}
	#outPopUp {
	  position: absolute;
	  width: 300px;
	  height: 700px;
	  z-index: 15;
	  top: 50%;
	  left: 50%;
	  margin: -100px 0 0 -150px;
	  background-color: #e8edea;
	}
	.centerimg{
	    display: block;
		margin-left: auto;
		margin-right: auto;
		width: 10%;
	}
	.center {
		margin: auto;
		width: 60%;
		padding: 10px;
	} <!--Style to centrally align inner elements -->
	
	</style>
</head>
<body>
	 <section id="main-content">
          <section class="wrapper">
          		<h3><i class="fa fa-angle-right"></i> Register New User</h3>
          	<div class="row mt">
              <div class="col-lg-9">
                  <div class="form-panel">
		<form action="register.php" method="POST" class="form-horizontal style-form" enctype="multipart/form-data">
		<div class="form-group" id="center">
			<div class="col-sm-5">
			<br/><label>UserName</label>
			<br/>
	<input class="form-control" id="disabledInput" type="text" name="username">
		</div>
		</div>
		
		<div class="form-group" id="center">
			<div class="col-sm-5">
			<br/><label>Department</label>
					<div id="drop_down">
                                                  <select class="form-control" id="category" name="branch">
                                                  <option value="" disabled selected>Choose your option</option>
                                                    <option value="CS-IT">CS-IT</option>
                                                    <option value="EnTC">EnTC</option>
                                                    <option value="Civil">Civil</option>
                                                    <option value="Applied Science">Applied Science</option>
                                                    <option value="Mechanical">Mechanical</option>
                                                  </select>
                                                  </div>
		</div>
	    </div>
	    
		<div class="form-group" id="center">
			<div class="col-sm-5">
			<br/><label>Designation</label>
		<!---dropdown-->
		<div id="drop_down">
                                                  <select class="form-control" id="category" name="activity">
                                                  <option value="" disabled selected>Choose your option</option>
                                                    <option value="associate_professor">Associate Professor</option>
                                                    <option value="hod">HOD</option>
                                                    <option value="visiting_faculty">Visiting Faculty</option>
                                                  </select>
                                                  </div>
                                              </div>
                                          </div>

		<div class="form-group" id="center">
			<div class="col-sm-5">
			<br/><label>E-mail</label>
			<br/><input class="form-control" id="disabledInput" type="text" name="email">
		
		</div>
	</div>
		<div class="form-group">
                                                <div class="col-sm-2">
                                                  <button class="btn btn-theme btn-block" type="submit" value="Register" name="submit">REGISTER</button>
                                                </div>
                                              </div>
		
		</form>
	</div>
</div>
</div>
	
		<br /><center><?php echo $donotmtach; ?></center><center><?php echo $registered; ?></center><center><?php echo $pleasefill; ?></center><center><?php echo $unsuccessfull; ?></center><center><?php echo $usernamebetw; ?></center><center><?php echo $passwordlen; ?></center><center><?php 
			echo $alreadyregis; ?> </center><center><?php 
			echo $wrong_file; ?> </center>

	</div>
</form>

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