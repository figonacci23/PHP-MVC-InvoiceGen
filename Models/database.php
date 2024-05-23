<?php

class Database{
    public function getConnection(){
            $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ex1database";

        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        return $conn;
    }
}
    
?>