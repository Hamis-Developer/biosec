<?php

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

include_once '../config/employee.php';

$employees = new Employees();

$records = $employees->getEmployees();
$row = $records->num_rows;
$x = 1;
$staffs = [];
if($row > 0) {
    while($record = $records->fetch_assoc()) {
        $i = $x++;
        $number = $i;
        $id = $record['id'];
        $name = $record['name'];
        $email = $record['email'];
        $designation = $record['designation'];
        $photo = $record['photo'];
        $status = $record['status'];
        $data = array(
            "id" => $id, 
            "name" => $name, 
            "email" => $email, 
            "designation" => $designation, 
            "photo" => $photo, 
            "status" => $status,
            "number" => $number);
        
            $staffs[] = $data;
    }
     $resp = json_encode($staffs);
     echo $resp;
     
} else {
    http_response_code(404);
    echo json_encode(
    array("message" => "No record found.")
    );
} 