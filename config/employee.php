<?php

//Include the database connection page in this page in order to be able to use it here.
include 'database.php';
date_default_timezone_set("Africa/Lagos");

//Create class to handle the api objects.

class Employees extends Database {

    //Create method to get all employees data
    public function getEmployees() {
        $status = "Active";
        $sql = "SELECT * FROM employees WHERE status='$status'";
        $query = $this->connect()->query($sql);
        return $query;
    }

    //Create method to get single employee data
    public function getSingleEmployee($id) {
        $id = mysqli_real_escape_string($this->connect(), $id);
        $status = "Active";
        $sql = "SELECT * FROM employees WHERE id='$id'";
        $query = $this->connect()->query($sql);
        return $query;
    }

    //Create method to add new employee detail
    public function createEmployee($name, $email, $designation, $photo) {
        $day = date("j");
        $month = date("F");
        $year = date("Y");
        $date = $day." ".$month." ".$year;
        $time = date("h:ia");
        $name = mysqli_real_escape_string($this->connect(), $name);
        $email = mysqli_real_escape_string($this->connect(), $email);
        $designation = mysqli_real_escape_string($this->connect(), $designation);
        $photo = mysqli_real_escape_string($this->connect(), $photo);
        $status = "Active";

        //Do not create employee if input fields are empty.
        if(!empty($name) && !empty($email) && !empty($designation) && !empty($photo) && !empty($status)) {
            //Check table to see if this user already exists in the database.
            $check = "SELECT * FROM employees WHERE name='$name' AND email='$email' AND designation='$designation'";
            $runCheck = $this->connect()->query($check);
            $getResult = $runCheck->num_rows;
            if($getResult > 0) {
                $error = "Operation Failed: employee already exists in the database.";
                http_response_code(404);
                echo json_encode($error);
            } elseif($getResult < 1) {
                //If employee doesn't exist yet, add them.
                $sql = "INSERT INTO employees (name, email, designation, photo, status) VALUES ('$name', '$email', '$designation', '$photo', '$status');";
                $query = $this->connect()->query($sql);
                if($query) {
                    //Insert record into activity log
                    $activity = $name." ($designation) was added to the employee database.";
                    $sql2 = "INSERT INTO activitylog (activity, datecreated, timecreated) VALUES ('$activity', '$date', '$time');";
                    $query2 = $this->connect()->query($sql2);
                }
                return $query;
            }   
        } else {
            $error = "Operation Failed: trying to submit empty field.";
            http_response_code(404);
            echo json_encode($error);
        }
    }
    
    //Update employee data
    public function updateEmployee($id, $name, $email, $designation, $photo) {
        $day = date("j");
        $month = date("F");
        $year = date("Y");
        $date = $day." ".$month." ".$year;
        $time = date("h:ia");
        $id = mysqli_real_escape_string($this->connect(), $id);
        $name = mysqli_real_escape_string($this->connect(), $name);
        $email = mysqli_real_escape_string($this->connect(), $email);
        $designation = mysqli_real_escape_string($this->connect(), $designation);
        $photo = mysqli_real_escape_string($this->connect(), $photo);

        if(empty($id) || empty($name) || empty($email) || empty($designation) || empty($photo)) {
            $error = "Operation Failed: trying to submit empty field.";
            http_response_code(404);
            echo json_encode($error);
        } elseif(!empty($id) && !empty($name) && !empty($email) && !empty($designation) && !empty($photo)) {
            $sql = "UPDATE employees SET name='$name', email='$email', designation='$designation', photo='$photo' WHERE id='$id'";
            $query = $this->connect()->query($sql);
            if($query) {
                //Create activity statement for this event.
                $activity = $name." ($designation) record was updated.";
                $sql2 = "INSERT INTO activitylog (activity, datecreated, timecreated) VALUES ('$activity', '$date', '$time');";
                $query2 = $this->connect()->query($sql2);
            }
            return $query;
        } 
    }

    //Move employee to archive
    public function archive($id) {
        $id = mysqli_real_escape_string($this->connect(), $id);
        $status = "Archive";
        $sql = "UPDATE employees SET status='$status' WHERE id='$id'";
        $query = $this->connect()->query($sql);
        if($query) {
            $sql2 = "SELECT * FROM employees WHERE id='$id'";
            $query2 = $this->connect()->query($sql2);
            $row2 = $query2->num_rows;
            if($row2 > 1) {
                while($detail = $query2->fetch_assoc()) {
                    $name = $detail['name'];
                    $designation = $detail['designation'];
                    $day = date("j");
                    $month = date("F");
                    $year = date("Y");
                    $date = $day." ".$month." ".$year;
                    $time = date("h:ia");

                    //Create activity statement for this event.
                    $activity = $name." ($designation) record was updated.";
                    $sql3 = "INSERT INTO activitylog (activity, datecreated, timecreated) VALUES ('$activity', '$date', '$time');";
                    $query3 = $this->connect()->query($sql3);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    //Show all activities
    //Create method to get all employees data
    public function activityLog() {
        $sql = "SELECT * FROM activitylog";
        $query = $this->connect()->query($sql);
        return $query;
    }
}