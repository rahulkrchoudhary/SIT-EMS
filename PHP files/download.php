<?php
require "connect.php";
       // $sess = $_SESSION['user_id'];
        $event_id = $_GET['id'];
        $result = $connect->query("SELECT * FROM event WHERE E_id = '".$event_id."' ");
        //$result->bindParam(':sess', $sess);
        //$result->execute();
        
        $event_array = array();
        while($obj = $result->fetch_object()) {
            $e = $obj->E_name;
        $d = $obj->Event_date;
            $data[] = array(
                'Event-Name' => $obj->E_name,
                'Start-Date' => $obj->Event_date,
                
                'No Of Files' => $obj->count,
                  'department'=> $obj->Department,
			'event_incharge'=> $obj->Event_Incharge,
			
			'programme'=> $obj->Programme,
			'attendees'=> $obj->Attendees,
			'type'=> $obj->Type,
			'description'=> $obj->Description,
			'achievments' => $obj->Achievments,
			'resource_name'=> $obj->Resource_name,
			'resource_designation'=> $obj->Resource_designation,



            );
        }

    
    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
    
    // file name for download
    $fileName =  $e.$d.".xls";
    
    // headers for download
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");
    
    $flag = false;
    foreach($data as $row) {
        if(!$flag) {
            // display column names as first row
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
        }
        // filter data
        array_walk($row, 'filterData');
        echo implode("\t", array_values($row)) . "\n";

    }
    
    exit;
?>
 