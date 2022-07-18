<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'pawfinder';

$conn = mysqli_connect($host, $user, $pass, $database);

if(!$conn){
    die("ERROR... Database not connected");
 
}

?>