<?php
SESSION_START();
include('dbconnect.php');
if(!isset($_SESSION["aid"])){
    header('location:login.php');
}else{
    $id = $_SESSION["aid"];
}
$petid = $_GET['pid'];
$founddate = $_GET['founddate'];

$cmd = "update pets set status = '0', founddate = '".$founddate."' where pid= '".$petid."'";
$status = mysqli_query($conn, $cmd);
if($status){
    header('location:viewpets.php?lost');
}
?>

