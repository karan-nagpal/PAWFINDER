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

<?php include('user-navigation.php');  ?>

<div class="col-md-7 text-center col-md-offset-2 "style="overflow: scroll; height:500px">
    <h2>My Pets</h2>
<?php
    $cmd = "select pname, petage, pbreed, pid, image,category, status, lostdate from pets where ownid = '".$id."'";
    $data = mysqli_query($conn, $cmd);
    $numrow = mysqli_num_rows($data);
    
    
?><p><?php

    if($numrow = 0){
        echo "No data Found";
    }else{
        $en =0;
        $fn =0;
        $ln = 0;
        $hn =0;
        while($row = mysqli_fetch_array($data)){
            $en++;
            $fn++;
            $ln++;
            $hn++;
            $cmdqr = "select image from qrcode where pid = '".$row['pid']."'";
            $data1 = mysqli_query($conn, $cmdqr);
            $numrowqr = mysqli_num_rows($data1);
           $row1 = mysqli_fetch_array($data1);
            ?>
             <div class="col-md-12  petsdiv" id = "<?php echo $row['pid']; ?>">
                 <div class="col-md-3 petphoto">
                     <img src="petsphotos/<?php echo $row['image']; ?>" alt="image" class="pet-image img-responsive">
                 </div>
                 <div class="petdata col-md-6">

                     <p> My name is : <?php echo $row['pname']  ?> </p>
                     <p>My age is <?php echo $row['petage']  ?> months</p>
                     <p> I am a <?php echo @$row['pbreed']."  ";?> <?php echo $row['category'];  ?></p>
                                         
                     <p>
                         <?php if($row['status']==0){
                              ?>
                                
                          <p><span onclick = "delquery(this)" id="e<?php echo $en; ?>" class="btn text-danger" >Report Lost</span><a class="text-danger btn" href="delpet.php?pid=<?php echo $row['pid']; ?>" onclick="return confirm('Are you sure?  Once deleted it can not be reversed.')">Delete</a></p>
                          <div id="f<?php echo $fn; ?>" style= "display: none;">      
                                <form action="reportlost.php" >
                                    <input type="hidden" value="<?php echo $row['pid']; ?>" name="pid" >
                                    <input type="date" name="lostdate" min="1997-01-01" style="height:20px; border-radius:5px; font-size:12px" required>
                                    <input type="submit" value="Report" submit = return datecheck() class ="btn bg-danger">
                                </form>     
                                </div>                       
                            <?php
                         }else{?>
                            <p><span onclick = "foundquery(this)" id="h<?php echo $en; ?>" class="btn text-danger" >Report Found</span><a class="text-danger btn" href="delpet.php?pid=<?php echo $row['pid']; ?>" onclick="return confirm('Are you sure?  Once deleted it can not be reversed.')">Delete</a> <a class= " btn btn-warning"href="flyer.php">Print Flyers</a></p>
                            <div id="l<?php echo $ln; ?>" style= "display: none;">      
                                <form action="reportfound.php" >
                                    <input type="hidden" value="<?php echo $row['pid']; ?>" name="pid" >
                                    <input type="date" name="founddate" min="1997-01-01" max="2030-12-31"style="height:20px; border-radius:5px; font-size:12px">
                                    <input type="submit" value="Report" class ="btn bg-success">
                                </form>     
                                </div>
                            <h3 class="text-danger"><?php echo "Marked Lost"; ?> from <?php echo $row['lostdate'];   ?> </h3>
                            <p></p>
                            <?php
                         }
                         ?>
                     </p>
                     
                    </div>
                     <div class="qr col-md-2">
                         <?php if($numrowqr == 0){
                             echo "No QR mapped";
                         }else{?>
                         <a href="QRcodes/<?php echo $row1['image']; ?>.jpg">
                             <img src="QRcodes/<?php echo $row1['image']; ?>.jpg" alt="QR code">
                        </a><?php
                         }?>
                            </div>
                    </div>

        <?php
        }
        
    } ?>
    </p>
        <script>
            
            function delquery(a){
                   var bid = a.id;
                   var fid = "f"+bid.substr(1,  bid.length);
                   fid = String(fid);  
                   console.log(fid);

                var element = document.getElementById(fid);
                element.style.display = "block";
            }
            function foundquery(b){
                   var bid = b.id;
                   var lid = "l"+bid.substr(1,  bid.length);
                   lid = String(lid);  
                   console.log(lid);

                var element = document.getElementById(lid);
                element.style.display = "block";
            }
            
            </script>
</div>        
</body>
</html>