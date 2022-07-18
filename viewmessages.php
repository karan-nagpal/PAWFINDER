<?php
SESSION_START();
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
        
        
        <div class="col-md-9 col-md-offset-3 ">
            <div class="col-md-12 text-center bgnav"><h3>My Messages</h3></div>
        <div class="col-md-12 displaydiv text-center ">
        <table class= "table ">
            <tr>
                        <th> Sr no</th>
                        <th> Sender</th>
                        <th>Pet Name</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                    <?php
        $cmd1 = "select msid,petid, message, senderid from message where ownid = '".$id."'";
        $data1 = mysqli_query($conn, $cmd1);
        $numrow1 = mysqli_num_rows($data1);
        $sn = 0;
           ?><p><?php

        if($numrow1 <= 0){ ?>
            <tr>
                <td><?php echo $numrow1; ?></td>
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
                        <td><a href="deletemes.php?ms=<?php echo $row1['msid']; ?>">Delete</a>
                        <a href="message.php?ms=<?php echo $row1['msid']; ?>">Reply</a></td>
                    </tr>
                
                    
                    
                    <?php
                }
                } ?>
                </table>
                <br>
                
            </div>
         </div>
        </div>
<div class="footer col-md-10">      

    
    </div>
    
</div>        
</body>
</html>