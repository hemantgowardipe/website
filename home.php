<?php
    session_start();
    include('connect.php');
    // browzer security start
    if(empty($_SESSION['id']))
     {
        header('location:index.php');
     }
    // browzer security end
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <?php include('bootcdn.php')?>
</head>
<body>
  <?php include('header.php')?>
  <br><br><br><br><br>
  <div class="container">
    <div class="well">
      <span class="glyphicon glyphicon-home"> <b>HOME PAGE</b></span>
    </div>

  </div>
</body>
</html>