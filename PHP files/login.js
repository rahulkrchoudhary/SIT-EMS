function Login(){
  var email = $("#email").val();
  var pswd = $("#password").val();
  var role = $('input[name=role]:checked').val();
  // alert("Role: "+role);
  
	// var flag1=0;
	// var flag2=0;
	// var flag3=0;
		
	if(checkEmail(email))
	{
		// alert("email valid");
 	    $.ajax({
			url: 'login.php',
            type: 'post',
			data: {"email": email, "password": pswd, "role": role},
            dataType: 'json',
            success: function (result) {
				console.log(result);
            }
		})
		.fail(function(data,status,err){
			alert("Request Failed");
			console.log("Failed!!"+ data + status +err);
		});
    }
	else{
		console.log("please enter valid details.");
	}
	console.log("end of js");
  }
  function checkEmail(email) {

   /* var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email)) {
	    alert('Please provide a valid email address');
	    document.getElementById("email").focus;
	    return false;
	}*/
	return true;
 }	