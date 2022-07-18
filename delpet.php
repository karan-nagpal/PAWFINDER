<?php
session_start();
include('dbconnect.php');
if(!isset($_SESSION["aid"])){
    header('location:login.php');
}else{
    $id = $_SESSION["aid"];
}
$petid = $_GET['pid'];


$cmd = "delete from pets where pid = '".$petid."'";
mysqli_query($conn, $cmd);
$cmdqr = "delete from qrcode where pid = '".$petid."'";
mysqli_query($conn, $cmdqr);
header('location:addpets.php');
// echo mysqli_error($conn);
?>
