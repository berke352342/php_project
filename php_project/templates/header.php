<?php session_start(); ?> 

<!DOCTYPE html>
<html lang="en">
<head>

     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> MuscleFuel </title>
     <link rel="stylesheet" href="css/style.css">

</head>

<body>
<header>
  <div class="logo"><a href="index.php">MuscleFuel</a></div>
  <nav>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="shop.php">Shop</a>
    <a href="contact.php">Contact</a>

    <?php if(isset($_SESSION['admin'])): ?> <!-- check if the admin is login in -->
         <a href="logout.php"> Logout </a> <!--if the admin logout show this -->
    <?php else: ?>
         <a href="login.php">Admin Login</a>  <!-- if the admin isnt login show this -->
         <a href="register.php">Register Admin</a>
    <?php endif; ?>

  </nav>
</header>
