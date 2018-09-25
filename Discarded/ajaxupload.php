<?php
$dbHost = 'localhost';
 
$dbUsername = 'root';
 
$dbPassword = '';
 
$dbName = 'login';
 
//Create connection and select DB
$dbi = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
 
if($dbi->connect_error){
 
   die("Unable to connect database: " . $dbi->connect_error);
 
}
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'uploads/'; // upload directory
 
if(!empty($_FILES['image']))
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
 
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
 
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
 
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 
} 
if(move_uploaded_file($tmp,$path)) 
{
echo "<img src='$path' />";
//$name = $_POST['name'];
//$email = $_POST['email'];
 
//include database configuration file

 
//insert form data in the database
//if($dbi->query("INSERT into upload(file_name) VALUES ('".$path."')"))
 //echo "insertion done successfully";
//echo $insert?'ok':'err';
//}
} 
else 
{
echo 'invalid';
}
 $allowedExts = array("pdf", "doc", "docx");
    $extension = end(explode(".", $_FILES["resume"]["name"]));


$fileName=$_FILES["resume"]["name"];
  $fileSize=$_FILES["resume"]["size"]/1024;
  $fileType=$_FILES["resume"]["type"];
  $fileTmpName=$_FILES["resume"]["tmp_name"];  
 if (($fileType == "application/pdf") || ($fileType == "application/msword") || ($fileType == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") && ($fileSize < 20000000) && in_array($extension, $allowedExts))
 {
  //if($fileType=="application/msword" ){
    if($fileSize<=2000){

      //New file name
      $random=rand(1111,9999);
      $newFileName=$random.$fileName;

      //File upload path
      $uploadPath="Event_Report/".$newFileName;

      //function for upload file
	  $pdf = $uploadPath.strtolower($newFileName);
      if(move_uploaded_file($fileTmpName,$uploadPath)){
        if($dbi->query("INSERT into upload(file_name,Report_Name) VALUES ('".$path."','".$pdf."')")){
		echo "Successful"; 
        echo "File Name :".$newFileName; 
        echo "File Size :".$fileSize." kb"; 
        echo "File Type :".$fileType; 
      }
	  else echo"Error inserting in database";
    }}
    else{
      echo "Maximum upload file size limit is 200 kb";
    }
  }
  else{
    echo "You can only upload a Word doc file.";
  }  







 /*define ("FILEREPOSITORY","./");

   if (is_uploaded_file($_FILES['classnotes']['tmp_name'])) {
if (($fileType == "application/pdf") || ($fileType == "application/msword") || ($fileType == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") && ($_FILES["file"]["size"] < 20000000) && in_array($extension, $allowedExts))
    {
      
      } else {
         $pdf = $_FILES['classnotes']['name'];
	/*	 if( $_FILES['classnotes']['type'] == "application/doc")
			  $result = move_uploaded_file($_FILES['classnotes']['tmp_name'], FILEREPOSITORY."Event_Report/$pdf.doc");
		 else
         $result = move_uploaded_file($_FILES['classnotes']['tmp_name'], FILEREPOSITORY."Event_Report/$pdf.pdf");
         if ($result == 1) echo "<p>File successfully uploaded.</p>";
         else echo "<p>There was a problem uploading the file.</p>";
      } #endIF*/
   } #endIF


//if ($_FILES['classnotes']['type'] != "application/pdf"|| $_FILES['classnotes']['type'] != "application/docx") {
  //       echo "<p>Class notes must be uploaded in PDFor DOCX format.</p>";


?>