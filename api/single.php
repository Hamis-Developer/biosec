<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../employee.php';

$employee = new Employees();

if(isset($_GET['id']) && $_GET['id'] !== '' && $_GET['id'] != null) {
    $id = $_GET['id'];
} else {
    http_response_code(404);
    echo json_encode("Employee not found.");
}
$records = $employee->getSingleEmployee($id);
$row = $records->num_rows;
$employee = [];
if($row === 1) {
    while($record = $records->fetch_assoc()) {
        $data = array(
            "id" => $record['id'],
            "name" => $record['name'],
            "email" => $record['email'],
            "designation" => $record['designation'],
            "photo" => $record['photo'],
            "status" => $record['status']
        );

        $employee[] = $data;
    }
    
    http_response_code(200);
    echo json_encode($data);
    
} else {
    http_response_code(404);
    echo json_encode("Employee not found.");
}