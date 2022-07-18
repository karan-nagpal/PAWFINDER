
<div class="col-md-12 text-center text-success" >
    <a href="addpets.php" class= "btn bgnav"style="font-size:18px; border:1px solid black">Add Pets</a>
    <a href="viewpets.php" class= "btn bgnav "style="font-size:18px;  border:1px solid black">My Pets</a>
    <a href="viewmessages.php" class= "btn bgnav "style="font-size:18px; border:1px solid black">View Messages</a>
    <a href="" class= "btn bgnav "style="font-size:18px; border:1px solid black">Shopping</a>
    <?php

if(!isset($_SESSION["aid"])){ 

   echo '<a href="login.php" class= "btn bgnav "style="font-size:18px; border:1px solid black">Login</a>';
}else{
    echo '<a href="logout.php" class= "btn bgnav "style="font-size:18px; border:1px solid black">Logout</a>';
}
?>
    

</div>