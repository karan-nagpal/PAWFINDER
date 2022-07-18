<?php
include('dbconnect.php');

$ownid = $_GET['uid'];
$vercode = $_GET['code'];

$cmd = "update owners set status = '1' where ownid = '".$ownid."' and vercode = '".$vercode."'";

$status = mysqli_query($conn, $cmd);

if($status){
header('location:login.php?verified');
}else{
    header('location:error.php');
}
?>