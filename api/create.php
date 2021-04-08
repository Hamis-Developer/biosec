<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/employee.php';

$employee = new Employees();

$name = $_POST['name'];
$email = $_POST['email'];
$designation = $_POST['designation'];
$photo = $_POST['photo'];

$success = "Employee detail created successfully.";
$failed = "Failed to post.";
if($employee->createEmployee($name, $email, $designation, $photo)) {
    echo json_encode($success);
} else {
    http_response_code(404);
    echo json_encode($failed);
}