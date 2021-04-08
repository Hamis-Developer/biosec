<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/employee.php';

$employee = new Employees();

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$designation = $_POST['designation'];
$photo = $_POST['photo'];

$success = "Employee detail updated successfully.";
$failed = "Failed to update record.";
$noEmployee = "Employee record not found.";

//Check if employee actually exists
$records = $employee->getSingleEmployee($id);
$row = $records->num_rows;

if($row === 1) {
    //If they exist, update their record and echo success message.
    if($employee->updateEmployee($id, $name, $email, $designation, $photo)) {
        echo json_encode($success);
    } else {
        //If they exists, but system failed to update record, echo a notification.
        http_response_code(404);
        echo json_encode($failed);
    }
} else {
    //If an employee with the id provided does not exist in the database, echo a notification.
    http_response_code(404);
    echo json_encode($noEmployee);
}