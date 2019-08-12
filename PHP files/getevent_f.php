<?php 
session_start();
if(isset($_SESSION['user_id']))
{
        require "connect.php";
        $sess = $_SESSION['user_id'];
        $result = $connect->query("SELECT * FROM event where user_id = '".$sess."'");
        //$result->bindParam(':sess', $sess);
        //$result->execute();
        $event_array = array();
        while($obj = $result->fetch_object()) {
            $event_array[] = array(
                'id' => $obj->E_id,
                'title' => $obj->E_name,
                'start' => $obj->Event_date,
                'end' => $obj->Event_date,
            );
        }
        //echo $event_array;
    echo json_encode($event_array);
}
?>