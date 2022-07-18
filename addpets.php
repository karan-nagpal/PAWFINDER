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
    <div class="col-md-4 col-md-offset-3 text-center " > 
        <h1>Add new pet</h1>   
        <form action="addp.php" class="addform" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="PET name" required>
        <input type="text" name="breed" placeholder="PET breed" required>
        <input type="text" name="age" placeholder="PET age in months" required>
        <select name="category" id="category" required>
            <option value="">please select category</option>
            <option value="DOG">DOG</option>
            <option value="CAT">CAT</option>
            <option value="BIRD">BIRD</option>
            <option value="OTHERS">OTHERS</option>
        </select>

        <input type="text" name="id" placeholder="Identification mark if any..."><br>
        <input type="file" name="petphoto" style="padding-left:50px" required>
        <input type="submit" class ="btn btn-success" Value="ADD Pet">
        <p class="text-center">
    <?php
if(isset($_GET['added'])){
    echo "Pet added succesfuly";
} ?>
</p>
</form>
</div>
</div>

</body>
</html>