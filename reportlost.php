<?php
SESSION_START();
include('dbconnect.php');
if(!isset($_SESSION["aid"])){
    header('location:login.php');
}else{
    $id = $_SESSION["aid"];
}
$petid = @$_GET['pid'];
$lostdate = @$_GET['lostdate'];

$cmd = "update pets set status = '1', lostdate ='".$lostdate."' where pid= '".$petid."'";
$status = mysqli_query($conn, $cmd);
if($status){
    header('location:viewpets.php?lost');
}else{
    echo mysqli_error($conn);
}
?>

