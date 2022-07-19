<?php 

session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfinder</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/styles.css">

    
</head>
<body >
<nav class="navbar bgnav">
  <div class="container-fluid">
    <div class="navbar-header col-md-1">
     <a href="index.php" class="navbar-brand">
     <img src="images/logo.png" class= "img-reaponsive"alt="logo" id="logo">
    </a>
       
      
      <button href="btn " class="navbar-toggle" data-toggle="collapse" data-target="#menu" >
        <i class="fa fa-bars"></i>
</button>
    </div>
    <div class="col-md-4">
      <span class="h1">Pawfinder</span>
    </div>
    <div class="col-md-6 collapse navbar-collapse navbar-right" id="menu" >

      <ul class="nav navbar-nav ">
      <li ><a href="index.php">Home</a></li>
      <li> <?php
                        if(!isset($_SESSION["aid"])){ 
  
                          echo '<a  href="register.php">Register</a>';
                       }else{
                        echo '<a href="dashboard.php">Dashboard</a>';
                       }
                  ?></li>
      <li>
      <?php
                        if(!isset($_SESSION["aid"])){ 
  
                          echo '<a  href="login.php">Login</a>';
                       }else{
                         echo '<a  href="logout.php">Logout </a>';
                       }
                  ?>
      </li>
      <li>
      <?php
          if(isset($_SESSION["aname"])){ 
            ?>
          <span class="navbar-text"> <i class="fa fa-user-o" ></i>  <?php echo strtoupper($_SESSION["aname"]) ; ?> </span>
          <?php         
       }
       ?> 
      </li>
    </ul>
  </div>
</div>
</nav>
                  
           
           

              
       
