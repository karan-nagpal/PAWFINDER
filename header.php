<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfinder</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/styles.css">

    
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light  bgnav shadow p-3" >
  <a class="navbar-brand" href="#"><h1>Pawfinder</h1></a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li> 
  </div>
  <div class="col-md-3 text-right log-links">
    <ul class="navbar-nav text-right ">
      <li class="nav-item active">
        <a class="nav-link" href="register.php">Register </a>
      </li>
      <li class="nav-item">
      <?php

          if(!isset($_SESSION["aid"])){ 
          
             echo '<a class="nav-link" href="login.php">Login</a>';
          }else{
              echo '<a class="nav-link" href="logout.php">Logout </a>';
          }
          ?>      
          </li>
          <li class="nav-item active"> <?php
          if(isset($_SESSION["aname"])){ 
          ?><p style= "margin:10px; color:white"> <i class="fa fa-user-o" ></i>  <?php echo strtoupper($_SESSION["aname"]) ; ?> </p>
         <?php         
       }?>
          </li>
    </div>
    </nav>

