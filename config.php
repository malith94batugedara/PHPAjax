<?php

$serverName ="localhost";
$userName = "root";
$password = "";
$database = "ajaxtutorial";

$conn = new mysqli($serverName,$userName,$password,$database);

if($conn->connect_error){
    die("connection error" . $conn->connect_error);
}
else{
     echo "success";
}

?>