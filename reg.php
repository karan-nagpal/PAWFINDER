<?php
include('dbconnect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = md5($_POST['password']);
$date = date('d/m/Y');
$suburb = $_POST['suburb'];

$cmd2 = "select email from owners where email = '".$email."'";
$data3 = mysqli_query($conn, $cmd2);
$numrow1 = mysqli_num_rows($data3);
if($numrow1 == 0){

$vercode = str_shuffle('almnopqrstuvw126547890');
$cmd = "insert into owners(name, email, mobile,  date, suburb, vercode,status,pwd) values('".$name."','".$email."','".$mobile."','".$date."','suburb','".$vercode."','0','".$password."')";
$status = mysqli_query($conn, $cmd);
        if($status){
    /*  
$to = "somebody@example.com";
$subject = "HTML email";

$message = ' 
<html>
<head>
<title>HTML email</title>
<link href="https://abc.com/css/style.css%22%3E
</head>
<body>
<p style="color:red;">Please click on link given below to verify your email.</p>


<p style="color:red;"><a target="blank" href=https://abc.com/verifyemail.php?uid='.$data1['ownid'].'&code='.$vercode.'">Click here</a></p>
</body>
</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: info@yourdomain.com>' . "\r\n";
/optional/$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
*/
    header ('location:register.php?status=1');
}
}else{
    header('location:register.php?error=0');
}
    


?>