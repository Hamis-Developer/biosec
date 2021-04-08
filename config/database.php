<?php

//This class connects to the database
class Database {
    
    protected function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "biosec";

        $connect = new mysqli($servername, $username, $password, $database);
        return $connect;
    }
}