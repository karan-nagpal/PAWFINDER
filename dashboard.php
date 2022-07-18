<?php
session_start();
include('dbconnect.php');
include('user-header.php');
if(!isset($_SESSION["aid"])){
    header('location:login.php');
}else{
    $id = $_SESSION["aid"];
}
?>
<h3 class="col-md-offset-1">Welcome <?php echo strtoupper($_SESSION['aname']) ;?></h3>
<div class="col-md-12">

    <?php include('user-navigation.php'); ?>
    
<div class="col-md-9 text-center">
        <h1>Welcome to User Dashboard</h1>
        <div class="col-md-9 col-md-offset-3 " style="margin-top: 50px">
            <div class="col-md-12 text-center bgnav"><h3>My Pets</h3></div>
        <div class="col-md-12 displaydiv text-center">
            
            <?php
        $cmd = "select image , pname, status from pets where ownid = '".$id."'";
        $data = mysqli_query($conn, $cmd);
        $numrow = mysqli_num_rows($data);

        
        ?><p><?php
        
        if($numrow = 0){
            echo "No data Found";
        }else{
            while($row = mysqli_fetch_array($data)){
                ?>

                <div class=" displaycard text-center">
                       
                        <span class="alarm "> <?php if($row['status']==1){
                            echo " LOST"; } ?></span>
                       <img src="petsphotos/<?php echo $row['image']; ?>" alt="image" class=" img-fluid pet-image img-responsive">
                       <div class="col-md-12">
                            <p><?php echo $row['pname']; ?></p>
                       </div>
                </div>
                <?php
                }
                } ?>
                <hr>
            </div>
        </div>
        <div class="col-md-9 col-md-offset-3 ">
            <div class="col-md-12 text-center bgnav"><h3>My Messages</h3></div>
        <div class="col-md-12 displaydiv text-center ">
        <table class= "table ">
                    <tr>
                        <th> Sr no</th>
                        <th> Sender</th>
                        <th>Pet Name</th>
                        <th>Message</th>
                    </tr>
                    <?php
        $cmd1 = "select msid,petid, message, senderid from message where ownid = '".$id."' ";
        $data1 = mysqli_query($conn, $cmd1);
        $numrow1 = mysqli_num_rows($data1);
        
        $sn = 0;
            echo mysqli_error($conn);
        ?><p><?php
        
        if($numrow1 == 0){ ?>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <?php echo "No messages"; ?>
             </td>
             <td></td>
             <td></td>
            </tr>
            <?php
        }else{
            
            while($row1 = mysqli_fetch_array($data1)){
                $cmd2 = "select name from owners where ownid = '".$row1['senderid']."'";
                $data2 = mysqli_query($conn, $cmd2);
                $numrow2 = mysqli_num_rows($data2);
                $row2 = mysqli_fetch_array($data2);
                $cmd3 = "select pname from pets where pid = '".$row1['petid']."'";
                $data3 = mysqli_query($conn, $cmd3);
                $numrow3 = mysqli_num_rows($data3);
                $row3 = mysqli_fetch_array($data3);
               
                $sn++;
                ?>
                
                    <tr>
                        <td> <?php echo $sn; ?></td>
                        <td><?php echo $row2['name'];; ?></td>
                        <td><?php echo $row3['pname']; ?></td>
                        <td><?php echo $row1['message']; ?></td>
                    </tr>
                
                    <?php
                if($sn == 3){
                    break;
                }
            }
                
        } ?>
                </table>
                <br>
                
            </div>
         <a href="viewmessages.php">View All Messages</a>
        </div>
        </div>
<div class="footer col-md-10">      


</div>

</div>        
</body>
</html>