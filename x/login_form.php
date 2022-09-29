<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $_SESSION['username'] = $username;

      header('location:header.php? login=loggedin');
   }
   else{
      $error[] = 'incorrect password or username!';
   }

}
if(!empty($_GET['logout'])){
    echo "<p align='center'>You have logged out!</p>";
   }

if(!empty($_GET['signup'])){
    echo "<p align='center'>You have successfully signed up!</p>";
   }
   
if(!empty($_GET['session'])){
    echo "<p align='center'>Your session has expired due to inactivity.</p>";
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="form-container">

    <form action="" method="post">
        <h3 class="title">login</h3>
        <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
        <input type="username" name="username" placeholder="enter your username" class="box" required>
        <input type="password" name="password" id = "password" placeholder="enter your password" class="box" required>
        <input type="checkbox" onclick="pass()">Show Password
        <input type="submit" value="Login" class="form-btn" name="submit">
        <p>don't have an account? <a href="signup.php">Sign up now!</a></p>
    </form>

</div>

<script>
function pass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>