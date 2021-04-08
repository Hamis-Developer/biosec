<?php

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

include_once '../config/employee.php';

$activity = new Employees();

$records = $activity->activityLog();
$row = $records->num_rows;
$x = 1;
$activities = [];
if($row > 0) {
    while($record = $records->fetch_assoc()) {
        $i = $x++;
        $number = $i;
        $id = $record['id'];
        $activity = $record['activity'];
        $date = $record['datecreated'];
        $time = $record['timecreated'];
        $data = array(
            "id" => $id, 
            "activity" => $activity, 
            "date" => $date, 
            "time" => $time,
            "number" => $number);
            $activities[] = $data;
    }
     $resp = json_encode($activities);
     echo $resp;
     
} else {
    http_response_code(404);
    echo json_encode(
    array("message" => "No record found.")
    );
} 
