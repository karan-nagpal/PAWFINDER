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
    <div class="col-md-4 col-md-offset-3 text-center " > 
        <h1>Add new pet</h1>   
        <form action="cpd.php" class="addform" method="post" onsubmit = "return regcheck()">
        <input type="password" name="password" id="repass" placeholder="PET name" required>
        <input type="password" id="repass" placeholder="PET name" required>
        <input type="submit" class ="btn btn-success" Value="Change Password">
        <p class="text-center">
    <?php
if(isset($_GET['added'])){
    echo "Pet added succesfuly";
} ?>
</p>
</form>
</div>
</div>
<script>
       function regcheck(){
           var firstpass = document.getElementById("pass").value;
           var secondpass = document.getElementById("repass").value;
       if(firstpass === secondpass){
                return true;
            }else {
                return false;
            }
        }

       </script>
</body>
</html>

