<?php

session_start();
include('dbconnect.php');
$pname = $_GET['name'];
$newpic = $_GET['id'];
$cmd  = "select pid  from pets where (pname = '".$pname."' and image ='".$newpic."')";

$data = mysqli_query($conn, $cmd);
$numrow = mysqli_num_rows($data);
if($numrow>0){
$row = mysqli_fetch_array($data);
$petid = $row['pid'];

$qri = date('dmyhis').$petid;   

$cmdqr = "insert into qrcode(pid , image) values('".$petid."','".$qri."')";

$status = mysqli_query($conn, $cmdqr);
if(!$status){
    header('location:error.php');
}
$url = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=http://192.168.86.98/pawfinder/scanqr.php?id=$petid";
$qr = file_get_contents($url);
header('Content-Type: image/png');
file_put_contents('QRcodes'. '/'.$qri.'.jpg', $url);
header('location:addpets.php?added');

}else{
    header('location:error.php');
}

?>