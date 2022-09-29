<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['username'])){
   header('location:login_form.php');
}

if(!empty($_GET['login'])){
    echo "<p align='center'>You have successfully logged in!</p>";
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="refresh" content="10; url=session.php" stats = "out" />
   <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
   <div class="content">
      <h3>Mabuhay!</h3>
      <p>Welcome to Tomongtong Mangrove Ecotrail</p>
      <a href="logout.php" class="logout">logout</a>
   </div>
</div>

</body>
</html>