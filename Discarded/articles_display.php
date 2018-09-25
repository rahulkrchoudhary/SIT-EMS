

<?php
//php script to get json of articles

$cat = $_POST['topic'];  //this contains the json which has the district and state in it.
$district = $_POST['district'];
$state = $_POST['state'];


$conn = mysqli_connect("example.com", "root", "", "ewr_info");
mysql_select_db('ewr_database');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$fetch = mysql_query("SELECT * FROM schemes WHERE topic=".$cat." && state=".$state." && district=".$district);

while($row = mysql_fetch_array($fetch, MYSQL_ASSOC)){	//check the names of the database parts from shubham
	$row_array['title'] = $row['title'];
	$row_array['filePath'] = $row['filepath'];
	$row_array['imagePath'] = $row['imagepath'];
	
	array_push($return_arr, $row_array);

}

echo json_encode($return_arr);
mysqli_close($conn); 

?>