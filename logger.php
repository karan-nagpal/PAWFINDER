<?php
   session_start();
    include('dbconnect.php');
    

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $cmd = "select ownid , name from owners where ( email = '".$email."' OR  mobile = '".$email."' ) AND (status = '1' AND pwd = '".$password."')";
   
    $data2 = mysqli_query($conn, $cmd);
    $numrow = mysqli_num_rows($data2);
    
    if($numrow > 0){
        $row = mysqli_fetch_array($data2);
        $_SESSION['aid'] = $row['ownid'];
        $_SESSION['aname'] = $row['name'];
         header('location:dashboard.php');

    }else{
        // echo mysqli_error($conn);
        header('location:login.php?error=0');
    }



?>