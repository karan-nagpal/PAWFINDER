<?php
session_start();
include('dbconnect.php');
include('user-header.php');
if(!isset($_SESSION["aid"])){
    header('location:login.php');
}else{
    $id = $_SESSION["aid"];
}?>

<?php
$cmd = "update owners set pwd = '.$np.' where ownid = '.$id.'";
$status = mysqli_query($conn, $cmd);
if($status){
    header('location:dashboard.php?pc');
}else{
    header('location:error.php');
}
?>