<?php
SESSION_START();
include('dbconnect.php');
include('user-header.php');
if(!isset($_SESSION['aid'])){
    header('location:login.php');
}

$pname = $_POST['name'];
$petage = $_POST['age'];
$pbreed = $_POST['breed'];
$pcat = $_POST['category'];
$idmark = $_POST['id'];
$pic = basename($_FILES['petphoto']['name']);
$date = date('d/m/Y');
$time = date('h:i:s');
$newpic = date('dmyhis').$pic;
$ownid  = $_SESSION['aid'];


$cmd = "insert into pets(pname, pbreed, category, date, time, image, ownid, identification, petage) values('".$pname."','".$pbreed."','".$pcat."','".$date."','".$time."','".$newpic."','".$ownid."','".$idmark."','".$petage."')";

$status = mysqli_query($conn, $cmd);
if($status){
    move_uploaded_file($_FILES['petphoto']['tmp_name'], "petsphotos/".$newpic);
    header('location:makeqr.php?id='.$newpic.'&name='.$pname.'');
}else{
    header('location:error.php');
    // echo mysqli_error($conn);
    
}

?>