<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/employee.php';

$employee = new Employees();

$id = $_POST['id'];

$success = "Employee profile archived successfully. Go back and refresh your page.";
$failed = "Failed to update record.";
$noEmployee = "Employee record not found.";

//Check if employee actually exists
$records = $employee->getSingleEmployee($id);
$row = $records->num_rows;
if($row === 1) {
    if($employee->archive($id)) {
        echo json_encode($success);
    } else {
        http_response_code(404);
        echo json_encode($failed);
    }
} else {
    echo json_encode($noEmployee);
}