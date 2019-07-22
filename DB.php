<?php
$localhost = "127.0.0.1";
$username = 'root';
$password = "";
$dbname = "phpcrud";

$connect = new mysqli($localhost,$username,$password,$dbname);
if($connect->connect_error){
    die("Failed to connect database:".$connect->connect_error);
}else{
   // echo "Successfully connected";
}

?>