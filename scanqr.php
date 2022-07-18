<?php
include('dbconnect.php');
// if(!isset($_SESSION["aid"])){
//     header('location:login.php');
// }else{
//     $id = $_SESSION["aid"];
// }
$peid= $_GET['id'];
$cmd= "select ownid, pname,image, status from pets where pid = '".$peid."'";
$data = mysqli_query($conn, $cmd);
$numrow = mysqli_num_rows($data);
$row = mysqli_fetch_array($data);
$aid = $row['ownid'];

$data1 = mysqli_query($conn, "select email from owners where ownid = '".$aid."'");
$row1 = mysqli_fetch_array($data1);
$email = $row1['email'];

include('header.php');
?>
<div class="status col-md-12 text-center text-danger">

    <h1>
        <?php
        if($row['status']==1){
            echo " I am Lost , Please contact my owner with form below!"; 
            $sts = ""; 
        }
        if($row['status']==0){
        $sts = "disabled";
        }
        ?>
</h1>
</div>
<div class="col-md-4 col-md-offset-4 scanform text-center">
    <div class="col-md-6">

        <p><img src="petsphotos/<?php echo $row['image']; ?>" alt="Pet Photo" class="img-responsive pet-image" ></p>
    </div>
    <div class="col-md-4 mes">

        <p class="text-center"> HELLO.. I am <?php echo $row['pname']; ?>
        Thank You for scanning my badge. <?php
        if($row['status']==0){
        echo "I am  with my family.";
        } ?></p>
    </div>
<form action="msg.php">
    <input type="hidden" name= "recvemail" value="<?php echo $email ?>" <?php echo $sts ?>>
    <input type="hidden" name ="peid" value="<?php echo $peid ?>" <?php echo $sts ?>>
    <input type="name" placeholder = "Your Name Here..." <?php echo $sts ?>>
    <input type="area" placeholder= "Area where you have seen the <?php echo $row['pname']; ?>" <?php echo $sts ?>>
    <input type="email" placeholder = "Your email id" <?php echo $sts ?>>
    <input type="textarea" name="message" placeholder="message" <?php echo $sts ?>>
    <input type="submit" class= "btn btn-info" value="send message" <?php echo $sts ?>>
</form>
</div>