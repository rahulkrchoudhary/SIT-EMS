var cnt=1;
function hide_dropdown()
 {
 	// alert("In hide");
 	$("#drop_down").hide();
 	// var x = document.getElementById("drop_down");
 	// x.style.display = "none";
 }
 function show_dropdown()
 {
 	// alert("In show");
 	$("#drop_down").show();
 	// var x = document.getElementById("drop_down");
 	// if (x.style.display === "none") {
  //       x.style.display = "block";
        
 	// }
 }

function show_checklist()
{
	// var x = document.getElementById("checklist");
 // 	if (x.style.display === "none") {
 //        x.style.display = "block";
 //    } else{
 //    	x.style.display = "none";
 //    }
	$("#checklist").show();
}

function hide_checklist()
 {
 	$("#checklist").hide();
 }

 function choose()
 {
 	var y = document.getElementById("category").value;
 		alert(y);
 }